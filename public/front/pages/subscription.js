var Subscribe = function () {

    var init = function () {
        handleSubmit();
    };

    var handleSubmit = function () {


        $('#subscribeEmailForm').submit(function () {

            var action = config.url + '/subscribe';
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: action,
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#subscribeEmailForm .submit-form').prop('disabled', false);
                    $('#subscribeEmailForm .submit-form').html('subscribe');
                    console.log(data);
                    // toastr.success(data.message);

                    if (data.message == 'email Has Been added Successfully') {
                        console.log(data);
                        toastr.success(data.message);
                    } else {
                        toastr.warning(data.errors);
                        console.log(data);


                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#subscribeEmailForm .submit-form').prop('disabled', false);
                    $('#subscribeEmailForm .submit-form').html('subscribe');
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
    Subscribe.init();
});