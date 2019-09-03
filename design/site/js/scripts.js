$(document).ready(function () {

    // login gradient border
    $('.loginDiv .mainForm .form-control').each(function(){
        if ($(this).val()){
            $(this).css('border-width','0')
            $(this).parent().find('.inputFocus').css('opacity' , '1')
        }
    });

    $('.loginDiv .mainForm .form-control').focusin(function() {
        $(this).parent().find('.inputFocus').css('opacity' , '1')
    });
    $('.loginDiv .mainForm .form-control').focusout(function() {
        if ($(this).val()){
            $(this).css('border-width','0')
            $(this).parent().find('.inputFocus').css('opacity' , '1')
        }else{
            $(this).css('border-width','1px')
        $(this).parent().find('.inputFocus').css('opacity' , '0')
        }
    });

    //search
    $('#buttonsearch , #buttonsearch2').click(function(){
        $('#formsearch').slideToggle( "fast",function(){} );
        $('.container.contentContainer .overSearchDiv').fadeToggle();
        $('#searchbox').focus()
        $('.openclosesearch').toggle();
    });
    $('.closeSearch').click(function(){
        $(this).parent().css('color','#fff');
    });

    //show reservType Block
    $('.showReservType').click(function(event){
        $('.reservType').fadeIn(500);
        event.preventDefault();
    });
    //hide reservType Block
    $('.closeReservType').click(function(event){
        $('.reservType').fadeOut(500);
        event.preventDefault();
    });


    //delete notification 
    $('.notification .noti a.deleteNoti').click(function(){
        $(this).parent().remove()
    });

    // Start Navbar

    $("nav.navbar .toggle i").click(function () {
        $(".overlay").css({
           "transform" : "scaleX(1)" 
        });
        
        $("nav.navbar ul").addClass('ulDir');
        
    });
    
    $("header .navbar .overlay").click(function(){
       $(this).removeAttr("style"); 
       $("nav.navbar ul").removeClass("ulDir"); 
    });
    
    
    
    // sliders
    $('#owl-demo , #owl-event').owlCarousel({
        center: true,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
	    autoplay: true,
        loop: true
    });

    $('#owl-demo2').owlCarousel({
        // center: true,
        dots: true,
	    autoplay: true,
        loop: true,
        animateOut: 'fadeOut',
        responsive: {
            0: {
                items: 2,
            },
            768: {
                items: 3,
                // center: false
            },
            992: {
                items: 6,
            }
        }
    });

    // upload profile img
    $(".editBtn").click(function(e) {
        // $(this).text(function(i, v){
        //     return v === 'تعديل حسابي' ? 'تأكيد' : 'تعديل حسابي'
        // });
        var re = $('.loginDiv.payDiv.profileDiv .profileDet .inputs .form-control').prop('readonly'); 
        $('.loginDiv.payDiv.profileDiv .profileDet .inputs .form-control').prop('readonly', !re);
        $('.loginDiv.payDiv.profileDiv .profileImg .changeImg').fadeToggle();
        $('.loginDiv.payDiv.profileDiv .profileImg .overlayImg').fadeToggle();

        var type = $(this).prop('type');
        if (type == 'submit'){
            $('#edit_profile').submit();
            return true;
        }

		e.preventDefault();
		$(this).attr('type', 'submit');
	});
    
  
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.profileImg .newImg').attr('src', ''+e.target.result +'');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });

    
    //scroll top
	var scrollButton = $("#scroll-top");
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 700) {
            scrollButton.fadeIn(1000);
        } else {
            scrollButton.fadeOut(1000);
        }
    });
    
    //click to scroll top
    scrollButton.click(function () {
        $('html,body').animate({scrollTop: 0}, 600);
    });
    


    //trigger nice scroll
    $("html").niceScroll({
        cursorcolor: "#0fd1fa",
        cursorwidth: "7px",
        cursorborder: '1px solid #0fd1fa',
        cursorborderradius: '3px'
    });
    
    
});

/* loading screen */
$(window).on('load', function () {

    $(".layer-preloader").fadeOut(700,function(){

        $(".lds-dual-ring").delay(1000).fadeOut(700);

        $("body").css("overflow-y", "auto");

    });

});