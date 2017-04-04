$(function () {
  $('.pr-price').hide();
  $('.d2').show();

  $('#select').on("change",function () {
    $('.pr-price').hide();
    $('.d'+$(this).val()).show();
  }).val("2");
});

$(function () {
  $('.pr-price-mobile').hide();
  $('.d2').show();

  $('#select').on("change",function () {
    $('.pr-price-mobile').hide();
    $('.d'+$(this).val()).show();
  }).val("2");
});
