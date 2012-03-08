$(function(){
  initfromtableActionsAfterCallback = function(){                               
    if(typeof(initfromtableActionsAfter)=='function') {
      initfromtableActionsAfter();
    }
  }

  rmerror=function(){ $('.ajaxFromTableError').animate({opacity:0,height:0},function(){$('.ajaxFromTableError').remove();})};  
  initfromtableActions = function() {
    $('.editlinelink').unbind('click').one('click',function() {
      var url=$(this).attr('href');
      var target='#'+$(this).attr('rel');
      $(target).load(url,initfromtableActions);
      return false;
    });
    $('.deletelinelink').unbind('click').one('click',function() {
      var url=$(this).attr('href');
      var target='#'+$(this).attr('rel');
      $.ajax({url:url,
        error:
        function(){$(target).append("Suppression non autorisée");},
        success:
        function(){$(target).remove();initfromtableActionsAfterCallback();}
       });
      return false;
    });
    setTimeout('rmerror()',2000);
    $(".updateFromTableForm").each(function(){$(this).resetForm()});
    $(".addFromTableForm").each(function(){$(this).clearForm()});
    $(".updateFromTableForm").unbind('submit').one('submit',function() {var zeuform=$(this);$(this).ajaxSubmit({target:'#'+$(zeuform).attr('target'),success:initfromtableActions});return false});
    $(".addFromTableForm").unbind('submit').one('submit',function() { var zeform=$(this);$.post($(this).attr("action")+"&ajax=1",
                                                  $(this).formSerialize(),  
                                                  function(data) {
                                                    $('#'+zeform.attr('target')).before(data);
                                                    initfromtableActions();
                                                  });
                                                  return false;
                                                }
                                      );
    initfromtableActionsAfterCallback();  

  }

  initfromtableActions(); 
});
