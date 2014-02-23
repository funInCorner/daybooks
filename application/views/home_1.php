<!DOCTYPE html>
<!--HTML5 doctype-->
<html>
 
    <head>
        <title>UI Starter</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes" />
         <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/icons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/af.ui.css"  />
        <!-- uncomment for  apps
        <script type="text/javascript" charset="utf-8" src="indelxdk.js"></script>        
        -->
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/appframework.ui.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/everydaymusic.js"></script>
         <!-- emulate touch events on desktop browsers only -->
    <script>
        if (!((window.DocumentTouch && document instanceof DocumentTouch) || 'ontouchstart' in window)) {
            var script = document.createElement("script");
            script.src = "<?php echo base_url();?>appframework/plugins/af.desktopBrowsers.js";
            var tag = $("head").append(script);
        }
    </script>
    <script type="text/javascript">
         var webRoot = "./";
        $.ui.autoLaunch = false; //By default, it is set to true and you're app will run right away.  We set it to false to show a splashscreen
        //To disable custom operating system themes, set $.ui.useOSThemes to false.
        $.ui.useOSThemes=false;
        $.ui.openLinksNewTab = false;
        $.ui.isAjaxApp=true;

        $(document).ready(function(){
            $.ui.launch();
        });
        /* This function runs when the body is loaded.*/
        var init = function () {
                $.ui.backButtonText = "返回";// We override the back button text to always say "Back"
                window.setTimeout(function () {
                    $.ui.launch();
                }, 1500);//We wait 1.5 seconds to call $.ui.launch after DOMContentLoaded fires
        };
        document.addEventListener("DOMContentLoaded", init, false);
         
        /* This code is used for Intel native apps */
        var onDeviceReady = function () {                    
            AppMobi.device.setRotateOrientation("portrait");
            AppMobi.device.setAutoRotate(false);
            webRoot = AppMobi.webRoot + "";
            //hide splash screen
            AppMobi.device.hideSplashScreen();
            $.ui.blockPageScroll(); //block the page from scrolling at the header/footer
            $.ui.launch();
 
        };
        document.addEventListener("intel.xdk.device.ready", onDeviceReady, false);

       function showHide(obj, objToHide) {
            var el = $("#" + objToHide)[0];

            if (obj.className == "expanded") {
                obj.className = "collapsed";
            } else {
                obj.className = "expanded";
            }
            $(el).toggle();

        }
    </script>
<body>      
    <div id="afui" class="bb"> 

         <!-- this is the splashscreen you see. -->
        <div id="splashscreen" class='ui-loader heavy'>
            App Framework
            <br>
            <br>    <span class='ui-icon ui-icon-loading spin'></span>
            <h1>应用开始咯...</h1>
        </div>

        <!-- this is the header div at the top -->
        <div id="header">
            <a id='menubadge' onclick='af.ui.toggleSideMenu()' class='menuButton'></a>
        </div>

        <header id="testheader">
                <a id='menubadge' onclick='af.ui.toggleSideMenu()' class='menuButton'></a>
                <h1>Custom Header</h1>

        </header>



        <div id="content">
            <!-- here is where you can add your panels -->
            <div title='读书小小站' id="main" class="panel" selected="true" data-load="loadedPanel" data-unload="unloadedPanel" data-tab="navbar_home">
                 <h2 class='expanded' onclick='showHide(this,"main_info");'>欢迎</h2>
                 <p id='main_info'>欢迎来到我的网站，这是我第一次做手机上面浏览的网站，<br/>本站主要使用的是:jqmobi + Codeigniter<br/>做的不好的地方，还望大家能指出，感谢你的使用！！</p>
                 <h3>今日锅曲</h3>
                 <p><audio src="http://mp3.9ku.com/file2/199/198038.mp3" controls="controls" autoplay="false"> </audio></p>
            </div>

            <!--文章-->
            <div title='customer' id="main2" class="panel">
                This is a basic skeleton UI samplessss
            </div>

            <!--每日一句-->
            <div title="每日一句" id="sentence"  class="panel">

            </div>

            <!--每日歌曲-->
            <div title="每日歌曲" id="songs" class="panel" data-nav="menu_everydayplay">
                <h2 class="expanded" onclick='showHide(this,"main_info2");'>提示</h2>
                <p id="main_info2">点击列表的一项，可以进行试听<br/>试听前，请停止首页的音乐播放哦</p>
                <div class="SongName">Ben's Music!</div>  <div class="SongTime">00:00&nbsp;|&nbsp;00:00</div>
                <p>
                  <input type="hidden" id="audiofile" size="5" value="http://mp3.9ku.com/file2/88/87528.mp3" />
                  <audio id="myaudio">
                     HTML5 audio not supported
                  </audio>
                </p>
                <p>
                    <a class="button" id="play" onclick="playAudio();">播放</a>
                    <a class="button" onclick="rewindAudio();">退后30秒</a>
                    <a class="button" onclick="forwardAudio();">快进30秒</a>
                    <a class="button" onclick="restartAudio();">重新播放</a>
                </p>
                <p id="nowplays">试听歌曲:<b>歌曲名:Rohi Dunya(精神世界)&nbsp;歌手:Unknown</b></p>
                <script type="text/javascript">
                    //play sound
                    function playbmusic(srcs,songName,songer){
                        var nowssrcs = $("#audiofile").val();
                        if(nowssrcs != srcs){
                            $.ui.popup( {
                                title:"提示",
                                message:"确定要播放这首歌曲么?",
                                cancelText:"不播放",
                                cancelCallback: function(){

                                },
                                doneText:"播放",
                                doneCallback: function(){
                                    $("#audiofile").val(srcs);
                                    var titles = '试听歌曲:<b>歌曲名：'+songName+' 歌手:'+songer+'</b>';
                                    $("#nowplays").html(titles);
                                    playAudio();
                                    //$.ui.popup(titles);
                                },
                                cancelOnly:false
                             });
                        }else{
                            $.ui.popup("继续播放当前歌曲，(*^__^*) 嘻嘻……");
                        }
                    }
                </script>

                <p><b>日期&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;歌曲名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;歌曲路径</b></p>
                <ul class="list">
                    <li><a href="#" onclick="playbmusic('http://mp3.9ku.com/file2/199/198038.mp3','Rohi Dunya(精神世界)','Unknown')" >2014-02-07&nbsp;&nbsp;Rohi Dunya(精神世界)&nbsp;&nbsp;http://mp3.9ku.com/file2/199/198038.mp3</a></li>
                    <li><a href="#" onclick="playbmusic('http://mp3.9ku.com/file2/88/87528.mp3','Don t Lie','Black Eyed Peas')" >2014-02-06&nbsp;&nbsp;Don t Lie - Black Eyed Peas&nbsp;&nbsp;http://mp3.9ku.com/file2/88/87528.mp3</a></li>
                </ul>
            </div>
            
            <!--关于我们-->
            <div title="关于我们" id="aboutus" class="panel">
                <p>本站作者:<b>MrShenSYuan</b></p>
                <p>联系邮箱:<b>xiaofosong@126.com</b></p>
                <p>开发技术:jqmobi + Codeigniter</p>
                <p>开发日期:2014-02-07</p>
                <p>交流QQ:1429088513</p>
            </div>


        </div>
        <div id="afui_ajax"></div>
        <div id="navbar">
            <a href="#main" id='navbar_home' class='icon home' >首页</a>
            <a href="#sentence" id='navbar_sentence' class='icon info'>每日一句</a>
            <a href="#main2" id='navbar_aricle' class='icon cloud'>文章</a>
            <a href="#songs" id='navbar_song' class='icon headset'>每日歌曲</a>
            <a href="#aboutus" id='navbar_aboutus' class='icon info' data-transition="pop">关于我们</a>
        </div>
        <nav id="home">
            <ul class="list">
                <li >
                    <a class="icon home" href="#main">首页</a>
                </li>
                <li >
                    <a class="icon cloud" href="#main2">文章</a>
                </li>
            </ul>
        </nav>

        <!--每日歌曲的音乐播放器状态栏-->
        <nav id="menu_everydayplay">
            <ul class="list">
                <li class="divider">播放器控制</li>
                <li >
                    <a href="#">播放</a>
                </li>
                <li >
                    <a href="#">暂停</a>
                </li>
            </ul>
        </nav>

    </div>
</body>
</html>