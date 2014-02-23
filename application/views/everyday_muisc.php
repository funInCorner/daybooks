<div id="everymusicpanel" title="每日歌曲" class="panel"> </div>


<div id="contents">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/af.ui.css" title="default" />

    <h2 class="expanded" onclick='showHide(this,"main_info2");'>提示</h2>
    <p id="main_info2">点击列表的一项，可以进行试听<br/>试听前，请停止首页的音乐播放哦</p>
    <p ><span id="nowplays">当前播放:<b>歌曲名:Rohi Dunya(精神世界)&nbsp;歌手:Unknown</span></p>
    <div class="SongTime">00:00&nbsp;|&nbsp;00:00</div>
    <script>
    var search=document.location.search.toLowerCase().replace("?","");
    //alert(lsGetItem());
//$.ui.loadAjax("ajax.txt",false,false,"slide",true);   
    $.jsonP({
            url:'http://jsfiddle.net/echo/jsonp/?test=some+html+content&callback=?',        
        //  http://www.57lehuo.com/index.php?a=index&m=api&method=itemsSearchGet&keyword=连衣裙&sign=5cb85c3eed22c1908e05c584813c8dd2
            success:function(json){
                //$('#af23_content').html(data.test)                        
                        $("#thelist").append("<li>Helloworld</li>");
                    
            }
        }); 
    </script>

    <p>
      <input type="hidden" id="audiofile" size="5" value="http://mp3.9ku.com/file2/198/197631.mp3" />
      <audio id="myaudio">
         你的浏览器不支持html5的audio标签
      </audio>
      
    </p>
    <div class="ProcessControl">
        <div class="process"></div>
        <div class="processYet"></div>
    </div>
    <p>
        <a class="button" id="play" onclick="playAudio();">播放</a>
        <a class="button" id="play" onclick="forwardAudio();">快进30秒</a>
        <a class="button" id="play" onclick="rewindAudio();">退后30秒</a>
        <a class="button" onclick="restartAudio();">重新播放</a>
    </p>
    <p><b>日期&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;歌曲名称</b></p>
    <ul class="list" id="everydayMusicul">
        <?php foreach($musiclist as $key=>$val) {?>
        <li><a href="#" songname="<?php echo $val['musicName']; ?>" songer="<?php echo $val['songer']; ?>" onclick="playbmusic(this,'<?php echo $val['msuicUrl']; ?>')"><?php echo $val['showdate']; ?>&nbsp;&nbsp;<?php echo $val['musicName']; ?>-<?php echo $val['songer']; ?></a></li>
        <?php } ?>
    </ul>
</div>
<script>
  var myScroller;
  $.ui.ready(function(){
     myScroller = $("#contents").scroller({useJsScroll:true});
     myScroller.addInfinite();
     myScroller.addPullToRefresh();
     $.bind(myScroller, 'scrollend', function () {
        console.log("scroll end");
    });

    $.bind(myScroller, 'scrollstart', function () {
        console.log("scroll start");
    });

    $.bind(myScroller, "refresh-trigger", function () {
        console.log("refresh-trigger");
         $(this.el).append("<div id='infinite' style='height:60px;line-height:60px;text-align:center;font-weight:bold'>正在加载请稍后...</div>");
    });
    
    var hideClose;
    $.bind(myScroller, "refresh-release", function () {
        console.log("refresh-release");
        var that = this;
        clearTimeout(hideClose);
        hideClose = setTimeout(function () {
            console.log("hiding manually refresh");                                 
               $("#infinite").remove();
               $.jsonP({
                    url:'http://jsfiddle.net/echo/jsonp/?test=some+html+content&callback=?',        
                    success:function(json){
                        $('#everydayMusicul').prepend("<li>"+json['test']+"</li>");
                    }
                }); 
               //$('#iscroll').prepend("<div>上拉增加的内容</div>");
            that.hideRefresh();
        }, 1000);
        return false; //tells it to not auto-cancel the refresh
    });

    $.bind(myScroller, "refresh-cancel", function () {
        console.log("refresh-cancel");
        clearTimeout(hideClose);
    });
    
    $.bind(myScroller, "refresh-finish", function () {
        console.log("refresh-finish");
    });
    
    myScroller.enable();

    $.bind(myScroller, "infinite-scroll", function () {
        var self = this;
        console.log("infinite triggered");
        $(this.el).append("<div id='infinite' style='height:60px;line-height:60px;text-align:center;font-weight:bold'>正在加载请稍后...</div>");
        $.bind(myScroller, "infinite-scroll-end", function () {
            $.unbind(myScroller, "infinite-scroll-end");
            self.scrollToBottom();
            setTimeout(function () {
                $(self.el).find("#infinite").remove();
                self.clearInfinite();
                $(self.el).append("<div>下拉增加的内容This was loaded via inifinite scroll<br>More Content</div>");
                self.scrollToBottom();
            }, 1000);
        });
    });

    $("#contents").css("overflow", "auto");

  });

</script>