// Menu Script

/*var menu = $('#side-menu');
menu.bind('keydown', function (evt) {
    if(evt.which===40){
        $('ul.dropdown-menu')[0].scrollTop = ($('ul.dropdown-menu li.active').index()) * 26;
    }
});

var scrollToVal = $(menu).scrollTop() + $('#side-menu').position().top;
$(scrolledArea).slimScroll({ scrollTo : scrollToVal + 'px' });*/

function addParselyValidations(){
	$('form').each(function(){ $(this).parsley().on('field:validated', function() {})});//validations
}

function disableBtn(btnId){
	setTimeout(function () {
		$(btnId).attr('disabled','disabled');
    });
}

function showPassword(ele) {
 var x = document.getElementById(ele);
 if (x.type === "password") {
   x.type = "text";
 } else {
   x.type = "password";
 }
}