$('document').ready(function() {
  //返回顶部
  if($('#back-top').attr('state') == 'on'){
    $('#back-top').show();
    setInterval(function(){
      if($(window).scrollTop() == 0){
        $('#back-top').hide();
      }else{
        $('#back-top').show();
      }
    }, 100);
  }
});
function BackTop() {
  $('body,html').animate({
    scrollTop: 0
  }, 500);
}
