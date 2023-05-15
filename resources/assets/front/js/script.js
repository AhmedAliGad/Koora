$( document ).ready(function() {
      // Dropdowns clickable
      var $dropdowns = getAll('.dropdown:not(.is-hoverable)');

      if ($dropdowns.length > 0) {
        $dropdowns.forEach(function ($el) {
          $el.addEventListener('click', function (event) {
            event.stopPropagation();
            $el.classList.toggle('is-active');
          });
        });

        document.addEventListener('click', function (event) {
          closeDropdowns();
        });
      }

      function closeDropdowns() {
        $dropdowns.forEach(function ($el) {
          $el.classList.remove('is-active');
        });
      }

  // Close dropdowns if ESC pressed
  document.addEventListener('keydown', function (event) {
    var e = event || window.event;
    if (e.keyCode === 27) {
      closeDropdowns();
    }
  });

  // Functions

  // function getAll(selector) {
  //   return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
  // }
  // $('#sold_out_tag').on('click', function(e) {
  //   e.preventDefault();
  //  $('#lightgallery .lightselect').trigger('click');
  // });
  // var $lg = $('#lightgallery');

});
window.onscroll = function() {myFunction()};

function myFunction() {
  if (window.pageYOffset >= 100) {
    document.getElementById("fixed_nav").classList.add("scroll");
  } else {
    document.getElementById("fixed_nav").classList.remove("scroll");
  }
}
document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  };
  // setTimeout(function(){ 
  //   $("#myloader").removeClass('is-active');
  //   $("body").removeClass('loading-body');
  // }, 1000);


  // $('.with-placeholder option:first').attr('disabled', 'disabled');
});