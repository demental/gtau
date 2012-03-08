jQuery.fn.colorPicker=function() {
  var zeselect=$(this);

  var colors=new Array();
  var tab='<div id="colorpickerlist" style="z-index:3000;display:none;width:150px;background:#000;margin:0;padding:0;position:absolute;">';
  $(this).children().each(function(){colors[this.value]=this.value;tab+='<div style="border:1px solid #000;height:20px"><div style="margin:2px;width:18px;height:18px;float:left;background:'+this.value+'"></div>'+this.text+'</div>';});
  tab+='</div>';
  $(this).after(tab);
  selected='<div style="z-index:2000;width:40px;height:20px;border:1px solid #000;background:#000" id="picker"></div>';
  $('#colorpickerlist div').hover(function(){$(this).css({border:'1px solid #fff'})},function(){$(this).css({border:'1px solid #000'})});
  $('#colorpickerlist div').click(function(){
                                              var c = colorconvert($(this).css('background-color'));
                                              if(c==undefined || c=='transparent') {
                                                c = colorconvert($(this).find('div').css('background-color'));
                                              }
                                              zeselect.val(c);
                                              $('#picker').css({backgroundColor: zeselect.val()});
                                              $('#colorpickerlist').hide();
                                              return false;
                                            });
                            
  $(this).after(selected);
  $(this).hide();
  $('#picker').click(function(){$('#colorpickerlist').toggle()});
  $('#picker').css({backgroundColor:zeselect.val()});
  
  return $(this);
}
colorconvert = function (rgb) {

    var expr1=/#(.{3,6})/;
    if(expr1.test(rgb)) {
      return rgb;
    }
    var expr=/rgb\((\d+), (\d+), (\d+)\)/;
    if(expr.test(rgb)) {
      var res = expr.exec(rgb);
      var r = parseInt(res[1]);
      var g = parseInt(res[2]);
      var b = parseInt(res[3]);      
    } else {
      return undefined;
    }
    return '#' + (r < 16 ? '0' : '') + r.toString(16) +
           (g < 16 ? '0' : '') + g.toString(16) +
           (b < 16 ? '0' : '') + b.toString(16);
  }