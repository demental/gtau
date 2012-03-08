$(document).ready(function(){
 //hide all descriptions apart from the first
 $("#screenshots .description:gt(0)").hide();
 //load the data
 //Set the image to hide the loader when an image is finished loading
 $("#mainphoto").load(function(){
 $("#loader").stop().hide();
 $(this).animate({opacity:0.9999},"normal");
 clearInterval(loadTimer);
 });
 initIndexOf();
});

function loadImages(){
 //store the data
 imageData = data;
 imagesLoadedCache= new Array();
 imagesLoadedCache[0] = 0;
 //bind what to do on clicks of description titles
 $("#screenshots .title").click(function(){
 clickIndex = $("#screenshots .title").index( $(this)[0] );
 if (clickIndex != currentSelection){
 displayImageAndDescription(clickIndex);
 currentSelection = clickIndex;
 }
 return false;
 });
}

function displayImageAndDescription(index){
 //collapse current selection
 $("#screenshots .description:eq("+currentSelection+")").slideUp();
 //reveal clicked selection
 $("#screenshots .description:eq("+index+")").slideDown();
 //load the image
 selectedScreenPath = imageData.screens[index];
 $("#screenshots_image").animate({opacity:0.0},"fast", function(){
 //Display the loader if it's needed
 displayImageLoader(index);
 //Keep windows screenshots away from our Mac users eyes
 if (imageData.macaltscreen.indexOf(index) > -1){
 var agt = navigator.userAgent.toLowerCase();
 if (agt.indexOf("mac") != -1)
 selectedScreenPath = selectedScreenPath + "mac";
 }
 //Swap images
 $("#screenshots_image").attr("src", imageData.imagePath + selectedScreenPath +".jpg");
 //$("#screenshots_image").animate({opacity:0.9999},"normal");
 });
}

/**
* Display image loader if the image has not previously been loaded and return the result
*/
function displayImageLoader(index){
 if (imagesLoadedCache[index] == undefined) {
 //give the browser the chance to get the image within 100ms
 loadTimer = window.setInterval(function(){
 $("#loader").show();
 },100);
 //cache that we have now preloaded this image
 imagesLoadedCache[index] = index;
 }
}

function initIndexOf(array, object){
if (!Array.prototype.indexOf)
{
 Array.prototype.indexOf = function(elt /*, from*/)
 {
 var len = this.length;

 var from = Number(arguments[1]) || 0;
 from = (from < 0)
 ? Math.ceil(from)
 : Math.floor(from);
 if (from < 0)
 from += len;

 for (; from < len; from++)
 {
 if (from in this &&
 this[from] === elt)
 return from;
 }
 return -1;
 };
}
}

