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
