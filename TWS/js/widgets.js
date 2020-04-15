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

function BackTop(){
  $('body,html').animate({
    scrollTop: 0
  },1000);
}

function BaiduSEO(){
  var bp = document.createElement('script');
  var curProtocol = window.location.protocol.split(':')[0];
  if (curProtocol === 'https') {
    bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
  } else {
    bp.src = 'http://push.zhanzhang.baidu.com/push.js';
  }
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(bp, s);
}