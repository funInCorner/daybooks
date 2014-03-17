<!DOCTYPE html>
<!--HTML5 doctype-->
<html>
    <head>
        <script>
        (function() {
    if ("-ms-user-select" in document.documentElement.style && navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement("style");
        msViewportStyle.appendChild(
            document.createTextNode("@-ms-viewport{width:auto!important}")
        );
        document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
    }
})();
</script>
        <title>我的读书小小站</title>
        <meta name="siteurl" content="<?php echo base_url(); ?>" >
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
         <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/icons.css" />    
 
       <!--   
     <link rel="stylesheet" type="text/css" href="css/af.ui.css" title="default" />
  -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/main.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/appframework.css"  />

      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/badges.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/buttons.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/lists.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/forms.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/grid.css"  />

      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/plugins/css/af.actionsheet.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/plugins/css/af.popup.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/plugins/css/af.selectBox.css"  />
        
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/android.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/win8.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/bb.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/ios7.css"  />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/src/ios.css"  /> 
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>appframework/css/homecustom.css"  />
      <link href="<?php echo base_url();?>appframework/css/font-awesome.min.css" rel="stylesheet">

        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/appframework.js"></script>
        <!-- uncomment for  apps
        <script type="text/javascript" charset="utf-8" src="indelxdk.js"></script>        
        -->
        
    <script>
            if (!((window.DocumentTouch && document instanceof DocumentTouch) || 'ontouchstart' in window)) {
                var script = document.createElement("script");
                script.src = "<?php echo base_url();?>appframework/plugins/af.desktopBrowsers.js";
                var tag = $("head").append(script);
            }
           
          
        </script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.actionsheet.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.css3animate.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.passwordBox.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.scroller.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.selectBox.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.touchEvents.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.touchLayer.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.popup.js"></script>
        

        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/appframework.ui.js"></script>
        <!-- <script type="text/javascript" charset="utf-8" src="./ui/transitions/all.js"></script> -->
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/transitions/fade.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/transitions/flip.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/transitions/pop.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/transitions/slide.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/transitions/slideDown.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/transitions/slideUp.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/plugins/af.slidemenu.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/musicplay.js"></script>
        
        <!-- <script type="text/javascript" charset="utf-8" src="./ui/transitions/all.js"></script> -->
        
    <script type="text/javascript">
         var webRoot = "./";
        $.ui.autoLaunch = false; //By default, it is set to true and you're app will run right away.  We set it to false to show a splashscreen
        //To disable custom operating system themes, set $.ui.useOSThemes to false.
        $.ui.useOSThemes=false;
        $.ui.openLinksNewTab = false;        
        $(document).ready(function(){
            $.ui.launch();
        });
        /* This function runs when the body is loaded.*/
        var init = function () {
                $.ui.backButtonText = "返回";// We override the back button text to always say "Back"
                window.setTimeout(function () {
                    $.ui.launch();
                }, 3000);//We wait 1.5 seconds to call $.ui.launch after DOMContentLoaded fires
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
        function lsSetItem(id){
            var ls = window.localStorage;
            ls.setItem('id',id);
            console.log('设置id成功');     
        }
        //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    </script>
<body>      
    <div id="afui" class="bb"> 
       <!-- this is the splashscreen you see. -->
        <div id="splashscreen" class='ui-loader heavy'>
            读书小小站
            <br>
            <br>    <span class='ui-icon ui-icon-loading spin'></span>
            <h1>应用开始</h1>
        </div>

        <div id="header">
                <a id='menubadge' onclick='af.ui.toggleSideMenu()' class='menuButton' ></a>
        </div>

        <div id="content">
            <!-- here is where you can add your panels -->
            <div title='读书小小站' id="main" class="panel" selected="true"  data-nav="home" data-tab="navbar_home">
                 <h2 class='expanded' onclick='showHide(this,"main_info");'>欢迎</h2>
                 <p id='main_info'>欢迎来到我的网站，这是我第一次做手机上面浏览的网站，<br/>本站主要使用的是:jqmobi + Codeigniter<br/>做的不好的地方，还望大家能指出，感谢你的使用！！</p>
                 <h3>今日锅曲</h3>
                 <?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>
                 <p><audio src="http://mp3.9ku.com/file2/402/401770.mp3" controls="controls"> </audio></p>
            </div>

            <!--文章-->
            <div title='customer' id="main2" class="panel">
                This is a basic skeleton UI samplessss
            </div>

            <!--每日一句-->
            <div title="每日一句" id="sentence"  class="panel">

            </div>


            <!--关于我们-->
            <div title="关于我们" id="aboutus" class="panel">
                <p>本站作者:<b>happyInCorner</b></p>
                <p>联系邮箱:<b>xiaofosong@126.com</b></p>
                <p>开发技术:jqmobi + Codeigniter</p>
                <p>开发日期:2014-02-07</p>
                <p>交流QQ:1429088513</p>
            </div>

            <div title="test" id="daymusic" class="panel" data-load="musicpanels" data-nav="everydaymusic" data-footer="everydayMusicFooter">
                <h2 class="expanded" onclick='showHide(this,"main_info2");'>提示</h2>
                <p id="main_info2">点击列表的一项，可以进行试听<br/>试听前，请停止首页的音乐播放哦</p>
                <p ><span id="nowplays">当前播放:<b>歌曲名:Rohi Dunya(精神世界)&nbsp;歌手:Unknown</span></p>
                <div class="SongTime">00:00&nbsp;|&nbsp;00:00</div>
                <p>
                  <input type="hidden" id="audiofile" data-index="0" size="5" value="http://mp3.9ku.com/file2/38/37435.mp3" />
                  <audio id="myaudio" src="" >
                     你的浏览器不支持html5的audio标签
                  </audio>
                  
                </p>
                <!--
                <div class="ProcessControl">
                    <div class="process"></div>
                    <div class="processYet"></div>
                </div>
                -->
                <p>
                    <!--
                     <a class="button green" onclick="prevMusic();"><i class="fa fa-step-backward"></i></a>
                     <a class="button orange" onclick="rewindAudio()"><i class="fa fa-fast-backward"></i></a>
                      <a class="button green" id="play" onclick="playAudio()"><i class="fa fa-play"></i></a>
                     <a class="button orange"  onclick="forwardAudio()" ><i class="fa fa-fast-forward"></i></a>
                     <a class="button red" onclick="restartAudio();"><i class="fa fa-undo"></i></a>
                       <a class="button green" onclick="nextMusic();"><i class="fa fa-step-forward"></i></a>
                       -->
                    <input type="hidden" value="DESC" id="musicsort"/>
                </p>

                <p><b>日期&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;歌曲名称</b></p>
                <ul  class="list" id="everydayMusicul"></ul>
                <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>appframework/ui/musicScroll.js"></script>
            </div>


        </div>

        <div id="navbar">
            <a href="#main" id='navbar_home' class='icon home' >首页</a>
            <a href="#sentence" id='navbar_sentence' class='icon clock'>每日一句</a>
            <a href="#main2" id='navbar_aricle' class='icon paper'>文章</a>
            <a href="#daymusic" id='navbar_aricle2' class='icon headset'>每日歌曲</a>
            <a href="#aboutus" id='navbar_aboutus' class='icon info' data-transition="pop">关于我</a>
        </div>
       
       <footer id="everydayMusicFooter">
           <div class="ProcessControl">
                <div class="process"></div>
                <div class="processYet"></div>
           </div>
           <a href="javascript:void(0);" onclick="prevMusic();" class="first"><i class="fa fa-step-backward"></i></a>
           <a href="javascript:void(0);" onclick="rewindAudio()" class="two"><i class="fa fa-fast-backward"></i></a>
            <a href="javascript:void(0);" id="play" onclick="playAudio()" class="first"><i class="fa fa-play"></i></a>
            <a href="javascript:void(0);"  onclick="forwardAudio()" class="two"><i class="fa fa-fast-forward"></i></a>
            <a hef="javascript:void(0);" onclick="nextMusic();" class="first"><i class="fa fa-step-forward"></i></a>
       </footer>

        <nav id="home">
            <ul class="list">
                <li><a href="#main" id='navbar_home' class='icon home' >首页</a></li>
                <li><a href="#sentence" id='navbar_sentence' class='icon clock'>每日一句</a></li>
                <li><a href="#main2" id='navbar_aricle' class='icon paper'>文章</a></li>
                <li><a href="#daymusic" id='navbar_aricle2' class='icon headset'>每日歌曲</a></li>
                <li><a href="#aboutus" id='navbar_aboutus' class='icon info' data-transition="pop">关于我</a></li>
            </ul>
        </nav>

        <!--每日歌曲的音乐播放器状态栏-->
        <nav id="everydaymusic">
            <ul class="list">
                <li class="divider">播放器控制</li>
                <li >
                    <a href="#" onclick="startplaym()">播放</a>
                </li>
                <li >
                    <a href="#" onclick="pauseplaym()">暂停</a>
                </li>
                <li >
                    <a href="#" onclick="stopplaym()">停止</a>
                </li>
                <li >
                    <a href="#" onclick="">上一首</a>
                </li>
                <li >
                    <a href="#" onclick="">下一首</a>
                </li>
            </ul>
        </nav>

    </div>
    


</body>
</html>