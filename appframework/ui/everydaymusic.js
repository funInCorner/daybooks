 
 //play sound
function playbmusic(obj,srcs){
    
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
    btn.textContent = "暂停";
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
                        btn.textContent = "暂停";
                        TimeSpan();
                    }
                    else {
                        oAudio.pause();
                        btn.textContent = "播放";
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
                btn.textContent = "暂停";
                TimeSpan();
            }
        }

        function musicPauses(){
            var oAudio = document.getElementById('myaudio');
            var btn = document.getElementById('play'); 
            if(oAudio.play){
               oAudio.pause();
               btn.textContent = "播放"; 
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