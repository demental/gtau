function startupAdminTools() {
    var s=document.createElement('script');
    s.setAttribute('src','/js/jquery.block.js');document.body.appendChild(s);
    var s2=document.createElement('script');
    s2.setAttribute('src','/js/interface.js');document.body.appendChild(s2);
    var s3=document.createElement('script');
    s3.setAttribute('src','/js/source/idrag.js');document.body.appendChild(s3);
    s3.onload=function(){initAdminToolBox()};
}
function initAdminToolBox() {
  var cs=document.createElement('link');
  cs.setAttribute('href','/css/admintools.css');
  cs.setAttribute('rel','stylesheet');
  cs.setAttribute('type','text/css');
  document.body.appendChild(cs);

  if($('#adminbox').size()>0){pattern='#adminbox';} else {pattern='<div id="adminbox"></div>';}
  $(pattern)
    .css({'position':'absolute','left':'60%','top':'30px'})
    .appendTo($('body'))
    .Draggable()
    .load('/backoffice/index.php?liveedit='+top.location.href,function(){$(this).unblock();initAdminToolControls()})
    .block('<img src="images/indicator.gif" />');
}
function initAdminToolControls() {
  $('#adminbox').find('a[@rel=modtitle]')
    .bind('mouseover',
      function(){
        $('.content_title').addClass('adminselectedblock')
      }
    )
    .bind('mouseout',
      function(){
        $('.content_title').removeClass('adminselectedblock')
      }
    );
  $('#adminbox').find('a[@rel=modheader]')
    .bind('mouseover',
      function(){
        $('.content_header').addClass('adminselectedblock')
      }
    )
    .bind('mouseout',
      function(){
        $('.content_header').removeClass('adminselectedblock')
      }
    );
  $('#adminbox').find('a[@rel=modbody]')
    .bind('mouseover',
      function(){
        $('.content_body').addClass('adminselectedblock')
      }
    )
    .bind('mouseout',
      function(){
        $('.content_body').removeClass('adminselectedblock')
      }
    );
}