var Review = function () {

    var init = function () {
        handleSubmit();
    };

    var handleSubmit = function () {


        $('#productReview').submit(function () {

            var action = config.url + '/product_review';
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: action,
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#productReview .submit-form').prop('disabled', false);
                    $('#productReview .submit-form').html('subscribe');
                    console.log(data);
                    // toastr.success(data.message);

                    if (data.message == 'Your Review  Has Been added Successfully') {
                        console.log(data);
                        toastr.success(data.message);
                        $('#count').text('Review '+data.count+'');
                    } else {
                        toastr.warning(data.error);
                        console.log(data);


                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#productReview .submit-form').prop('disabled', false);
                    $('#productReview .submit-form').html('subscribe');
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
    Review.init();
});