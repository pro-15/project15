$(document).ready(function() {

  // Radio box border
  $('.method').on('click', function() {
    $('.method').removeClass('blue-border');
    $(this).addClass('blue-border');
  });

  // Validation
  var $cardInput = $('.input-fields input');

//   $('.next-btn').on('click', function(e) {
//     $cardInput.removeClass('warning');

//     var isEmptyField = false;

//     $cardInput.each(function() {
//         var $this = $(this);

//         if (!$this.val()) {
//             $this.addClass('warning');
//             isEmptyField = true;
//         }
//     });

//     if (isEmptyField) {
//         alert("Enter full fields!");
//     }
// });


});
