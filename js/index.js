$(document).ready(function(){$("body a").click(function(){return $("html, body").stop().animate({scrollTop:$($(this).attr("href")).offset().top},2000),!1}),$(".scrollTop a").scrollTop(),(new WOW).init(),$(".jarallax").jarallax({speed:.5,imgSrc:null,imgWidth:null,imgHeight:null,enableTransform:!0,zIndex:-100})});