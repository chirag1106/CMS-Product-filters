@extends('app')
@section('title', 'All Wedding Bands')
@section('products-filter')
    <div class="container">

        <div class="row my-5">
            <div class="col-lg-3 p-15">
                <aside>
                    <div class="card">
                        <article class="filter-group">
                            <header class="card-header d-flex justify-content-between">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="true"
                                    class="d-flex align-content-center align-items-center">
                                    <i class="fa-solid fa-caret-down"></i>&nbsp;
                                    <h6 class="title mb-0">Product type</h6>
                                </a>
                                <a href="#" class="btn btn-danger reset-product-type text-small reset-btn">Reset</a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_1" style="">
                                <div class="card-body">
                                    <div class="text-center product_type_loader">
                                        <div class="spinner-border text-dark" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <strong class="">&nbsp;Loading...</strong>
                                    </div>

                                    <ul class="list-menu product_type_label_14">

                                    </ul>
                                    <hr>
                                    <ul class="list-menu product_type_label_18">

                                    </ul>

                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group  .// -->

                        <article class="filter-group">
                            <header class="card-header d-flex justify-content-between">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapse_2"
                                    aria-expanded="true" class="d-flex align-content-center align-items-center">
                                    <i class="fa-solid fa-caret-down"></i>&nbsp;
                                    <h6 class="title mb-0">Price range </h6>
                                </a>
                                <a href="#" class="btn btn-danger reset-sort-by text-small reset-btn">Reset</a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_2" style="">
                                <div class="card-body">
                                    <div class="price-input">
                                        <div class="field">
                                            <span>Min</span>
                                            <input type="number" class="input-min" value="0">
                                        </div>
                                        <div class="separator">-</div>
                                        <div class="field">
                                            <span>Max</span>
                                            <input type="number" class="input-max" value="65000">
                                        </div>
                                    </div>

                                    <div class="slider">
                                        <div class="progress"></div>
                                    </div>

                                    <div class="range-input mb-3">
                                        <input type="range" class="range-min text-dark" min="0" max="65000"
                                            value="0" step="100" onchange="get_price();">
                                        <input type="range" class="range-max text-dark" min="0" max="65000"
                                            value="65000" step="100" onchange="get_price();">
                                    </div>
                                </div>
                            </div>
                        </article> <!-- filter-group .// -->

                        <article class="filter-group">
                            <header class="card-header d-flex justify-content-between">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapse_3"
                                    aria-expanded="true" class="d-flex align-content-center align-items-center">
                                    <i class="fa-solid fa-caret-down"></i>&nbsp;
                                    <h6 class="title mb-0">Gender</h6>
                                </a>
                                <a href="#" class="btn btn-danger reset-sort-by text-small reset-btn">Reset</a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_3" style="">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="Mens" onclick="gender_fnc(this);">
                                        <label class="form-check-label">
                                            Men
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="Womens" onclick="gender_fnc(this);">
                                        <label class="form-check-label">
                                            Women
                                        </label>
                                    </div>
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->

                        <article class="filter-group">
                            <header class="card-header d-flex justify-content-between">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapse_5"
                                    aria-expanded="true" class="d-flex align-content-center align-items-center">
                                    <i class="fa-solid fa-caret-down"></i>&nbsp;
                                    <h6 class="title mb-0">Sub-Categories</h6>
                                </a>
                                <a href="#" class="btn btn-danger reset-sort-by text-small reset-btn">Reset</a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_5" style="">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between flex-column sub_cat_label">
                                        <div class="text-center sub_cat_loader">
                                            <div class="spinner-border text-dark" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <strong class="">&nbsp;Loading...</strong>
                                        </div>

                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->

                        <article class="filter-group">
                            <header class="card-header d-flex justify-content-between">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#collapse_6"
                                    aria-expanded="false" class="d-flex align-content-center align-items-center">
                                    <i class="fa-solid fa-caret-down"></i>&nbsp;
                                    <h6 class="title mb-0">Sort By</h6>
                                </a>
                                <a href="#" class="btn btn-danger reset-sort-by text-small reset-btn">Reset</a>
                            </header>
                            <div class="filter-content collapse in" id="collapse_6" style="">
                                <div class="card-body">

                                    <div class="form-check">
                                        <input class="form-check-input" id="nameAsc" type="radio" value="nameAsc" name="sort" onclick="sort_by(this);">
                                        <label class="form-check-label">
                                            Name: A - Z
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="nameDesc" name="sort" onclick="sort_by(this);">
                                        <label class="form-check-label">
                                            Name: Z - A
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="price_lh" name="sort" onclick="sort_by(this);">
                                        <label class="form-check-label">
                                            Price: Low to High
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="price_hl" name="sort" onclick="sort_by(this);">
                                        <label class="form-check-label">
                                            Price: High to Low
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="most_popular" name="sort" onclick="sort_by(this);">
                                        <label class="form-check-label">
                                            Most Popular
                                        </label>
                                    </div>
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                    </div> <!-- card.// -->
                </aside>
            </div>
            <div class="col-lg-9 p-0" id="post_data">
                        @include('products.data_view')
            </div>
        </div>
    </div>
@endsection
