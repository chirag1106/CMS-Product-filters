<div class="product_container">
    <div class="grid product_black_section">
        @if ($products->count())
            @foreach ($products as $product)
                <div class="col">
                    <div class="single_product mb-0">
                        <div class="product_thumb bg-white rounded ">
                            @if($image_type == 'WhiteGold' || $image_type == 'platinum' )
                            <img src="{{ asset($product->attr_whitegold_platinum_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                            @elseif($image_type == 'any')
                                @if ($product->attr_whitegold_platinum_round_default_img != null)
                                <img src="{{ asset($product->attr_whitegold_platinum_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                                @elseif($product->attr_yellowgold_round_default_img != null)
                                <img src="{{ asset($product->attr_yellowgold_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                                @elseif($product->attr_rosegold_round_default_img != null)
                                <img src="{{ asset($product->attr_rosegold_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                                @elseif($product->attr_tricolor_round_default_img != null)
                                <img src="{{ asset($product->attr_tricolor_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                                @elseif($product->attr_whitegold_yellow_round_default_img != null)
                                <img src="{{ asset($product->attr_whitegold_yellow_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                                @elseif($product->attr_whitegold_rose_round_default_img != null)
                                <img src="{{ asset($product->attr_whitegold_rose_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                                @endif
                            @elseif($image_type == 'YellowGold')
                            <img src="{{ asset($product->attr_yellowgold_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                            @elseif($image_type == 'RoseGold')
                            <img src="{{ asset($product->attr_rosegold_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                            @elseif($image_type == 'TriColor')
                            <img src="{{ asset($product->attr_tricolor_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                            @elseif($image_type == 'WYG')
                            <img src="{{ asset($product->attr_whitegold_yellow_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                            @elseif($image_type == 'WRG')
                            <img src="{{ asset($product->attr_whitegold_rose_round_default_img) }}" alt="product1" class="rounded size-200 primary_img">
                            @endif
                            <div class="quick_button">
                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#product_modal_box" data-bs-placement="top"
                        data-original-title="product view" data-sku={{ $product->prod_sku }} class="showDetails">Quick
                        View</a> --}}
                                <a href="{{ $product->prod_Live_URL }}" data-sku={{ $product->prod_sku }}
                                    class="showDetails">Quick
                                    View</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="tag_cate">
                                <p class="text-muted cat-ring">Ring, Wedding Bands</p>
                            </div>
                            <h3 class="text-white text-lead small">{{ $product->prod_name }}
                            </h3>
                            <div class="price_box">
                                @if($product_type == '14k')
                                <span class="current_price">Rs. {{ $product->attr_14k_regular }}</span>
                                @elseif ($product_type == '18k')
                                <span class="current_price">Rs. {{ $product->attr_18k_regular }}</span>
                                @else
                                <span class="current_price">Rs. {{ $product->attr_platinum_regular }}</span>
                                @endif
                            </div>
                            <div class="product_hover">
                                <div class="product_ratings">
                                    <ul>
                                        <li><i class="fa-solid fa-star text-white"></i></i></li>
                                        <li><i class="fa-solid fa-star text-white"></i></i></li>
                                        <li><i class="fa-solid fa-star text-white"></i></i></li>
                                        <li><i class="fa-solid fa-star text-white"></i></i></li>
                                        <li><i class="fa-regular fa-star text-white"></i></li>
                                    </ul>
                                </div>
                                <div class="product_desc">
                                    <p class="text-left">{{ $product->prod_long_desc }}</p>
                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li><a href="#" data-placement="top" title="Add to Wishlist"
                                                data-toggle="tooltip"><span class="ion-heart"></span></a></li>
                                        <li class="add_to_cart"><a href="#" title="Add to Cart">Add to
                                                Cart</a></li>
                                        <li><a href="#" title="Compare"><i
                                                    class="ion-ios-settings-strong"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-white m-3" style="font-size: 20px;"> No products found!</div>
        @endif
    </div>
    <div class="pagin_link">
        {{ $products->links() }}
    </div>
</div>
