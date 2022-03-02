(function ($){


    function loadAdminsTable(){
        let holder = $('.admins-table-holder');
        holder.load(
            holder.data('ajaxurl')
        );
    }


    $('#createAdminForm').submit(function(e){
        e.preventDefault();

        let url = $(this).attr('action');
        let type = $(this).attr('method');
        let data = new FormData(this);
        //Letting the server side know we need ajax friendly response
        data.append('ajax', 'ajax');

        //Error holders
        let usernameError = $(this).find('.error-username');
        let emailError = $(this).find('.error-email');
        let passwordError = $(this).find('.error-password-confirmation');

        let successHolder = $(this).find('.success')

        usernameError.html('');
        emailError.html('');
        passwordError.html('');
        successHolder.html('');

        $.ajax({
            type : type,
            url : url,
            data : data,
            contentType: false,
            processData: false,
            cache: false,
            success : function(response) {
                if(response.success != undefined && response.success == true){
                    successHolder.html(response.message);
                    loadAdminsTable();
                }
            },
            statusCode : {
                422 : function(response, status, jqhxr){
                    //displaying validation errors on the error holders
                    (response.responseJSON.errors.username != undefined) ? usernameError.text(response.responseJSON.errors.username) : usernameError.text('');
                    (response.responseJSON.errors.email != undefined) ? emailError.text(response.responseJSON.errors.email) : emailError.text('');
                    (response.responseJSON.errors.password != undefined) ? passwordError.text(response.responseJSON.errors.password) : passwordError.text('');
                }
            }
        });

    });


    $('.delete-admin').on('click', function(e){
        e.preventDefault()
        let url = $(this).data('ajaxurl');

        $.ajax({
            type : 'GET',
            url : url
        }).done(function(response){
            if(response.success != undefined && response.success == true){
                alert(response.message);
                loadAdminsTable();
            }
        }).fail(function(jqXHR, textStatus){
            alert(statusCode);
        });
    });



})(jQuery);