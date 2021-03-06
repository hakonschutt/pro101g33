$(document).ready(function(){
     $("a").on('click', function(event) {

         if (this.hash !== "") {
             event.preventDefault();

             var hash = this.hash;

             $('html, body').animate({
             scrollTop: $(hash).offset().top - 20
             }, 1000, function(){

             window.location.hash = hash;
             });

             $('#nav-icon').toggleClass('open');

             animateRight = (parseInt($rightMenu.css('right')) == 0) ? rightVal : 0;
             $rightMenu.animate({
                 right: animateRight + 'px'
             });

             animateLeft = (parseInt($leftMenu.css('left')) == 0) ? leftVal : 0;
             $leftMenu.animate({
                 left: animateLeft + 'px'
             });
         }
     });
 });