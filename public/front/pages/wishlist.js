var Wishlist = function () {

    var init = function () {
        handleSubmit();
    };

    var handleSubmit = function () {


        $('#addToWishlist').submit(function () {

            var action = product.wishlist_url + '/' + product.product_id;
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: action,
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#addToWishlist .submit-form').prop('disabled', false);
                    console.log(data);
                    // toastr.success(data.message);

                    if (data.message) {
                        console.log(data);
                        toastr.success(data.message);
                    } else {
                        toastr.warning(data.error);
                        if (data.errors) {
                            toastr.warning(data.errors);
                        }
                        console.log(data);


                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#addToWishlist .submit-form').prop('disabled', false);
                    $('#addToWishlist .submit-form').html('Added');
                    toastr.warning(xhr);

                },
                dataType: "json",
                type: "POST"
            });
            return false;

        })




    }

    return {
        init: function () {
            init();
        },
        empty: function () {
            $('.has-error').removeClass('has-error');
            $('.has-success').removeClass('has-success');
            $('.help-block').html('');
            My.emptyForm();
        }
    };

}();

jQuery(document).ready(function () {
    Wishlist.init();
});