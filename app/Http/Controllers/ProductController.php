<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public $image_type = 'any';
    public $filters = [];
    public $product_type = '14k';

    public function index()
    {
        return view('products.index');
    }

    public function showProducts(Request $request)
    {
        $products = DB::table('product')->paginate(12, ['*'], 'page', $request->page);
        return view('products.products', ['products' => $products, 'image_type' => $this->image_type, 'product_type' => $this->product_type]);
    }


    public function getPaginate(Request $request)
    {
        if ($request->ajax()) {
            $products = DB::table('product');

            if ($request->has('product_type') && !empty($request->product_type)) {
                if ($request->product_type == 'platinum') {
                    $this->product_type = 'platinum';
                    $product_metal = 'WhiteGold';
                } else {
                    $split = explode('_', $request->product_type);
                    $this->product_type = $split[0];
                    $product_metal = str_replace(' ', '', $split[1]);
                }
                $this->filters += ['product_type' => $this->product_type];
                $this->filters += ['product_metal' => $product_metal];
                $this->image_type = $product_metal;
                if ($this->product_type == '14k') {
                    $products = $products->whereNotNull('attr_14k_regular')->whereRaw('FIND_IN_SET(?, REPLACE(attr_14k_metal_available, " ", ""))', [$product_metal]);
                } else if ($this->product_type == '18k') {
                    $products = $products->whereNotNull('attr_18k_regular')->whereRaw('FIND_IN_SET(?, REPLACE(attr_18k_metal_available, " ", ""))', [$product_metal]);
                } else {
                    $products = $products->whereNotNull('attr_platinum_regular');
                }
            }

            if ($request->has('sort') && !empty($request->sort)) {
                $this->filters += ['sort_type' => $request->sort];

                if ($request->sort == 'nameAsc')
                    $products = $products->orderby('prod_name', 'Asc');
                else if ($request->sort == 'nameDesc')
                    $products = $products->orderby('prod_name', 'Desc');
                else if ($request->sort == 'price_lh')
                    $products = $products->orderBy('attr_14k_regular', 'Asc');
                else if ($request->sort == 'price_hl')
                    $products = $products->orderBy('attr_14k_regular', 'Desc');
                else if ($request->sort == 'most_popular')
                    $products = $products->inRandomOrder();
            }

            if ($request->has('sub_cat') && !empty($request->sub_cat)) {
                $this->filters += ['sub_cat' => $request->sort];

                $sub_cat_type = $request->sub_cat;
                $sub_cat_type = str_replace(' ', '', $sub_cat_type,);
                $products = $products->whereRaw('FIND_IN_SET(?, REPLACE(prod_subcategory, " ", ""))', [$sub_cat_type]);
            }

            if ($request->has('gender') && !empty($request->gender)) {
                $this->filters += ['gender' => $request->gender];

                $products = $products->where('prodmeta_section', $request->gender);
            }

            if ($request->min_price || $request->max_price) {
                $this->filters += ['min_price' => $request->min_price];
                $this->filters += ['max_price' => $request->max_price];

                // if( $request->product_type == null ){
                //     $products = $products->whereBetween('attr_14k_regular', [$request->min_price, $request->max_price]);
                // }
                if ($this->product_type == '14k') {
                    $products = $products->whereBetween('attr_14k_regular', [$request->min_price, $request->max_price]);
                } else if ($this->product_type == '18k') {
                    $products = $products->whereBetween('attr_18k_regular', [$request->min_price, $request->max_price]);
                } else {
                    $products = $products->whereBetween('attr_platinum_regular', [$request->min_price, $request->max_price]);
                }
            }

            $products = $products->paginate(12, ['*'], 'page', $request->page);

            $view =  view('products.data_view', ['products' => $products, 'image_type' => $this->image_type, 'product_type' => $this->product_type])->render();
            return $view;
        }
    }

    public function getSubCategory()
    {
        $sub_cat_str = DB::table('product')->select(DB::raw("GROUP_CONCAT(prod_subcategory SEPARATOR ',') as `names`"))->get()->toArray();
        $each_sub_cat = explode(',', $sub_cat_str[0]->names);
        $each_sub_cat = array_map('trim', $each_sub_cat);
        $result = array_unique($each_sub_cat);
        // $result = array_count_values($each_sub_cat);
        $result = array_values($result);
        sort($result);
        echo json_encode(array('sub_cat' => $result));
        // return $result;
    }

    public function getCategory()
    {
        $cat_str = DB::table('product')->select(DB::raw("GROUP_CONCAT(prod_type SEPARATOR ',') as `names`"))->get()->toArray();
        $each_cat = explode(',', $cat_str[0]->names);
        // $result = array_count_values($each_cat);
        $result = array_unique($each_cat);
        $result = array_values($result);
        sort($result);
        echo json_encode(array('cat' => $result));
        // return $result;
    }

    public function getAvailableOptions()
    {

        $ans = null;
        $available_options = DB::table('product')->select(DB::raw("GROUP_CONCAT(attr_14k_metal_available SEPARATOR ',') as `names`"))->get()->toArray();
        $each_options = explode(',', $available_options[0]->names);
        $each_options = array_map('trim', $each_options);
        $result_14 = array_unique($each_options);
        $result_14 = array_values($result_14);
        // $result = array_count_values($each_options);
        sort($result_14);

        $available_options = DB::table('product')->select(DB::raw("GROUP_CONCAT(attr_18k_metal_available SEPARATOR ',') as `names`"))->get()->toArray();
        $each_options = explode(',', $available_options[0]->names);
        $each_options = array_map('trim', $each_options);
        // $result_18 = array_count_values($each_options);
        $result_18 = array_unique($each_options);
        $result_18 = array_values($result_18);
        sort($result_18);
        $ans = array(
            'carat_14' => $result_14,
            'carat_18' => $result_18
        );
        echo json_encode($ans);
    }

    public function showDetails($prod_sku)
    {
        $product_info = Product::where('prod_sku', '=', $prod_sku)->get()->toArray();
        $html = null;
        foreach ($product_info as $product) {


            $html = '<div class="row">';
            $html .= '<div class="col-lg-5 col-md-5 col-sm-12">';
            $html .= '<div class="modal_tab">';
            $html .= '<div class="tab-content product-details-large pt-0">';
            $html .= '<div class="tab-pane fade show active" id="tab1" role="tabpanel">';
            $html .= '<div class="modal_tab_img">';
            $html .= '<img src="images/product/70.jpg" alt="">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="modal_social mt-4">';
            $html .= '<h2>Share this Product</h2>';
            $html .= '<ul class="mb-3">';
            $html .= '<li><a href="#"><i class="ion-social-facebook"></i></a></li>';
            $html .= '<li><a href="#"><i class="ion-social-twitter"></i></a></li>';
            $html .= '<li><a href="#"><i class="ion-social-rss"></i></a></li>';
            $html .= '<li><a href="#"><i class="ion-social-googleplus"></i></a></li>';
            $html .= '<li><a href="#"><i class="ion-social-youtube"></i></a></li>';
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="col-lg-7 col-md-7 col-sm-12">';
            $html .= '<div class="modal_right">';
            $html .= '<div class="modal_title mb-10">';
            $html .= '<h2>' . $product['prod_name'] . '</h2>';
            $html .= '</div>';
            $html .= '<div class="modal_price mb-10">';
            $html .= '<span class="new_price">Price: Rs. ' . round($product['attr_14k_regular'] * ((100 - 5) / 100), 2) . '</span>';
            $html .= '<span class="old_price">' . $product['attr_14k_regular'] . '</span>';
            $html .= '</div>';

            $html .= '<div class="modal_add_to_cart pb-4">';
            $html .= '<form action="#">';
            $html .= '<input type="number" min="1" max="100" step="1">';
            $html .= '<button type="submit">Add To Cart</button>';
            $html .= '</form>';
            $html .= '</div>';
            // $html .= '<';
            $html .= '<div class="modal_description mb-3">';
            $html .= '<ul>';
            if ($product['prodmeta_section'] != null) {
                $html .= '<li><span class="text-bold">Prefered for:</span> ' . $product['prodmeta_section'] . '</li>';
            }
            if ($product['prodmeta_metal_weight'] != null) {
                $html .= '<li><span class="text-bold">Metal Weight:</span> ' . $product['prodmeta_metal_weight'] . '</li>';
            }
            if ($product['prodmeta_side_diamonds_count'] != null) {
                $html .= '<li><span class="text-bold">Diamond Count:</span> ' . $product['prodmeta_side_diamonds_count'] . '</li>';
            }
            if ($product['prodmeta_side_diamonds_ctw'] != null) {
                $html .= '<li><span class="text-bold">Carat:</span> ' . $product['prodmeta_side_diamonds_ctw'] . '</li>';
            }
            if ($product['prodmeta_side_diamonds_color_clarity'] != null) {
                $html .= '<li><span class="text-bold">Colour Clarity:</span> ' . $product['prodmeta_side_diamonds_color_clarity'] . '</li>';
            }
            $html .=  '</ul>';
            $html .=  '<div class="mb-3">';
            $html .=  '<p class="text-bold">Product Description:</p>';
            $html .= '<p>' . $product['prod_long_desc'] . '</p>';
            $html .=  '</div>';
            $html .= '</div>';
            $html .= '<div class="see_all">';
            $html .= '<a href="' . $product['prod_Live_URL'] . '">See All Features</a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }

        echo json_encode($html);
    }

    public function showParticularProduct($prod_sku)
    {
        $product = Product::where('prod_sku', '=', $prod_sku)->get()->toArray();
        echo '<pre>';
        print_r($product);
        echo '</pre>';
                // return view('products.product_view', ['product' => $product]);

    }
}
