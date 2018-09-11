//menu
$(document).ready(function(){
  $('li.mainlevel').mousemove(function(){
  $(this).find('ul').slideDown();//you can give it a speed
  });
  $('li.mainlevel').mouseleave(function(){
  $(this).find('ul').slideUp("fast");
  });
});



var t = n = 0, count;
$(document).ready(function(){	
	count=$("#banner_list a").length;
	$("#banner_list a:not(:first-child)").hide();
	$("#banner_info").html($("#banner_list a:first-child").find("img").attr('alt'));
	$("#banner_info").click(function(){window.open($("#banner_list a:first-child").attr('href'), "_blank")});
	$("#banner li").click(function() {
		var i = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4
		n = i;
		if (i >= count) return;
		$("#banner_info").html($("#banner_list a").eq(i).find("img").attr('alt'));
		$("#banner_info").unbind().click(function(){window.open($("#banner_list a").eq(i).attr('href'), "_blank")})
		$("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
		document.getElementById("banner").style.background="";
		$(this).toggleClass("on");
		$(this).siblings().removeAttr("class");
	});
	t = setInterval("showAuto()", 4000);
	$("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
})
function showAuto()
{
	n = n >=(count - 1) ? 0 : ++n;
	$("#banner li").eq(n).trigger('click');
}


//JavaScript Document
$(function(){
$(".zb_o p a").eq(0).addClass("hover");
$(".zb_o p a").click(function(){
   	$(this).addClass("hover").siblings().removeClass("hover");
	var thishover=$(this);
 	$(".table_one_mo .table_one").eq($(".zb_o p a").index(thishover)).show().siblings().hide();
 	})
	
$(".xy_q p a").eq(0).addClass("hover");
$(".xy_q p a").click(function(){
 	$(this).addClass("hover").parents('p').siblings('p').children('a').removeClass("hover");
	var thishover=$(this);
 	$(".table_one_mo .table_one").eq($(".xy_q p a").index(thishover)).show().siblings().hide();
 	})

$(".yh_s p a").eq(0).addClass("hover");
$(".yh_s p a").click(function(){
 	$(this).addClass("hover").parents('p').siblings('p').children('a').removeClass("hover");
	var thishover=$(this);
	var oYHTabs = $(".table_one_mo .table_one").eq($(".yh_s p a").index(thishover));
	oYHTabs.show().siblings().hide();
	
	var sYHurl = oYHTabs.find(".yh_d p a").eq(0).attr('href');
	var ispylink = sYHurl.substring(sYHurl.length - 6, sYHurl.length);
	if (ispylink == "dw=all"){
		sYHurl = "";
	}
	
	var oIframe = $("#xueweiweiyuan");
	oIframe.attr("src", sYHurl);
	
	var iIfh = "";
	setTimeout(function(){
		iIfh = oIframe.contents().find('body').height();
		if (sYHurl == "") {
			oIframe.height(0);
		}else{
			oIframe.height(iIfh+20);
		}
	},300);
})
	
	
	$(".py_t p a").eq(0).addClass("hover");
$(".py_t p a").click(function(){
   	$(this).addClass("hover").parents('p').siblings('p').children('a').removeClass("hover");
	var thishover=$(this);
 	$(".table_one_mot .table_onet").eq($(".py_t p a").index(thishover)).show().siblings().hide();
 	})
	
		$(".sz_a p a").eq(0).addClass("hover");
$(".sz_a p a").click(function(){
   	$(this).addClass("hover").parents('p').siblings('p').children('a').removeClass("hover");
	var thishover=$(this);
 	$(".table_one_mote .table_onete").eq($(".sz_a p a").index(thishover)).show().siblings().hide();
 	})
	
			$(".jx_z p a").eq(0).addClass("hover");
$(".jx_z p a").click(function(){
   	$(this).addClass("hover").parents('p').siblings('p').children('a').removeClass("hover");
	var thishover=$(this);
 	$(".table_one_motey .table_onetey").eq($(".jx_z p a").index(thishover)).show().siblings().hide();
 	})

$(".cb_f p a").click(function(){
   	$(this).addClass("hover").parents('p').siblings('p').children('a').removeClass("hover");
	var thishover=$(this);
 	$(".table_one_m .table_o").eq($(".cb_f p a").index(thishover)).show().siblings().hide();
 	})
	
	$(".bm_t p a").eq(0).addClass("hover");
$(".bm_t p a").click(function(){
   	$(this).addClass("hover").parents('p').siblings('p').children('a').removeClass("hover");
	var thishover=$(this);
 	$(".table_q .table_w").eq($(".bm_t p a").index(thishover)).show().siblings().hide();
 	})
 	
$(".yh_d p a").eq(0).addClass("hover");
});


(function($){
	$.extend($.browser,{
		client:function(){
			return{
				width:document.documentElement.clientWidth,height:document.documentElement.clientHeight,bodyWidth:document.body.clientWidth,bodyHeight:document.body.clientHeight
			}
		}
		,scroll:function(){
			return{
				width:document.documentElement.scrollWidth,height:document.documentElement.scrollHeight,bodyWidth:document.body.scrollWidth,bodyHeight:document.body.scrollHeight,left:document.documentElement.scrollLeft+document.body.scrollLeft,top:document.documentElement.scrollTop+document.body.scrollTop
			}
		}
		,screen:function(){
			return{
				width:window.screen.width,height:window.screen.height
			}
		}
		,isIE6:$.browser.msie&&$.browser.version==6,isMinW:function(val){
			return Math.min($.browser.client().bodyWidth,$.browser.client().width)<=val
		}
		,isMinH:function(val){
			return $.browser.client().height<=val
		}
	})
})(jQuery);
(function($){
	$.fn.hoverForIE6=function(option){
		var s=$.extend({
			current:"hover",delay:10
		}
		,option||{});
		$.each(this,function(){
			var timer1=null,timer2=null,flag=false;
			$(this).bind("mouseover",function(){
				if(flag){
					clearTimeout(timer2)
				}
				else{
					var _this=$(this);
					timer1=setTimeout(function(){
						_this.addClass(s.current);
						flag=true
					}
					,s.delay)
				}
			}).bind("mouseout",function(){
				if(flag){
					var _this=$(this);
					timer2=setTimeout(function(){
						_this.removeClass(s.current);
						flag=false
					}
					,s.delay)
				}
				else{
					clearTimeout(timer1)
				}
			})
		})
	}
})(jQuery);
(function($){
	$.extend({
		_jsonp:{
			scripts:{},counter:1,charset:"gb2312",head:document.getElementsByTagName("head")[0],name:function(callback){
				var name='_jsonp_'+(new Date).getTime()+'_'+this.counter;
				this.counter++;
				var cb=function(json){
					eval('delete '+name);
					callback(json);
					$._jsonp.head.removeChild($._jsonp.scripts[name]);
					delete $._jsonp.scripts[name]
				};
				eval(name+' = cb');
				return name
			}
			,load:function(url,name){
				var script=document.createElement('script');
				script.type='text/javascript';
				script.charset=this.charset;
				script.src=url;
				this.head.appendChild(script);
				this.scripts[name]=script
			}
		}
		,getJSONP:function(url,callback){
			var name=$._jsonp.name(callback);
			var url=url.replace(/{callback};/,name);
			$._jsonp.load(url,name);
			return this
		}
	})
})(jQuery);
(function(a){
	a.fn.jdTab=function(d,i){
		if(typeof d=="function"){
			i=d;
			d={}
		}
		var k=a.extend({
			type:"static",auto:false,source:"data",event:"mouseover",currClass:"curr",tab:".tab",content:".tabcon",itemTag:"li",stay:5000,delay:100,mainTimer:null,subTimer:null,index:0
		}
		,d||{});
		var f=a(this).find(k.tab).eq(0).find(k.itemTag),b=a(this).find(k.content);
		if(f.length!=b.length){
			return false
		}
		var c=k.source.toLowerCase().match(/http:\/\/|\d|\.aspx|\.ascx|\.asp|\.php|\.html\.htm|.shtml|.js|\W/g);
		var j=function(m,l){
			k.subTimer=setTimeout(function(){
				e();
				if(l){
					k.index++;
					if(k.index==f.length){
						k.index=0
					}
				}
				else{
					k.index=m
				}
				k.type=(f.eq(k.index).attr(k.source)!=null)?"dynamic":"static";
				h()
			}
			,k.delay)
		};
		var g=function(){
			k.mainTimer=setInterval(function(){
				j(k.index,true)
			}
			,k.stay)
		};
		var h=function(){
			f.eq(k.index).addClass(k.currClass);
			switch(k.type){
				default:case"static":var l="";
				break;
				case"dynamic":var l=(c==null)?f.eq(k.index).attr(k.source):k.source;
				f.eq(k.index).removeAttr(k.source);
				break
			}
			if(i){
				i(l,b.eq(k.index),k.index)
			}
			b.eq(k.index).show()
		};
		var e=function(){
			f.eq(k.index).removeClass(k.currClass);
			b.eq(k.index).hide()
		};
		f.each(function(l){
			a(this).bind(k.event,function(){
				clearTimeout(k.subTimer);
				clearInterval(k.mainTimer);
				j(l,false);
				return false
			}).bind("mouseleave",function(){
				if(k.auto){
					g()
				}
				else{
					return
				}
			})
		});
		if(k.type=="dynamic"){
			j(k.index,false)
		}
		if(k.auto){
			g()
		}
	}
})(jQuery);
(function(a){
	a.fn.jdSlide=function(k){
		var p=a.extend({
			width:null,height:null,pics:[],index:0,type:"num",current:"curr",delay1:100,delay2:5000
		}
		,k||{});
		var i=this;
		var g,f,d,h=0,e=true,b=true;
		var n=p.pics.length;
		var o=function(){
			var q="<ul style='position:absolute;top:0;left:0;'><li><a href='"+p.pics[0].href+"' target=\"_blank\"><img src='"+p.pics[0].src+"' width='"+p.width+"' height='"+p.height+"' /></a></li></ul>";
			i.css({
				position:"relative"
			}).html(q);
			i.find("ul").css({
				width:n*p.width+"px",height:p.height+"px"
			});
			a(function(){
				c()
			})
		};
		o();
		var j=function(){
			var s=[];
			s.push("<div>");
			var r;
			var q;
			for(var t=0;t<n;t++){
				r=(t==p.index)?p.current:"";
				switch(p.type){
					case"num":q=t+1;
					break;
					case"string":q=p.pics[t].alt;
					break;
					case"image":q="<img src='"+p.pics[t].breviary+"' />";
					default:break
				}
				s.push("<span class='");
				s.push(r);
				s.push("'><a href='");
				s.push(p.pics[t].href);
				s.push("' target=\"_blank\">");
				s.push(q);
				s.push("</a></span>")
			}
			s.push("</div>");
			i.append(s.join(""));
			var x=[];
			x.push("<div id='goback' class='o-control'><a class='control'></a></div><div id='forward' class='o-control'><a class='control'></a></div>");
			i.append(x.join(""));
			i.find("#goback").bind("mouseover",function(){
				b=false;
				clearTimeout(g);
				clearTimeout(d)
			}).bind("click",function(){
				var u=p.index-1;
				if(u<0){
					u=t-1
				};
				l(u)
			}).bind("mouseleave",function(){
				b=true;
			});
			i.find("#forward").bind("mouseover",function(){
				b=false;
				clearTimeout(g);
				clearTimeout(d)
			}).bind("click",function(){
				var u=p.index+1;
				l(u)
			}).bind("mouseleave",function(){
				b=true;
			});
			i.find("span").bind("mouseover",function(){
				b=false;
				clearTimeout(g);
				clearTimeout(d);
				var u=i.find("span").index(this);
				if(p.index==u){
					return
				}
				else{
					d=setInterval(function(){
						if(e){
							l(u)
						}
					}
					,p.delay1)
				}
			}).bind("mouseleave",function(){
				b=true;
				clearTimeout(g);
				clearTimeout(d);
				g=setTimeout(function(){
					l(p.index+1,true)
				}
				,p.delay2)
			});
			i.bind("mouseover",function(){
				$("#slide .o-control").show()
			}).bind("mouseleave",function(){
				$("#slide .o-control").show()
			})
		};
		var l=function(r,q){
			if(r==n){
				r=0
			}
			f=setTimeout(function(){
				i.find("span").eq(p.index).removeClass(p.current);
				i.find("span").eq(r).addClass(p.current);
				m(r,q)
			}
			,20)
		};
		var m=function(u,q){
			var s=parseInt(h);
			var v=Math.abs(s+p.index*p.width);
			var t=Math.abs(u-p.index)*p.width;
			var r=Math.ceil((t-v)/4);
			if(v==t){
				clearTimeout(f);
				if(q){
					p.index++;
					if(p.index==n){
						p.index=0
					}
				}
				else{
					p.index=u
				}
				e=true;
				if(e&&b){
					clearTimeout(g);
					g=setTimeout(function(){
						l(p.index+1,true)
					}
					,p.delay2)
				}
			}
			else{
				if(p.index<u){
					h=s-r;
					i.find("ul").css({
						left:h+"px"
					})
				}
				else{
					h=s+r;
					i.find("ul").css({
						left:h+"px"
					})
				}
				e=false;
				f=setTimeout(function(){
					m(u,q)
				}
				,20)
			}
		};
		var c=function(){
			var q=[];
			for(var r=1;r<n;r++){
				q.push("<li><a target=\"_blank\" href='");
				q.push(p.pics[r].href);
				q.push("' ><img src='");
				q.push(p.pics[r].src);
				q.push("' width='");
				q.push(p.width);
				q.push("' height='");
				q.push(p.height);
				q.push("' /></a></li>")
			}
			i.find("ul").append(q.join(""));
			g=setTimeout(function(){
				l(p.index+1,true)
			}


			,p.delay2);
			if(p.type){
				j()
			}
		}
	}
})(jQuery);