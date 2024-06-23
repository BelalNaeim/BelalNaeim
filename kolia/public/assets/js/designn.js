$('a.modal').click(function(e) {
  e.stopPropagation();
  $('body').addClass('modal-active');
});
$('div.modal').click(function(e) {
  e.stopPropagation();
});
$('body').click(function () {
  $(this).removeClass('modal-active');
  window.clearTimeout(window.t);
  $('button').removeClass('loading');
  $('.modal').removeClass('success');
});
$('a.nav').click(function() {
  $('div.modal').attr('class','modal '+$(this).data('target'));
  $('div.modal a.nav').removeClass('active');
  $('div.modal a.nav.'+$(this).data('target')).addClass('active');
  /* Without pulling in my jquery parent visiblility thing, I'm just going to hard code it */

  //$('div.modal input'+($(this).data('target') == 'login' ? '#username' : '#email')).focus();
});

$('form').submit(function(e) {
  e.preventDefault;
  $('button').addClass('loading');
  window.t = setTimeout(function() {
    $('.modal').addClass('success');
    window.t = setTimeout(function() {
      $('body').click();
      $('button').removeClass('loading');
      $('.modal').removeClass('success');
    },5000);
  },1000+Math.random()*2000);
  return false;
});

/* Don't look at the man behind the curtain! */
$('a').click(function(e){e.preventDefault();});$('a.nav').first().click();
