$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function getSubCategory() {
    $.ajax({
        url: BASE_URL + "/getSubCategory",
        method: "post",
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $(".sub_cat_loader").show();
        },
        success: function (response) {
            let result = response.sub_cat;
            for (let i = 0; i < result.length; i++) {
                $(".sub_cat_label").append(
                    '<div class="form-check"><input class="form-check-input" type="radio" value="' +
                        result[i] +
                        '" name="sub_cat" onclick="sub(this)" /><label class="form-check-label" >' +
                        result[i] +
                        "</label></div>"
                );
            }
        },
        complete: function () {
            $(".sub_cat_loader").hide();
        },
    });
}

function getOptions() {
    $.ajax({
        url: BASE_URL + "/getAvailableOptions",
        method: "post",
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $(".product_type_loader").show();
        },
        success: function (response2) {
            // console.log(response2);
            let result14 = response2.carat_14;
            let result18 = response2.carat_18;

            for (let i = 0; i < result14.length; i++) {
                $(".product_type_label_14").append(
                    '<li><div class="d-flex justify-content-between align-items-center align-content-center"><div class="form-check"><input class="form-check-input" name="product_type" type="radio" value="14k_' +
                        result14[i] +
                        '" onclick="get_product_type(this);"><label class="form-check-label">14K ' +
                        result14[i] +
                        "</label></div></div></li>"
                );
            }
            for (let i = 0; i < result18.length; i++) {
                $(".product_type_label_18").append(
                    '<li><div class="d-flex justify-content-between align-items-center align-content-center"><div class="form-check"><input class="form-check-input" name="product_type" type="radio" value="18k_' +
                        result18[i] +
                        '" onclick="get_product_type(this);"><label class="form-check-label">18K ' +
                        result18[i] +
                        "</label></div></div></li>"
                );
            }
        },
        complete: function () {
            $(".product_type_loader").hide();
        },
    });
}

getOptions();
getSubCategory();

// $('.showDetails').click(function(e){
//     e.preventDefault();
//     var prod_sku = $(this).data('sku');
//     // console.log(prod_sku);
//     $.ajax({
//             url: BASE_URL+'/showDetails/'+prod_sku,
//             method: "post",
//             dataType: "json",
//             contentType: false,
//             cache: false,
//             processData: false,
//             success: function (response90) {
//                 // console.log(response90);
//                 $('.show_product_info').html(response90);
//                 // $('.getAllProducts').html(response.html);
//                 // $('.paginate').html(response.pagination);
//             }
//         });
// });

function infinteLoadMore(
    page,
    sort_type,
    sub_cat_type,
    gender,
    min_price,
    max_price,
    product_type
) {
    $.ajax({
        url: BASE_URL + "/getPaginate",
        method: "post",
        data: {
            page: page,
            sort: sort_type,
            sub_cat: sub_cat_type,
            gender: gender,
            min_price: min_price,
            max_price: max_price,
            product_type: product_type
        },
        dataType: "html",
        beforeSend: function () {
            $("#post_data").empty();
        },
        success: function (response3) {
            $("#post_data").append(response3);
        },
        complete: function () {
            $("html, body").animate({ scrollTop: 0 }, "fast");
        },
    });
}

let page = 1;
let sort_type = null;
let sub_cat_type = null;
let gender = null;
let min_price = null;
let max_price = null;
let product_type = null;

// $(window).scroll(function () {
//     if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
//         page++;
//         infinteLoadMore(
//             page,
//             sort_type,
//             sub_cat_type,
//             gender,
//             min_price,
//             max_price,
//             product_14k,
//             product_18k
//         );
//     }
// });

$(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    page = $(this).attr("href").split("page=")[1];
    // console.log(page);
    $("#post_data").empty();
    infinteLoadMore(
        page,
        sort_type,
        sub_cat_type,
        gender,
        min_price,
        max_price,
        product_type
    );
});

function filter_data() {
    page = 1;
    infinteLoadMore(
        page,
        sort_type,
        sub_cat_type,
        gender,
        min_price,
        max_price,
        product_type
    );
}

function sub(myRadios) {
    sub_cat_type = myRadios.value;
    filter_data();
    // console.log(myRadios.value);
}

function sort_by(MyRadios) {
    sort_type = MyRadios.value;
    filter_data();
    // console.log(MyRadios.value);
}

function gender_fnc(MyRadios) {
    gender = MyRadios.value;
    filter_data();
    // console.log(MyRadios.value);
}

function get_price() {
    min_price = $(".input-min").val();
    max_price = $(".input-max").val();
    filter_data();
    // console.log(min_price, max_price);
}

function get_product_type(MyRadios) {
    product_type = MyRadios.value;
    filter_data();
    // console.log(product_14k);
}
