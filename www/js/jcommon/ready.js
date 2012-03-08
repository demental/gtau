$(function(){
  $.ifixpng();
  $('a.newwindow').click(function(){window.open($(this).attr('href'),'newwin');return false;});
});