var f_url = config.f_url + '/';
var front_url = config.url;
var cs_url = config.cs_url + '/';
var filter_products = config.filter_products+'/';

var Filter = function () {


    var init = function () {

        handleChangeARea();
        handleChangeCategory();
        handleSearch();
        handlefilterProducts();
    };

 
    var handleChangeARea = function () {

        $('#area').on('change', function () {
            var area = $('#area').val();
            $.get(f_url + area, function (data) {
                $("#supplier").html("");
                suppliers='';
                if (data.length != 0) {
                    for (var x = 0; x < data.length; x++) {
                        var item = data[x];
                        suppliers += '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"><article class="ps-block--store" ><div class="ps-block__thumbnail bg--cover" data-background=""></div><div class="ps-block__content"><div class="ps-block__author"><a class="ps-block__user" href="#"><img src="'+front_url+'/'+item.image+'" alt=""></a><a class="ps-btn" href="' + front_url +'/Brands/'+item.name+'">Visit Store</a></div><h4>'+item.name+'</h4><select class="ps-rating" data-read-only="true"><option value="1">1</option><option value="1">2</option><option value="1">3</option><option value="1">4</option><option value="2">5</option></select><p>'+item.address+'</p><div class="ps-block__inquiry"><a href="#"><i class="icon-question-circle"></i>inquiry</a></div></div></article></div >';
                    }
                    $('#supplier').append(suppliers);
                }else{
                    $("#supplier").html('<h1 class="text-center text-info mt-5">There is no stores for this location</h1>');

                }
            }, "json");
        });
    }
    var handleChangeCategory = function () {

        $('#category').on('change', function () {
            var category = $('#category').val();
            $.get(f_url  + category, function (data) {
                $("#supplier").html("");
                suppliers = '';
                if (data.length != 0) {
                    for (var x = 0; x < data.length; x++) {
                        var item = data[x];
                        suppliers += '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"><article class="ps-block--store" ><div class="ps-block__thumbnail bg--cover" data-background=""></div><div class="ps-block__content"><div class="ps-block__author"><a class="ps-block__user" href="#"><img src="' + front_url + '/' + item.image + '" alt=""></a><a class="ps-btn" href="' + front_url + '/Brands/' + item.name + '">Visit Store</a></div><h4>' + item.name + '</h4><select class="ps-rating" data-read-only="true"><option value="1">1</option><option value="1">2</option><option value="1">3</option><option value="1">4</option><option value="2">5</option></select><p>' + item.address + '</p><div class="ps-block__inquiry"><a href="#"><i class="icon-question-circle"></i>inquiry</a></div></div></article></div >';
                    }
                    $('#supplier').append(suppliers);
                } else {
                    $("#supplier").html('<h1 class="text-center text-warning mt-5">There is no stores for this Category</h1>');

                }
            }, "json");
        });
    }
    var handleSearch = function () {
        $('#search').on('keypress', function (e) {
            if (e.which == 13) {
                var search = $(this).val();
                console.log(search);
                $.get(cs_url + search, function (data) {
                    $("#supplier").html("");
                    suppliers = '';
                    if (data.length != 0) {
                        for (var x = 0; x < data.length; x++) {
                            var item = data[x];
                            suppliers += '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"><article class="ps-block--store" ><div class="ps-block__thumbnail bg--cover" data-background=""></div><div class="ps-block__content"><div class="ps-block__author"><a class="ps-block__user" href="#"><img src="' + front_url + '/' + item.image + '" alt=""></a><a class="ps-btn" href="' + front_url + '/Brands/' + item.name + '">Visit Store</a></div><h4>' + item.name + '</h4><select class="ps-rating" data-read-only="true"><option value="1">1</option><option value="1">2</option><option value="1">3</option><option value="1">4</option><option value="2">5</option></select><p>' + item.address + '</p><div class="ps-block__inquiry"><a href="#"><i class="icon-question-circle"></i>inquiry</a></div></div></article></div >';
                        }
                        $('#supplier').append(suppliers);
                    } else {
                        $("#supplier").html('<h1 class="text-center text-primary mt-5">There is no such store with this name</h1>');

                    }
                }, "json");
            }
          
        });
    }
    var handlefilterProducts = function () {
        $('#p_subcategory').on('click', function () {
            $(this).html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
            $.ajax({
                url: filter_products,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
console.log(data);
                    $('#products').html('<div class="col - xl - 2 col - lg - 4 col - md - 4 col - sm - 6 col - 6">< div class= "ps-product" ><div class="ps-product__thumbnail"><a href="product-default.html"><img src="'+config.url+item.image+'" alt="" style="width:200px;height:80px;"></a><ul class="ps-product__actions"><li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li><li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview'+item.id+'"><i class="icon-eye"></i></a></li><li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li><li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li></ul></div><div class="ps-product__container"><a class="ps-product__vendor" href="#">'+item.title+'</a><div class="ps-product__content"><a class="ps-product__title" href="product-default.html">'+item.title+'</a><p class="ps-product__price">'+item.price+'LE</p></div><div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">'+item.title+'</a><p class="ps-product__price">'+item.price+'LE</p></div></div></div></div >');
                    if (data.type == 'success') {
                        if (data.data.news != "") {
                            $('#news-items').append(data.data.news);
                         
                        } else {
                          
                        }
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#load-more-button').html('');
                
                },
                dataType: "json",
                type: "GET"
            });
            return false;
        })
    }


    return {
        init: function () {
            init();
        }
    };

}();
jQuery(document).ready(function () {
    Filter.init();
});





