/**
 * @name		jQuery touchTouch plugin
 * @author		Martin Angelov
 * @version 	1.0
 * @url			http://www.sucaijiayuan.com
 * @license		MIT License
 */

(function(){

	/* Private variables */
    var current = 0;
    var overlay = $('<div id="galleryOverlay">'),
        slider = $('<div id="gallerySlider">'),
        prevArrow = $('<a id="prevArrow"></a>'),
        nextArrow = $('<a id="nextArrow"></a>'),
        roateright = $('<a class="turn-left J-turn-right" href="javascript:;"><img src="/Home/static/images/xuan.png"/></a>' ),
        pageSpan = $('<span id="pagelimit"></span>'),
        overlayVisible = false;


	/* Creating the plugin */

    $.fn.touchTouch = function(){
        overlay.append(roateright);
        roateright.click(function (e) {
            e.preventDefault();
            router();
        });
        var placeholders = $([]),
            pl1=[],
            index = 0,
            items = this;

        // Appending the markup to the page
        overlay.hide().appendTo('body');
        slider.appendTo(overlay);
        pageSpan.appendTo(overlay);


        // Creating a placeholder for each image
        items.each(function(){
            placeholders = placeholders.add($('<div class="placeholder">'));

        });

        // Hide the gallery if the background is touched / clicked
        slider.append(placeholders).on('click',function(e){
            hideOverlay();
        });

        // Listen for touch events on the body and check if they
        // originated in #gallerySlider img - the images in the slider.
        $('body').on('touchstart', '#gallerySlider img', function(e){

            var touch = e.originalEvent,
                startX = touch.changedTouches[0].pageX;

            slider.on('touchmove',function(e){

                e.preventDefault();

                touch = e.originalEvent.touches[0] ||
                    e.originalEvent.changedTouches[0];

                if(touch.pageX - startX > 10){
                    slider.off('touchmove');
                    showPrevious();
                }
                else if (touch.pageX - startX < -10){
                    slider.off('touchmove');
                    showNext();
                }

            });

            // Return false to prevent image
            // highlighting on Android
            return false;



        }).on('touchend',function(){
            slider.off('touchmove');
        });

        // Listening for clicks on the thumbnails

        //评论事件


        items.on('click', function(e){
            e.preventDefault();
            // Find the position of this image
            // in the collection

            index = items.index(this);
            showOverlay(index);
            showImage(index);

            calcPages(items,index);
            // Preload the next image
            preload(index+1);

            // Preload the previous
            preload(index-1);
            $(document).data("overlayVisible",true);
            e.cancelBubble = true;    //取消冒泡事件
            //e.stopPropagation();

        });



        function calcPages(items,index){
            pageSpan.text((index+1)+"/"+items.length);

        }
        // If the browser does not have support
        // for touch, display the arrows
        if ( !("ontouchstart" in window) ){
            overlay.append(prevArrow).append(nextArrow).append(roateright);

            prevArrow.click(function(e){
                e.preventDefault();
                showPrevious();
            });

            nextArrow.click(function(e){
                e.preventDefault();
                showNext();
            });
            roateright.click(function (e) {
                e.preventDefault();
                router();
            })
        }

        // Listen for arrow keys
        $(window).bind('keydown', function(e){

            if (e.keyCode == 37){
                showPrevious();
            }
            else if (e.keyCode==39){
                showNext();
            }

        });


		/* Private functions */


        function showOverlay(index){

            // If the overlay is already shown, exit
            if (overlayVisible){
                return false;
            }

            // Show the overlay
            overlay.show();

            setTimeout(function(){
                // Trigger the opacity CSS transition
                overlay.addClass('visible');
            }, 100);

            // Move the slider to the correct image
            offsetSlider(index);

            // Raise the visible flag
            overlayVisible = true;
        }

        function hideOverlay(){
            // If the overlay is not shown, exit
            var obj1 = $("#gallerySlider .placeholder").eq(index).find("img");
            current = 0;
            if(!overlayVisible){
                return false;
            }

            // Hide the overlay
            overlay.hide().removeClass('visible');
            $(obj1).css({'transform':'rotate(0deg)','width':'auto','height':'auto','margin-left': '0', 'margin-top': '0'});
            overlayVisible = false;
            $(document).data("overlayVisible",overlayVisible);
        }

        function offsetSlider(index){
            // This will trigger a smooth css transition
            slider.css('left',(-index*100)+'%');
        }

        // Preload an image by its index in the items array
        function preload(index){
            setTimeout(function(){
                showImage(index);
            }, 1000);
        }

        // Show image in the slider
        function showImage(index){

            // If the index is outside the bonds of the array
            if(index < 0 || index >= items.length){
                return false;
            }

            // Call the load function with the href attribute of the item
            loadImage(items.eq(index).attr('href'), function(){
                placeholders.eq(index).html(this);
            });
        }

        // Load the image and execute a callback function.
        // Returns a jQuery object

        function loadImage(src, callback){
            var img = $('<img>').on('load', function(){
                callback.call(img);
            });

            img.attr('src',src);
        }

        function showNext(){

            var obj1 = $("#gallerySlider .placeholder").eq(index).find("img");
            current = 0;
            // If this is not the last image
            if(index+1 < items.length){
                index++;
                offsetSlider(index);
                preload(index+1);
                calcPages(items,index);

                $(obj1).css({'transform':'rotate(0deg)','width':'auto','height':'auto','margin-left': '0', 'margin-top': '0'});
            }
            else{
                // Trigger the spring animation

                slider.addClass('rightSpring');
                setTimeout(function(){
                    slider.removeClass('rightSpring');
                },500);
            }

        }

        function showPrevious(){
            var obj1 = $("#gallerySlider .placeholder").eq(index).find("img");
            current = 0;
            // If this is not the first image
            if(index>0){
                index--;
                offsetSlider(index);
                preload(index-1);
                calcPages(items,index);
                $(obj1).css({'transform':'rotate(0deg)','width':'auto','height':'auto','margin-left': '0', 'margin-top': '0'});
            }
            else{
                // Trigger the spring animation

                slider.addClass('leftSpring');
                setTimeout(function(){
                    slider.removeClass('leftSpring');
                },500);
            }
        }
        function router() {
            var obj1 = $("#gallerySlider .placeholder").eq(index).find("img");


            var objwidth =parseFloat(obj1.css('width'));

            var ll0='0';
            var ll180='-180';
            var objheight =parseFloat(obj1.css('height'));
            current = (current-90)%360;
            var changeleft = parseFloat(objwidth-objheight)/2;
            $(obj1).css({'margin-left':0,'margin-top':0});
            $(obj1).css({'margin-left':-changeleft,'margin-top':changeleft});
            if(  current==ll0){
                $(obj1).css({'margin-left':0,'margin-top':0});
            }else if( current==ll180 ){

                var changeleft = parseFloat(objwidth-objheight)/2;
                $(obj1).css({'margin-left':0,'margin-top':0});
            }else if(objwidth<objheight){
                var changeleft1 = parseFloat(objwidth-objheight)/2;
                $(obj1).css({'width':objwidth,'height':objheight});

            }

            $(obj1).css({'transform':'rotate('+current+'deg)'});
        }
    };

})(jQuery);