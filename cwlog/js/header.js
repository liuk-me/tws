$(document).ready(function () {
  $("#nav-search-btn").click(function () {
    if($("#nav-search-i").attr("class") == "fa fa-search"){
      $("#nav-search-i").attr("class", "fa fa-remove");
      $("#nav-link").hide();
      $("#nav-search-input").fadeIn();
      $("#nav-search-submit").fadeIn();
    }else{
      $("#nav-search-i").attr("class", "fa fa-search");
      $("#nav-link").fadeIn();
      $("#nav-search-input").hide();
      $("#nav-search-submit").hide();
    }
  });
});
