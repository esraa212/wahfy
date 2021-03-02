
 var url=config._url+'/';
 var c_url=config.c_url+'/';

 var Area = function () {
    
 
     var init = function () {
 
 
        handleChangeCity();
        handleChangeCategory();
        handleProducts();
 
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
   var handleProducts  = function () {
    $('#category').on('change', function () {
        var category= $(this).val();
        console.log(category);
        $('#product').html("");
        $('#product').html('<option  value="0">' +'none' + '</option>');
        products = "";
        if (category) {
            $.get(p_url+ category, function (data) {
                if (data.length != 0) {
                    for (var x = 0; x < data.length; x++) {
                        var product = data[x];
                        products  += '<option value="' + product.id + '">' + product.name + '</option>';
                    }
                    $('#product').append(products);
                }
            }, "json");
            console.log(products);
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
 