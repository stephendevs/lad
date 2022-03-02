(function ($){

    //Window scroll effect --> Effect on navbar
    $(window).scroll(function(){
        if($(this).scrollTop() > 150){
            $('#mainNavBar').addClass('fixed-top');
            $('#simpleFooter').addClass('fixed-bottom');
        }else{
            $('#mainNavBar').removeClass('fixed-top');
            $('#simpleFooter').removeClass('fixed-bottom');

        }
    });

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
          $('.sidebar .collapse').collapse('hide');
          $('#sidebarToggle').html('<i class="fa fa-angle-right"></i>');
        }else{
            $('#sidebarToggle').html('<i class="fa fa-angle-left"></i>');
        }
      });


    $('#changePasswordButton').on('click', function(){
        $('#changePasswordForm').toggleClass('d-none');
    });



    //Future cope alert
    $('.fs').click(function(e){
        e.preventDefault();
        alert('This is future functionality, not implemented yet .... WAIT FOR IT IN THE NEXT VERSION');
    });

    function renderImageOnSelect(targetInputId, imageHolderId){
        targetInputId.on('change', function() {

          if(typeof (FileReader) != undefined){
            imageHolderId.attr('src', '');
            var reader = new FileReader();

            reader.onload = function(e) {
              var image = e.target.result;
              imageHolderId.attr('src', image);
            }
            reader.readAsDataURL($(this)[0].files[0]);
          }else{

          }
        });
      }

      renderImageOnSelect($('#profileImage'), $('#profileImageHolder'));

      $('#changeAdminType').on('change', function(){
          alert('not yet implemeted');
      });


      ///window.open('http://127.0.0.1:8000/dashboard/mailer', 'hello', []);

})(jQuery);