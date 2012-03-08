jQuery.fn.livesearch=function(options) {

  var zeinput=$(this);
  var pointer=-1;
  var navigateResults = function(event){
    k = (window.Event) ? event.which : event.keyDown;
    results = $("#searchresult a:gt(0)");
    switch(k) {
      case 40:results.eq(pointer).removeClass('selected');pointer++;if(pointer>(results.length-1)) {pointer = 0;};results.eq(pointer).addClass('selected');break;// Arrow down      
      case 38:results.eq(pointer).removeClass('selected');pointer--;if(pointer<0) {pointer = results.length-1;};results.eq(pointer).addClass('selected');break;// Arrow up
      case 13:if(pointer!=-1){top.location.href=results.eq(pointer).attr('href');};break;// Enter
    }
  }

  $('<div id="searchresult"><h3><span class="close"><a id="searchresultclose">[X]</a></span>Résultats pour <em id="searchresultText"></em></h3><div id="searchresultcontainer"></div></div>')
                                    .insertAfter(zeinput)
                                    .hide();
  $("#searchresultclose").click(function(){$("#searchresult").hide()});                                  
  $('<img src="images/indicator.gif" id="searchresultloader"/>')
    .insertAfter(zeinput)
    .hide();
  if(options.autosearch==true) {
    zeinput.bind('keyup',function(event) {
      lastTyped=new Date();
          k = (window.Event) ? event.which : event.keyPress;
      if(this.value.length>options.minchar && k!=37 && k!=38 && k!=39 && k!=40 && k!=13) {
        setTimeout(
          function(){
            $('#searchresultText').text(zeinput.attr('value'));
            now = new Date();
            if(now.getTime()-lastTyped.getTime()<600) {return false;}
            $('#searchresultloader').show();
            $('#searchresultcontainer').load(options.url,{searchtext: zeinput.attr('value')},function() {$("#searchresult").show();pointer=-1;zeinput.bind('keydown',navigateResults);$("#searchresultloader").hide();});
          },800);
      }
    }
    );
  } else {
    $('<input type="button" value=">" id="searchresultbutton"/>')
      .insertAfter(zeinput)
      .click(function() {
        $('#searchresultcontainer')
          .load(  options.url,
                {searchtext: zeinput.attr('value')},
                function() {$("#searchresult").show('fast');$("#searchresultloader").hide();$("#searchresultbutton").show()});
        $(this).hide();
        $('#searchresultloader').show();
      });
  }
  return $(this);
}  