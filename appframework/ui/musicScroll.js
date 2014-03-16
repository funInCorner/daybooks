var musicScroller;
var siteurl = "";
var loadCount = 3;//每次滚动请求的歌曲数量
$.ui.ready(function(){
    siteurl = $("meta[name='siteurl']").attr("content");
    musicScroller = $("#daymusic").scroller();

    musicScroller.addInfinite();                     
    musicScroller.enable();
    //当页面往下拉的时候
    $.bind(musicScroller, "infinite-scroll", function () {
        var self = this;
        if($("#daymusic div").filter("#nomresults").length > 0 ){

        }else{
            $(this.el).append("<div id='infinite' style='height:60px;line-height:60px;text-align:center;font-weight:bold'><img src='"+siteurl+"/res/images/loading.gif'/>正在加载歌曲...</div>");
            $.bind(musicScroller, "infinite-scroll-end", function () {
                $.unbind(musicScroller, "infinite-scroll-end");
                self.clearInfinite();
                self.scrollToBottom();
                
                    var sort2 = $("#musicsort").val(),
                    sCounts2 = $("#everydayMusicul li").size(),
                    eCounts2 = $("#everydayMusicul li").size() + loadCount;
                     $.ajax({
                        type:"post",
                        url:siteurl+"index.php/welcome/firstloadmusic",
                        data:{sort:sort2,sCounts:sCounts2,eCounts:eCounts2},
                        success:function(datas){
                            $(self.el).find("#infinite").remove();
                            var showdatas  = $.parseJSON(datas);
                            if(showdatas.msg == "没有数据"){
                                //console.log('here');
                                $("<div id='nomresults'>没有数据可以显示了</div>").insertAfter("#everydayMusicul");
                            }else{
                                $.each(showdatas,function(index,val){
                                var tmpli = '<li><a href="#" songname="'+val.musicName+'" songer="'+val.songer+'" onclick="playbmusic(this,\''+val.msuicUrl+'\')">'+val.showdate+'&nbsp;&nbsp;'+val.musicName+'-'+val.songer+'</a></li>';
                                $("#everydayMusicul").append(tmpli);
                                });
                            }
                           // self.scrollToBottom();
                        },error:function(){
                            $.ui.popup("加载失败，请重试!");
                        }

                    });
            });
        }

    });
   // $("#daymusic").css("overflow", "auto");
});
