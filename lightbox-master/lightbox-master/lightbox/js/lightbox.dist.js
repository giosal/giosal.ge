!function(a){a.lightbox||(a.lightbox={}),a.lightbox.elements=void 0,a.lightbox.data=void 0,a.lightbox.dom=void 0,a.lightbox.maxDimensions=void 0,a.lightbox.fn={getElements:function(){a.lightbox.elements=a("[data-lightbox]")},createDom:function(){a.lightbox.dom={},a.lightbox.dom.lightbox=a('<div id="lightbox"></div>'),a.lightbox.dom.lightbox.bg=a('<div class="lightbox_bg"></div>').appendTo(a.lightbox.dom.lightbox),a.lightbox.dom.lightbox.container=a('<div class="lightbox_container"></div>').appendTo(a.lightbox.dom.lightbox),a.lightbox.dom.lightbox.container.window=a('<div class="lightbox_window"></div>').appendTo(a.lightbox.dom.lightbox.container),a.lightbox.dom.lightbox.container.window.frame=a('<div class="lightbox_frame"></div>').appendTo(a.lightbox.dom.lightbox.container.window),a.lightbox.dom.lightbox.container.window.frame.img=a("<img>").appendTo(a.lightbox.dom.lightbox.container.window.frame),a.lightbox.dom.lightbox.nav=a('<div class="lightbox_nav"></div>'),a.lightbox.dom.lightbox.ajax=a('<div class="lightbox_ajax"></div>').appendTo(a.lightbox.dom.lightbox.container.window),a.lightbox.dom.lightbox.buttons={},a.lightbox.dom.lightbox.buttons.close=a('<button class="lightbox_close"><span class="icon"></span><span class="text">Close</span></button>').appendTo(a.lightbox.dom.lightbox.container.window.frame),a.lightbox.dom.lightbox.buttons.previous=a('<button class="lightbox_previous"><span class="icon"></span><span class="text">Previous</span></button>').appendTo(a.lightbox.dom.lightbox.nav),a.lightbox.dom.lightbox.buttons.next=a('<button class="lightbox_next"><span class="icon"></span><span class="text">Next</span></button>').appendTo(a.lightbox.dom.lightbox.nav),a.lightbox.dom.lightbox.appendTo("body")},createBinds:function(){a.lightbox.elements.on("click",function(b){b.preventDefault();var c=a(this);a.lightbox.fn.getData(c),a.lightbox.fn.doNav(),a.lightbox.fn.createNavBinds(),a.lightbox.fn.showLightbox(),a.lightbox.fn.showAjaxLoader(),a.lightbox.fn.loadImg(),a.lightbox.fn.getMaxDimensions(),a.lightbox.fn.setMaxDimensions()}),a.lightbox.dom.lightbox.container.window.frame.img.on("load",function(){a.lightbox.data.current.loaded=!0,a.lightbox.fn.showButtonClose(),a.lightbox.fn.hideAjaxLoader(),a.lightbox.fn.showImg()})},createNavBinds:function(){a.lightbox.dom.lightbox.buttons.previous.off().on("click",function(b){a.lightbox.fn.changeImage("previous")}),a.lightbox.dom.lightbox.buttons.next.off().on("click",function(b){a.lightbox.fn.changeImage("next")}),a.lightbox.dom.lightbox.buttons.close.off().on("click",function(b){a.lightbox.fn.closeLightbox()})},getData:function(b){a.lightbox.data||(a.lightbox.data={}),a.lightbox.data.current={},a.lightbox.data.current.src=b.data("lightbox-src")?b.data("lightbox-src"):b.attr("href"),a.lightbox.data.group={},a.lightbox.data.group.name=""==b.data("lightbox")?void 0:b.data("lightbox"),a.lightbox.data.group.elements=a.lightbox.elements.map(function(b,c){return a(c).data("lightbox")==a.lightbox.data.group.name?c:void 0}),a.lightbox.data.group.elements.map(function(b,c){(a(c).data("lightbox-src")==a.lightbox.data.current.src||a(c).attr("href")==a.lightbox.data.current.src)&&(a.lightbox.data.current.index=b)})},changeImage:function(b){"previous"==b?a.lightbox.data.current.index=0==a.lightbox.data.current.index?a.lightbox.data.group.elements.length-1:a.lightbox.data.current.index-1:"next"==b&&(a.lightbox.data.current.index=a.lightbox.data.current.index==a.lightbox.data.group.elements.length-1?0:a.lightbox.data.current.index+1),a.lightbox.data.current.src=a.lightbox.data.group.elements.eq(a.lightbox.data.current.index).data("lightbox-src")?a.lightbox.data.group.elements.eq(a.lightbox.data.current.index).data("lightbox-src"):a.lightbox.data.group.elements.eq(a.lightbox.data.current.index).attr("href"),a.lightbox.fn.hideButtonClose(),a.lightbox.fn.hideImg(),a.lightbox.fn.removeImg(),a.lightbox.fn.showAjaxLoader(),a.lightbox.fn.loadImg()},doNav:function(){a.lightbox.data.group.elements.length>1?a.lightbox.fn.insertNav():a.lightbox.fn.removeNav()},insertNav:function(){a.lightbox.dom.lightbox.nav.insertBefore(a.lightbox.dom.lightbox.container)},removeNav:function(){a.lightbox.dom.lightbox.nav.remove()},showImg:function(){a.lightbox.dom.lightbox.container.window.frame.img.addClass("visible")},hideImg:function(){a.lightbox.dom.lightbox.container.window.frame.img.removeClass("visible")},removeImg:function(){a.lightbox.dom.lightbox.container.window.frame.img.attr("src",""),a.lightbox.data.current.loaded=!1},loadImg:function(){a.lightbox.dom.lightbox.container.window.frame.img.attr("src",a.lightbox.data.current.src)},getMaxDimensions:function(){a.lightbox.maxDimensions||(a.lightbox.maxDimensions={}),a.lightbox.maxDimensions.width=Math.floor(a.lightbox.dom.lightbox.container.window.width()),a.lightbox.maxDimensions.height=Math.floor(a.lightbox.dom.lightbox.container.window.height())},setMaxDimensions:function(){a.lightbox.dom.lightbox.container.window.frame.img.css({"max-width":a.lightbox.maxDimensions.width+"px","max-height":a.lightbox.maxDimensions.height+"px"})},showLightbox:function(){a.lightbox.dom.lightbox.addClass("visible")},hideLightbox:function(){a.lightbox.dom.lightbox.removeClass("visible")},closeLightbox:function(){a.lightbox.fn.hideImg(),a.lightbox.fn.hideButtonClose(),a.lightbox.fn.removeImg(),a.lightbox.fn.hideLightbox()},showButtonClose:function(){a.lightbox.dom.lightbox.buttons.close.addClass("visible")},hideButtonClose:function(){a.lightbox.dom.lightbox.buttons.close.removeClass("visible")},showAjaxLoader:function(){a.lightbox.dom.lightbox.ajax.addClass("visible")},hideAjaxLoader:function(){a.lightbox.dom.lightbox.ajax.removeClass("visible")}},a.lightbox.init=function(){a.lightbox.fn.getElements(),a.lightbox.fn.createDom(),a.lightbox.fn.createBinds(),a(window).on("resize",function(b){a.lightbox.fn.getMaxDimensions(),a.lightbox.fn.setMaxDimensions()})}()}(jQuery);