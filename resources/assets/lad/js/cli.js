(function ($){

    $('#cliForm').submit(function(e){
        e.preventDefault();
        let url = $(this).attr('action');
        let outPutHolder = $('#cliOutPut');
        let data = new FormData(this);
        outPutHolder.html('Please Wait');
        $.ajax({
            type : 'POST',
            url : url,
            data : data,
            contentType: false,
            processData: false,
            cache: false,
            success : (response) => {
                outPutHolder.html(response.output);
            },
            statusCode : {
                500 : function(response, status, jqhxr){
                    outPutHolder.html(response.statusText);
                    outPutHolder.append('\n' + response.responseJSON.message);
                }
            }
        });
    });

})(jQuery);