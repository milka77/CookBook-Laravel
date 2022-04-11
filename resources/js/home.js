// Click event for favorite button
$('.fav').on('click', function() {
  $(this).toggleClass('fa-regular text-secondary');
  $(this).toggleClass('fa-solid text-danger');
});

// Click event for like button
$('.like').on('click', function() {
  $(this).toggleClass('fa-regular text-secondary');
  $(this).toggleClass('fa-solid text-primary');
});

// Click event for dislike button
$('.dislike').on('click', function() {
  $(this).toggleClass('fa-regular text-secondary');
  $(this).toggleClass('fa-solid text-primary');
});

// Changing the background color for the navigation bar 
$(document).ready(function() {
  $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll > 250) {
          $('#nav').removeClass('nav-bg-light');
          $('#nav').addClass('nav-bg-dark');
          $('#search-btn').removeClass('btn-dark');
          $('#search-btn').addClass('btn-outline-light');
      } else {
          $('#nav').removeClass('nav-bg-dark');
          $('#nav').addClass('nav-bg-light');
          $('#search-btn').removeClass('btn-outline-light');
          $('#search-btn').addClass('btn-dark');
      }
  });
});
