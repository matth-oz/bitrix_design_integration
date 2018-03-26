$(document).ready(function(){
	lis = $(".nv_topnav>ul>li");
	LastSumm = 0;
	
	for(var i = 1; i < lis.length; i++) {
		LastSumm=LastSumm+$(lis[i]).width()
	}
	
	if(LastSumm>600){
		FreeSpace=931-LastSumm;
		k=FreeSpace/(lis.length-1);
		kp=k/2+28;
		$(".nv_topnav>ul>li:nth-child(1n+2)>a>span").css({"padding":"0 "+kp+"px"})
	}
	
	
	$(".nv_topnav .current").next("li").find("span").css({"border-left":"none"})
	$(".nv_topnav .current").prev("li").find("span").css({"border-right":"none"})
	
	setEqualHeight($(".il_li_itemlistgallery > li"));
	setEqualHeight($("#foo1 > li"));
	
});
	$("#hd_singin_but_open").live('click', 	function() {	
		$(".hd_loginform").css({"display":"block","opacity":0})
		$(".hd_loginform").animate({"opacity":1},400)
		return false;
	})
	$(".hd_close_loginform").live('click', 	function() {	
		$(".hd_loginform").animate({"opacity":0},400)
		setTimeout(function() {
			$(".hd_loginform").css({'display':'none'})
		}, 400)
		return false;
	})
	$(".sb_showchild").live('click', 	function() {	
		ParentElement = $(this).parent("li");
		FindElement = ParentElement.find("ul");
		FindElement2 = ParentElement.find("ul li");
		
		garm($(this), ParentElement, FindElement, FindElement2);
	})
	$(".fl_showchild").live('click', 	function() {
		ParentElement = $(this).parents(".il_fl_filter");
		FindElement = ParentElement.find(".il_fl_field");
		FindElement2 = ParentElement.find(".il_fl_field>div");
		console.log(FindElement)
		
		garm($(this), ParentElement, FindElement, FindElement2);
		beforgarm($(this), ParentElement, FindElement, FindElement2)
	})
	$(".vc_showchild").live('click', 	function() {
		ParentElement = $(this).parent("li");
		FindElement = ParentElement.find("ul");
		FindElement2 = ParentElement.find("ul li");
		
		garm($(this), ParentElement, FindElement, FindElement2);
		beforgarm($(this), ParentElement, FindElement, FindElement2)
	})
	$(".vc_showchild-2").live('click', 	function() {
		ParentElement = $(this).parent("li");
		FindElement = ParentElement.find("ul");
		FindElement2 = ParentElement.find("ul li");
		
		garm($(this), ParentElement, FindElement, FindElement2);
		beforgarm($(this), ParentElement, FindElement, FindElement2)
	})

	function garm(clk, ParentElement, FindElement, FindElement2){
		if(	ParentElement.hasClass('open')){
			FindElement.animate({'height':0},400)
			FindElement2.animate({'opacity':0},250)
			ParentElement.removeClass("open");
			ParentElement.addClass("closed");
			console.log("1");
		} else{
			FindElement.removeAttr('style');
			FindElement2.css({'opacity':1})
			ParentElement.removeClass("closed");
			ParentElement.addClass("open");
			heightChildUl = FindElement.height();
			ParentElement.removeClass("open");
			ParentElement.addClass("closed");
			FindElement.css({'height':0})
			FindElement2.css({'opacity':0})
			FindElement.animate({'height':heightChildUl+"px"},250);
			FindElement2.animate({'opacity':1},400)
			ParentElement.removeClass("closed");
			ParentElement.addClass("open");
			console.log("2");
		}
	}
	
	function beforgarm(clk, ParentElement){
		if(	ParentElement.hasClass('open')){
			ParentElement.find(".vc_showchild").animate({'opacity':0},100)
			ParentElement.find(".vc_showchild-2").animate({'opacity':1},300)
			ParentElement.find(".vc_showchild").removeClass("open");
			ParentElement.find(".vc_showchild").addClass("closed");
			ParentElement.find(".vc_showchild-2").removeClass("closed");
			ParentElement.find(".vc_showchild-2").addClass("open");
		} else{
			ParentElement.find(".vc_showchild-2").animate({'opacity':0},100)
			ParentElement.find(".vc_showchild").animate({'opacity':1},300)
			ParentElement.find(".vc_showchild-2").removeClass("open");
			ParentElement.find(".vc_showchild-2").addClass("closed");
			ParentElement.find(".vc_showchild").removeClass("closed");
			ParentElement.find(".vc_showchild").addClass("open");
		}
	}
	function setEqualHeight(columns){
		var tallestcolumn = 0;
		columns.each(function(){
			currentHeight = $(this).height();
			if(currentHeight > tallestcolumn){
				tallestcolumn = currentHeight;
			}
		});
		columns.height(tallestcolumn);
	}