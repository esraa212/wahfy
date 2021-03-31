var Order = function () {

    var init = function () {
        handleSubmit();
    };

    var handleSubmit = function () {


        $('#orderForm').submit(function () {

            var action = config.url + '/order';
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: action,
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#orderForm .submit-form').prop('disabled', false);
                    $('#orderForm .submit-form').html('confirm');
                    console.log(data);
                    // toastr.success(data.message);

                    if (data.message == 'Your Order  Has Been Applied Successfully') {
                        console.log(data);
                        toastr.success(data.message);
                        window.setTimeout(function () {

                            // Move to a new location Home
                         window.location.href = config.url+"/";

                        }, 2000);
                       
    
                    } else {
                        toastr.warning(data.error);
                        if(data.errors){
                            toastr.warning(data.errors);

                        }
                        console.log(data);


                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#orderForm .submit-form').prop('disabled', false);
                    $('#orderForm .submit-form').html('confirm');
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
    Order.init();
});