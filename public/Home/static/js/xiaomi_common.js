$(function(){
	/*顶部下拉 strat*/
	$(".J_userInfo").on("mouseenter",".user",function(){
		$('.user-menu').slideDown(200);
		$(this).addClass("user-active");
	}).on("mouseleave",".user",function(){
		$('.user-menu').slideUp(200);
		$(this).removeClass("user-active");
	})
	/*顶部下拉 end*/

	/*购物车弹出 strat*/
	$("#ECS_CARTINFO").on("mouseenter",function(){
		$(this).addClass("topbar-cart-active")
		$(this).find(".cart-menu").slideDown();
	}).on("mouseleave",function(){
		$(this).removeClass("topbar-cart-active");
		$(this).find(".cart-menu").stop().slideUp(300,function(){
			$(".cart-section").removeClass("cart-section-on")
		});
	})
	/*购物车弹出 end*/

	/*搜索框效果*/
	$(".header-search .search-text").focus(function(){
		$("#searchForm").addClass("search-form-focus");
	}).blur(function(){
		if($(this).val().length==0){
			$("#searchForm").removeClass("search-form-focus");
		}
	});

	/*分类树导航鼠标移入效果*/
	$("#site-category-list").on("mouseenter",".category-item",function(){
		$(this).addClass("category-item-current");
		$(this).find(".home-category-child-ad").show();
	}).on("mouseleave",".category-item",function(){
		$(this).removeClass("category-item-current");
        $(this).find(".home-category-child-ad").hide();
	});

	/*分类树子菜单数目对6取余，重置子菜单宽度*/
	$("#site-category-list .category-item").each(function(index, element) {
        var childnum=$(this).find(".children-list li").length;
		var col=Math.ceil(childnum/6);
		if(col>1){
			$(this).find(".children").addClass("children-col-"+col);
		}
    });


	/*分类树导航鼠标移入效果 start*/
	$(".nav-category-section").on("mouseenter",".nav-category-item",function(){
		$(this).addClass("current")
	}).on("mouseleave",".nav-category-item",function(){
		$(this).removeClass("current")
	})

	$nav_num = $("ul.children-list").find('li');
	if($nav_num.length>12){
		$('.nav-category-children').addClass('nav-category-children-col-3');
		$('.nav-category-children').removeClass('nav-category-children-col-2');
	}else if($nav_num.length>6&&$nav_num.length<13){
		$('.nav-category-children').addClass('nav-category-children-col-2');
		$('.nav-category-children').removeClass('nav-category-children-col-3');
	}else{
		$('.nav-category-children').removeClass('nav-category-children-col-2');
		$('.nav-category-children').removeClass('nav-category-children-col-3');
	}
	/*分类导航鼠标移入效果 end*/

	/*首页导航分类树效果*/
	$(".nav-category").mouseenter(function(){
		$(this).find(".category-hidden").show();
	}).mouseleave(function(){
		$(this).find(".category-hidden").hide();
	});

	/*首页导航下拉子菜单*/
	var t1;
	var t2;
	var t3;
	//鼠标经过导航
	$(".header-nav li.nav-item").mouseenter(function(){
		clearTimeout(t3);
		clearTimeout(t2);
		$(this).addClass("nav-item-active");
		var nav_list=$(this).find(".item-children .children-list");
		if(!$("#J_navMenu").hasClass("header-nav-menu-active")){
			$("#J_navMenu").addClass("header-nav-menu-active");
		}
		$("#J_navMenu").find(".container").html(nav_list.clone());//复制ul
		t1=setTimeout(function(){
			$("#J_navMenu").slideDown(150);//子菜单显示
		},150);
	});
	//鼠标离开导航
	$(".header-nav li.nav-item").mouseleave(function(){
		clearTimeout(t1);
		$(this).removeClass("nav-item-active");
		t2=setTimeout(function(){
			$("#J_navMenu").slideUp(150);//子菜单隐藏
		},150);
	});
	//鼠标经过子菜单
	$("#J_navMenu").mouseenter(function(){
		clearTimeout(t2);
	});
	//鼠标离开子菜单
	$("#J_navMenu").mouseleave(function(){
		t3=setTimeout(function(){
			$("#J_navMenu").slideUp(150);//子菜单隐藏
		},150);
	});


	/*列表页 属性图片 幻灯片*/
	//$("#J_homeSlider").slide({
	//	mainCell:".bd ul",
	//	autoPage:true,
	//	effect:"fade",
	//	autoPlay:false,
	//	vis:5,
	//	scroll:5,
	//	trigger:"mouseover",
	//	pnLoop:false
	//});

	$("#J_homeSlider").hover(function() {
		$(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
	}, function() {
		$(this).find(".prev,.next").fadeOut()
	});
	$("#J_homeSlider").slide({
		titCell: ".hd ul",
		mainCell: ".bd ul",
		effect: "fold",
		autoPlay: true,
		autoPage: true,
		trigger: "click",
		startFun: function(i) {
			var curLi = $("#J_homeSlider .bd li").eq(i);
			if (!!curLi.attr("_src")) {
				curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
			}
		}
	});


	//登录注册页
	//详情页去手机购买切换
	$(".buy-mob-centent").hover(function(){
        $(this).addClass("buy-mob-curr");
    },function(){
        $(this).removeClass("buy-mob-curr");
    });
    $(".buy-mob-centent2").hover(function(){
        $(this).addClass("buy-mob-curr");
        $(this).next().css("margin-top","37px");
    },function(){
        $(this).removeClass("buy-mob-curr");
        $(this).next().css("margin-top","12px");
    });
});

$(function(){
	/*首页幻灯片效果 start*/
	$("#J_homeSlider").slide({
		titCell:".xm-slider-pagination a",
		mainCell:".xm-slider-control",
		autoPlay:true,
		titOnClassName:"active",
		effect:"fold",
		trigger:"click"
	});
	$(".xm-slider").mouseenter(function(){
		$(".icon-slides").css("display","inline")
	})
	$(".xm-slider").mouseleave(function(){
		$(".icon-slides").css("display","none")
	})
	/*首页幻灯片效果 end*/

	/*小米明星单品 start*/
	jQuery(".J_starGoodsCarousel").slide({
		prevCell:".box-hd .more .control-prev",
		nextCell:".box-hd .more .control-next",
		mainCell:".rainbow-list",
		autoPage:true,
		effect:"left",
        easing:"linear",
		autoPlay:true,
        interTime:6000,
		vis:5,
		scroll:5,
		trigger:"click",
		pnLoop:false
	});
	/*小米明星单品 end*/

	/* 为你推荐 */
	jQuery(".recommend-for-you").slide({
		prevCell:".box-hd .more .control-prev",
		nextCell:".box-hd .more .control-next",
		mainCell:".rainbow-list",
		autoPage:true,
		effect:"left",
		autoPlay:false,
		vis:5,
		scroll:5,
		trigger:"click",
		pnLoop:false
	});
    /* 闪购 */
    jQuery(".iflashbuy").slide({
        prevCell:".box-hd .more .control-prev",
        nextCell:".box-hd .more .control-next",
        mainCell:".rainbow-list",
        autoPage:true,
        effect:"left",
        autoPlay:false,
        vis:5,
        scroll:5,
        trigger:"click",
        pnLoop:false
    });
    // /* 游戏专区 */
    // jQuery(".game-zone").slide({
    //     prevCell:".box-hd .more .control-prev",
    //     nextCell:".box-hd .more .control-next",
    //     mainCell:".rainbow-list",
    //     autoPage:true,
    //     effect:"left",
    //     autoPlay:false,
    //     vis:5,
    //     scroll:5,
    //     trigger:"click",
    //     pnLoop:false
    // });
    /* 游戏台式机 */
    jQuery(".game_taishi").slide({
        prevCell:".box-hd .more .control-prev",
        nextCell:".box-hd .more .control-next",
        mainCell:".rainbow-list",
        autoPage:true,
        effect:"left",
        autoPlay:false,
        vis:5,
        scroll:5,
        trigger:"click",
        pnLoop:false
    });

	/*分类楼层单品鼠标经过效果*/
	$(".brick-item-m").mouseenter(function(){
		$(this).addClass("brick-item-active");
	}).mouseleave(function(){
		$(this).removeClass("brick-item-active");
	})

	/*首页楼层tab切换*/
	$(".J_brickBox").slide({
		titCell:".tab-list li",
		mainCell:".span16",
		effect:"fade",
		autoPlay:false,
		titOnClassName:"tab-active",
		delayTime:0
	});

});
