jQuery( function ( $ ) {
 
$(".allow_numeric").on("input", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^\d\.]+/, ""));
   if ((evt.which < 48 || evt.which > 57 || evt.which === 110)) 
   {
     evt.preventDefault();
   }
 });
 


});


