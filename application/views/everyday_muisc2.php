 <!--每日歌曲-->
 <!--
<div title="每日歌曲" id="ajax" class="panel" data-footer="footerui" data-header="footerui">
    
</div>
-->
<div id="ajax" title="每日歌曲" class="panel" data-footer='footerui' data-header='footerui'>
        
</div>

<footer id='footerui'>
        <a href="#main" id='navbar_home' class='icon home'>首页 <span class='af-badge lr'>6</span></a>
        <a href='#info' id="navbar_info" class='icon info'>关于我们</a>
        <a href='#settings' id="navbar_settings" class='icon settings'>系统设置</a>
</footer>  


<header id="testheader">
    <a id="backButton" onclick="$.ui.goBack()" class='button'>Go Back</a>
        <h1>Custom Header</h1>

</header>

<div id="contentDIV">

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
                        $("#thelist").append("<li>"+json['test']+"</li>");
                    
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
    <script type="text/javascript" src="<?php echo base_url();?>appframework/ui/musicplay.js"></script>

    <p><b>日期&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;歌曲名称</b></p>
    <ul class="list" id="everydayMusicul">
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/402/401770.mp3','all for you','Ace Of Base')" >2014-02-09&nbsp;&nbsp;all for you-Ace Of Base</a></li>
         <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/449/448078.mp3','刚刚慢摇230','能上网的曲子')" >2014-02-08&nbsp;&nbsp;刚刚慢摇230-能上网的曲子</a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/199/198038.mp3','Rohi Dunya(精神世界)','Unknown')" >2014-02-07&nbsp;&nbsp;Rohi Dunya(精神世界)</a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/88/87528.mp3','Don t Lie','Black Eyed Peas')" >2014-02-06&nbsp;&nbsp;Don't Lie - Black Eyed Peas</a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/192/191720.mp3','Winter in my heart','befour')" >2014-02-05&nbsp;&nbsp;Winter in my heart- befour</a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/198/197631.mp3','Do You Know','Enrique')" >2014-02-04&nbsp;&nbsp;Do You Know-Enrique </a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/198/197631.mp3','Do You Know','Enrique')" >2014-02-04&nbsp;&nbsp;Do You Know-Enrique </a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/198/197631.mp3','Do You Know','Enrique')" >2014-02-04&nbsp;&nbsp;Do You Know-Enrique </a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/198/197631.mp3','Do You Know','Enrique')" >2014-02-04&nbsp;&nbsp;Do You Know-Enrique </a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/198/197631.mp3','Do You Know','Enrique')" >2014-02-04&nbsp;&nbsp;Do You Know-Enrique </a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/198/197631.mp3','Do You Know','Enrique')" >2014-02-04&nbsp;&nbsp;Do You Know-Enrique </a></li>
        <li><a href="#" onclick="playbmusic(this,'http://mp3.9ku.com/file2/198/197631.mp3','Do You Know','Enrique')" >2014-02-04&nbsp;&nbsp;Do You Know-Enrique </a></li>
    </ul>
</div>
<script>
     $("#contentDIV").scroller({useJsScroll:true});     
    </script>