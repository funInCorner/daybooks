 var siteurls = "";
  //play sound
function playbmusic(obj,srcs){
    /**
     * songer歌手名,songname歌曲名称,showdates是每日歌曲的日期，btn是播放按钮，oAudio是audio标签的id
     * **/
    var songer = $(obj).attr('songer'),
        songname = $(obj).attr('songname'),
        showdates = $(obj).attr('showdates'),
        btn = document.getElementById('play'),
        oAudio = document.getElementById('myaudio'),
        titles; 
    $("#audiofile").val(srcs);
    $("#myaudio").attr("src",srcs);
    titles = '当前播放:'+showdates+':<b>'+songname+'-'+songer+'</b>';
    $("#nowplays").html(titles);
    oAudio.play();
    //btn.textContent = "暂停";
     $("#play").html("<i class=\"fa fa-pause\"></i>");
   
    TimeSpan();
}

function stopplaym(){
    var oAudio = document.getElementById('myaudio');
    oAudio.currentTime = 0;
    oAudio.pause();
}

function startplaym(){
    var oAudio = document.getElementById('myaudio');
    oAudio.play();
}

function pauseplaym(){
    var oAudio = document.getElementById('myaudio');
    oAudio.pause();
}

 // Global variable to track current file name.
var currentFile = "";
var intervals = "";
var playcount = 0;
function playAudio() {
    // Check for audio element support.
    if (window.HTMLAudioElement) {
        try {
            var oAudio = document.getElementById('myaudio');
            var btn = document.getElementById('play'); 
            var audioURL = document.getElementById('audiofile'); 
            if (audioURL.value !== currentFile) {
                oAudio.src = audioURL.value;
                currentFile = audioURL.value;                       
            }
            // Tests the paused attribute and set state. 
            if (oAudio.paused) {
                oAudio.play();
                //btn.textContent = "暂停";
               // btn.innerHTML = "<i class=\"fa fa-pause\"></i>";
               $("#play").html("<i class=\"fa fa-pause\"></i>");
                TimeSpan();
            }
            else {
                oAudio.pause();
                //btn.textContent = "播放";
                 $("#play").html( '<i class="fa fa-play"></i>');
            }

        }
        catch (e) {
            // Fail silently but show in F12 developer tools console
             if(window.console && console.error("Error:" + e));
        }
    }
}


     // Rewinds the audio file by 30 seconds.
function rewindAudio() {
     // Check for audio element support.
    if (window.HTMLAudioElement) {
        try {
            var oAudio = document.getElementById('myaudio');
            oAudio.currentTime -= 30.0;
        }
        catch (e) {
            // Fail silently but show in F12 developer tools console
             if(window.console && console.error("Error:" + e));
        }
    }
}

     // Fast forwards the audio file by 30 seconds.

function forwardAudio() {

     // Check for audio element support.
    if (window.HTMLAudioElement) {
        try {
            var oAudio = document.getElementById('myaudio');
            oAudio.currentTime += 30.0;
        }
        catch (e) {
            // Fail silently but show in F12 developer tools console
             if(window.console && console.error("Error:" + e));
        }
    }
}

     // Restart the audio file to the beginning.

function restartAudio() {
     // Check for audio element support.
    if (window.HTMLAudioElement) {
        try {
            var oAudio = document.getElementById('myaudio');
            oAudio.currentTime = 0;
        }
        catch (e) {
            // Fail silently but show in F12 developer tools console
             if(window.console && console.error("Error:" + e));
       }
    }
}

//时间进度处理程序
function TimeSpan() {
    var audio = document.getElementById("myaudio");
    playcount = 0;
    var ProcessYet = 0;//进度条width为0
    intervals = setInterval(function(){
        var ProcessYet = (audio.currentTime / audio.duration) * 320;
        var currentTime = timeDispose(audio.currentTime);
        var timeAll = timeDispose(TimeAll());
        $(".SongTime").html(currentTime + "&nbsp;|&nbsp;" + timeAll);
        $("div.processYet").css("width", ProcessYet+"px");
        //判断媒体是否可以使用
        if( (playcount >= 5) && (isNaN(audio.duration) ) ){
            $(".SongTime").html("00:00&nbsp;|&nbsp;00:00");
            clearInterval(intervals);
        }
        playcount++;

    }, 1000);   
}


//时间处理，因为时间是以为单位算的，所以这边执行格式处理一下
function timeDispose(number) {
    var minute = parseInt(number / 60);
    var second = parseInt(number % 60);
    minute = minute >= 10 ? minute : "0" + minute;
    second = second >= 10 ? second : "0" + second;
    return minute + ":" + second;
}

//当前歌曲的总时间
function TimeAll() {
    var audio = document.getElementById("myaudio");
    return audio.duration;
}


function musicPlays(){
    var oAudio = document.getElementById('myaudio');
    var btn = document.getElementById('play'); 
     if (oAudio.paused) {
        oAudio.play();
        //btn.textContent = "暂停";
       // btn.textContent = '<i class="fa fa-pause"></i>';
        $("#play").html( '<i class="fa fa-pause"></i>');
        TimeSpan();
    }
}

function musicPauses(){
    var oAudio = document.getElementById('myaudio');
    var btn = document.getElementById('play'); 
    if(oAudio.play){
       oAudio.pause();
       //btn.textContent = "播放"; 
       $("#play").html( '<i class="fa fa-play"></i>');
    }
}

$(document).ready(function(){
    // 音频进度条事件（进度增加）
    $(".process").click(function (e) {
        //console.log(e.clientX);
        //播放进度条的基准参数
        var Process = $(".process").offset();
        var ProcessStart = Process.left;
        var ProcessLength = $(".process").width();


        var CurrentProces = e.clientX - ProcessStart;
        DurationProcessRange(CurrentProces / ProcessLength);
        $(".processYet").css("width", CurrentProces);
    });

    /*$(".process").bind("singleTap",function(e){
        console.log(e.clientX);
        //播放进度条的基准参数
        var Process = $(".process").offset();
        var ProcessStart = Process.left;
        var ProcessLength = $(".process").width();


        var CurrentProces = e.clientX - ProcessStart;
        DurationProcessRange(CurrentProces / ProcessLength);
        $(".processYet").css("width", CurrentProces);
    });*/

   

    //音频进度条事件（进度减少）
    $(".processYet").click(function (e) {

        //播放进度条的基准参数
        var Process = $(".process").offset();
        var ProcessStart = Process.left;
        var ProcessLength = $(".process").width();

        var CurrentProces = e.clientX - ProcessStart;
        DurationProcessRange(CurrentProces / ProcessLength);
        $(".processYet").css("width", CurrentProces);
    });
    //播放进度条的转变事件
    function DurationProcessRange(rangeVal) {
        var audio = document.getElementById("myaudio");
        audio.currentTime = rangeVal * audio.duration;
        audio.play();
    }
});

 
 
 
//
function musicpanels(){
    $.ajax({
        type:"post",
        url:siteurls+"index.php/welcome/firstloadmusic",
        success:function(datas){
            if($("#daymusic div").filter("#nomresults").length > 0 ){
                $("#nomresults").remove();
            }
            $("#everydayMusicul").empty();
            var showdata = $.parseJSON(datas);
            var tmpli = "";
            if(showdata.msg){
                tmpli = '<li>'+showdata.msg+'</li>';
                $("#everydayMusicul").append(tmpli);
            }else{

                $.each(showdata,function(index,val){
                    tmpli = '<li data-index="'+index+'"><a href="#" songname="'+val.musicName+'" songer="'+val.songer+'" showdates="'+val.showdate+'" onclick="playbmusic(this,\''+val.msuicUrl+'\')">'+val.showdate+'&nbsp;&nbsp;'+val.musicName+'-'+val.songer+'</a></li>';
                    $("#everydayMusicul").append(tmpli);
                    if(index == 0){
                         $("#nowplays").html('当前播放:'+val.showdate+':<b>'+val.musicName+'-'+val.songer+'</b>');
                         $("#audiofile").val(val.msuicUrl);
                         $("#audiofile").attr("data-index","0");
                     }
                });    
               // $("#everydayMusicul li").get(0).addClass("green");
               //当歌曲列表加载完成，给第一个li添加class
                var a = $("#everydayMusicul li").get(0);
                $(a).addClass("blue");
            }


        },
        error:function(){
            tmpli = '<li>数据加载失败!</li>';
            $("#everydayMusicul").append(tmpli);
            
        }
    });
}

//歌曲排序
function musicsortpanels(sorts){
    $.ajax({
        type:"post",
        url:siteurls+"index.php/welcome/firstloadmusic",
        data:{sort:sorts},
        success:function(datas){
            console.log($("#daymusic div").filter("#nomresults").length );
            if($("#daymusic div").filter("#nomresults").length > 0 ){
                $("#nomresults").remove();
            }
            $("#everydayMusicul").empty();
            var showdata = $.parseJSON(datas);
            var tmpli = "";
            if(showdata.msg){
                tmpli = '<li>'+showdata.msg+'</li>';
                $("#everydayMusicul").append(tmpli);
            }else{
                $.each(showdata,function(index,val){
                    tmpli = '<li><a href="#" songname="'+val.musicName+'" songer="'+val.songer+'" onclick="playbmusic(this,\''+val.msuicUrl+'\')">'+val.showdate+'&nbsp;&nbsp;'+val.musicName+'-'+val.songer+'</a></li>';
                   $("#everydayMusicul").append(tmpli);
                });    
                $.ui.scrollToTop("daymusic");
            } 

            $("#musicsort").val(sorts);
        }
    });
}
//上一首歌曲
function prevMusic(){
    var nowSort = $("#audiofile").attr("data-index");
    
}

//下一首歌曲
function nextMusic(){
    
}


$(function(){
    siteurls = $("meta[name='siteurl']").attr("content");
    var audio = document.getElementById('myaudio')
      //监听媒体文件结束的事件（ended），这边一首歌曲结束就读取下一首歌曲，实现播放上的循环播放
    audio.addEventListener('ended', function () {
        $("#everydayMusicul li a").each(function () {
            console.log($(this).attr('songname'));
            /*if ($(this).css("color") == "rgb(122, 128, 147)") {
                var IsBottom = $(this).parent(".Single").next(".Single").length == 0 ? true : false;  //检查是否是最尾端的歌曲
                var NextSong;
                if (IsBottom) {
                    NextSong = $(".Single").first().children(".SongName").attr("KV");
                    $(".Single").first().children(".SongName").css("color", "#7A8093");
                }
                else {
                    NextSong = $(this).parent(".Single").next(".Single").children(".SongName").attr("KV");
                    $(this).parent(".Single").next(".Single").children(".SongName").css("color", "#7A8093");
                }

                audio.src = "../Media/" + NextSong + ".mp3";
                $(".MusicBox .ProcessControl .SongName").text(NextSong);
                $(this).css("color", "#fff");
                audio.play();
                return false; //代表break
            }*/

        });
    }, false);

});
