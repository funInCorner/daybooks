var musicScroller;
var loadCount = 3;//每次滚动请求的歌曲数量

$.ui.ready(function(){
    musicScroller = $("#daymusic").scroller();
    musicpanels();
    musicScroller.addInfinite();                     
    musicScroller.enable();
    //当页面往下拉的时候
    $.bind(musicScroller, "infinite-scroll", function () {
        var self = this;
        if($("#nomresults").length == 0 ){
        	$(this.el).append("<div id='infinite' style='height:60px;line-height:60px;text-align:center;font-weight:bold'><img src='images/loading.gif'/>正在加载歌曲...</div>");
            $.bind(musicScroller, "infinite-scroll-end", function () {
                $.unbind(musicScroller, "infinite-scroll-end");
                self.clearInfinite();
                self.scrollToBottom();
                var sort2 = $("#musicsort").val(),
                sCounts2 = $("#everydayMusicul li").size(),
                eCounts2 = $("#everydayMusicul li").size() + loadCount;
                $.jsonP({
                	url:siteurls+"?callback=?&type=getmusic&sCounts="+sCounts2+"&eCounts="+eCounts2,
                	success:function(datas){
                		$(self.el).find("#infinite").remove();
                		 if(datas.status == 0 || (datas.status == 1 && datas.data == "没有数据") ){
                			 if($("#nomresults").length == 0){
                				 $("<div id='nomresults'>Sorry,我就这点库存了!</div>").insertAfter("#everydayMusicul");
                			 }
                         }else{
                             var indexStart = $("#everydayMusicul li").length;
                             showdatas  = datas.data; 
                             $.each(showdatas,function(index,val){
                             var tmpli = '<li id="s_'+indexStart+'" data-index="'+indexStart+'" data-stx="'+val.songertx+'"><a href="#" songname="'+val.musicName+'" songer="'+val.songer+'" src="'+val.msuicUrl+'" onclick="playbmusic(this)">'+val.showdate+'&nbsp;&nbsp;'+val.musicName+'-'+val.songer+'</a></li>';
                                 $("#everydayMusicul").append(tmpli);
                                 indexStart++;
                             });
                             $.ui.updateBadge("#navbar_aricle21",$("#everydayMusicul li").length,'lr');
                         }
            		},
            		error:function(){
            			  $(self.el).find("#infinite").remove();
                          $.ui.popup("加载失败，请重试!");
            			
            		}
                 });
            });
        }

    });
    
    
   // $("#daymusic").css("overflow", "auto");
});

function hello(data){
	console.log("Hello world");
	
}
