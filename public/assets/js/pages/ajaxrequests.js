
 var url=config._url+'/';
 var c_url=config.c_url+'/';
 var p_url=config.p_url+'/';
 var s_url=config.s_url+'/';
 var i_url=config.i_url+'/';
 var cp_url=config.cp_url+'/';
 
 var Area = function () {
    
 
     var init = function () {
 
 
        handleChangeCity();
        handleChangeCategory();
        handleProducts();
        handleChangeSupplier();
        handleChangeIndustry();
        handleChangeCategoryProduct();
 
     };
 
     var handleChangeCity  = function () {
         $('#city').on('change', function () {
             var city= $(this).val();
             console.log(city);
             $('#area').html("");
             $('#area').html('<option selected value="0">' +'none' + '</option>');
             areas = "";
             if (city) {
                 $.get(url+ city, function (data) {
                     if (data.length != 0) {
                         for (var x = 0; x < data.length; x++) {
                             var item = data[x];
                             areas  += '<option value="' + item.id + '">' + item.name + '</option>';
                         }
                         $('#area').append(areas);
                     }
                 }, "json");
                 console.log(areas);
             }
         })
    }
    var handleChangeCategory  = function () {
        $('#category').on('change', function () {
            var category= $(this).val();
            console.log(category);
            $('#subCategory').html("");
            $('#subCategory').html('<option selected value="0">' +'none' + '</option>');
            subCategories = "";
            if (category) {
                $.get(c_url+ category, function (data) {
                   console.log(data);
                    if (data.length != 0) {
                        for (var x = 0; x < data.length; x++) {
                            var sub = data[x];
                            subCategories  += '<option value="' + sub.id + '">' + sub.name + '</option>';
                        }
                        $('#subCategory').append(subCategories);
                    }
                }, "json");
                console.log(subCategories);
            }
        })
   }
   var handleChangeCategoryProduct  = function () {
    $('#product_category').on('change', function () {
        var category= $(this).val();
        console.log(category);
        $('#subCategory').html("");
        $('#subCategory').html('<option selected value="0">' +'none' + '</option>');
        subCategories = "";
        if (category) {
            $.get(cp_url+ category, function (data) {
               console.log(data);
                if (data.length != 0) {
                    for (var x = 0; x < data.length; x++) {
                        var sub = data[x];
                        subCategories  += '<option value="' + sub.id + '">' + sub.name + '</option>';
                    }
                    $('#subCategory').append(subCategories);
                }
            }, "json");
            console.log(subCategories);
        }
    })
}
   var handleProducts  = function () {
    $('#Supplier').on('change', function () {
        var supplier= $(this).val();
        console.log(supplier);
        $('#product').html("");
        $('#product').html('<option  value="0">' +'none' + '</option>');
        products = "";
        if (supplier) {
            $.get(p_url+ supplier, function (data) {
                if (data.length != 0) {
                    for (var x = 0; x < data.length; x++) {
                        var product = data[x];
                        products  += '<option value="' + product.id + '">' + product.title + '</option>';
                    }
                    $('#product').append(products);
                }
            }, "json");
            console.log(products);
        }
    })
}

var handleChangeSupplier  = function () {
    $('#supplier').on('change', function () {
        var supplier= $(this).val();
        console.log(supplier);
        $('#category').html("");
        $('#category').html('<option  value="0">' +'none' + '</option>');
        categories = "";
        if (supplier) {
            $.get(s_url+ supplier, function (data) {
                if (data.length != 0) {
                    for (var x = 0; x < data.length; x++) {
                        var category = data[x];
                        categories  += '<option value="' + category.id + '">' + category.name + '</option>';
                    }
                    $('#category').append(categories);
                }
            }, "json");
            console.log(categories);
        }
    })
}
var handleChangeIndustry  = function () {
    $('#industry').on('change', function () {
        var industry= $(this).val();
        console.log(industry);
        $('#category').html("");
        $('#category').html('<option  value="0">' +'none' + '</option>');
        categories = "";
        if (industry) {
            $.get(i_url+ industry, function (data) {
                if (data.length != 0) {
                    for (var x = 0; x < data.length; x++) {
                        var category = data[x];
                        categories  += '<option value="' + category.id + '">' + category.name + '</option>';
                    }
                    $('#category').append(categories);
                }
            }, "json");
            console.log(categories);
        }
    })
}
 
 
     return {
         init: function () {
             init();
         }
     };
 
 }();
 jQuery(document).ready(function () {
     Area.init();
 });
 