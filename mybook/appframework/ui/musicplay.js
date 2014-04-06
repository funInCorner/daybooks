var replaysend = 1;
var oAudio = null;
var songerLength = 10;
var songNameLength = 10;
var maxVolume = .5;/**0~1之间的数字**/
/**
*删除当前li.blue的样式，
**/
function removeNowBlue(){
    $.each($("#everydayMusicul li"),function(index,val){
        if($(val).hasClass("blue")){
            $(val).removeClass("blue");
            return false;//起到break的功能
            //return ;实现continue功能
        }
     });

}

/**显示当前播放器的状态**/
function showstate($msg){
	$(".songinfo>.songstate").html($msg);
	$(".songinfo>.songstate").show();
	$(".songinfo>.songinfos").hide();
}

function hidestate(){
	$(".songinfo>.songstate").hide();
	$(".songinfo>.songinfos").show();
}


  //play sound
function playbmusic(obj){
    /**
     *src：歌曲路径
     * songer歌手名,
     *songname歌曲名称,
     *dataindex：当前歌曲的id,
     *songertx:歌曲的头像,
     *btn是播放按钮，
     *oAudio是audio标签的id
     * **/
     //var index = $("#everydayMusicul li").removeClass("blue");
     removeNowBlue();
     $(obj).parent().addClass("blue");
    var src = $(obj).attr('src'),
        songer = subtext($(obj).attr('songer'),songerLength),
        songname = subtext($(obj).attr('songname'),songNameLength),
        dataindex = $(obj).parent().attr('data-index'),
        songertx = $(obj).parent().attr('data-stx'),
        btn = document.getElementById('play');

  
    $("#audiofile").val(src);
    $("#myaudio").attr("src",src);
    $(".songinfos>.songName").html(songname);
    $(".songinfos>.songerName").html(songer);
    $(".songerimg>img").attr("src",picurls+songertx);
    $("#audiofile").attr("data-index",dataindex);
    oAudio.play();
    hidestate();
    $("#play").html("<i class=\"fa fa-pause fa-2x\"></i>");
    TimeSpan();
}

function stopplaym(){
    oAudio.currentTime = 0;
    oAudio.pause();
}

function startplaym(){
    oAudio.play();
}

function pauseplaym(){
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
            var audiofile = document.getElementById('audiofile');
            var btn = document.getElementById('play'); 
            //console.log(oAudio.paused);
            // Tests the paused attribute and set state. 
            var haveMusic = $("#myaudio").attr("src");
            if(haveMusic == ""){
                $("#myaudio").attr("src",audiofile.value);    
            }
         
            if (oAudio.paused) {
            	hidestate();
                oAudio.play();
               $("#play").html("<i class=\"fa fa-pause fa-2x\"></i>");
                TimeSpan();
            }else {
            	showstate("暂停中...");
                oAudio.pause();
                $("#play").html( '<i class="fa fa-play fa-2x"></i>');
            }
        }
        catch (e) {
            // Fail silently but show in F12 developer tools console
             if(window.console && console.error("Error:" + e));
        }
    }
}


//时间进度处理程序
function TimeSpan() {
    playcount = 0;
    intervals = setInterval(function(){
        var currentTime = timeDispose(oAudio.currentTime);
        var timeAll = timeDispose(TimeAll());
        $(".songTime").html(currentTime + "-" + timeAll);
        //判断媒体是否可以使用
        if( (playcount >= 8) && oAudio.currentTime == 0 ){
        	var dataindex = $("#audiofile").attr("data-index");
        	nextMusic();
          clearInterval(intervals);
        }
        if(playcount < 9){
        	playcount++;
        }
        
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
	
    return oAudio.duration;
}


function musicPlays(){
    var btn = document.getElementById('play'); 
     if (oAudio.paused) {
        oAudio.play();
        $("#play").html( '<i class="fa fa-pause fa-2x"></i>');
        TimeSpan();
    }
}

function musicPauses(){
    var btn = document.getElementById('play'); 
    if(oAudio.play){
       oAudio.pause();
       //btn.textContent = "播放"; 
       $("#play").html( '<i class="fa fa-play fa-2x"></i>');
    }
}

$(document).ready(function(){
  
    oAudio = document.getElementById('myaudio');
    oAudio.volume = maxVolume;
    //监听媒体文件结束的事件（ended），这边一首歌曲结束就读取下一首歌曲，实现播放上的循环播放
    oAudio.addEventListener('ended', function () {
    	nextMusic();
  }, false);
  
  
});

 
 
 
/**
 * 当每日歌曲页面加载的时候，执行该方法
 * ***/
function musicpanels(){
	$.jsonP({
    	url:siteurls+"?callback=?&type=getmusic",
    	success:function(datas){
    		//datas is Object
    		if($("#nomresults").length > 0 ){
                $("#nomresults").remove();
            }
    		$("#everydayMusicul").empty();
    		 var tmpli = "";
    		 if(datas.status == 0){
                 tmpli = '<li>没有歌曲了!</li>';
                 $("#everydayMusicul").append(tmpli);
             }else{
                 showdata = datas.data;
                 $.each(showdata,function(index,val){
                     tmpli = '<li id="s_'+index+'" data-index="'+index+'" data-stx="'+val.songertx+'"><a href="#" songname="'+val.musicName+'" songer="'+val.songer+'" src="'+val.msuicUrl+'" onclick="playbmusic(this)">'+val.showdate+'&nbsp;&nbsp;'+val.musicName+'-'+val.songer+'</a></li>';
                     $("#everydayMusicul").append(tmpli);
                     if(index == 0){
                          //$("#nowplays").html('当前播放:'+val.showdate+':<b>'+val.musicName+'-'+val.songer+'</b>');
                          $(".songinfo>.songName").html(val.musicName);
                          $(".songinfo>.songerName").html(val.songer);
                           $(".songerimg>img").attr("src",picurls+val.songertx);
                          $("#audiofile").val(val.msuicUrl);
                          $("#audiofile").attr("data-index",index);
                          showstate("暂停中...");
                      }
                 });    
                 console.log(showdata.length);
                 $.ui.updateBadge("#navbar_aricle21",showdata.length,'lr');
                //当歌曲列表加载完成，给第一个li添加class
                 var a = $("#everydayMusicul li").get(0);
                 $(a).addClass("blue");
             }
		},
		error:function(){
			// $.ui.popup("加载失败，请重试!");
			  $("#everydayMusicul").empty();
			  tmpli = '<li><a class="button" onclick="musicpanels()">点击重新加载'+replaysend+'</a></li>';
              $("#everydayMusicul").append(tmpli);
              replaysend++;
		}
    });
	
}



//上一首歌曲
function prevMusic(){
    var nowSort = $("#audiofile").attr("data-index");
    var prevIndex = (nowSort * 1) - 1; 
    console.log(prevIndex);
    if(prevIndex <= -1){
    	prevIndex = $("#everydayMusicul li").length - 1;
    }
    console.log(prevIndex+"yes");
    prevNextPlay(prevIndex);
    
}

/**
*下一首歌曲 OK 2014-03-27
**/ 
function nextMusic(){
    
    var nowSort = $("#audiofile").attr("data-index");
    var nextIndex = (nowSort * 1) + 1; 
    if($("#everydayMusicul li").get(nextIndex) == undefined){
        nextIndex = 0;
    }
    prevNextPlay(nextIndex);
}

function prevNextPlay(nextIndex){
	removeNowBlue();
    obj = $("#everydayMusicul li").get(nextIndex);
    $(obj).addClass("blue");
    var childrens = $(obj).children();
    var src = childrens.attr('src'),
        songer = subtext(childrens.attr('songer'),songerLength),
        songname = subtext(childrens.attr('songname'),songNameLength),
        dataindex = $(obj).attr('data-index'),
        songertx = $(obj).attr('data-stx'),
        btn = document.getElementById('play');

    $("#audiofile").val(src);
    $("#myaudio").attr("src",src);
    $(".songinfos>.songName").html(songname);
    $(".songinfos>.songerName").html(songer);
    $(".songerimg>img").attr("src",picurls+songertx);
    $("#audiofile").attr("data-index",dataindex);
    oAudio.play();
    hidestate();
    $("#play").html("<i class=\"fa fa-pause fa-2x\"></i>");
    TimeSpan();
}

/**音量按钮事件***/
function volume(){
	var volume = oAudio.volume;
  var musicvolume = $("#musicvolume");
	if(volume == maxVolume){
		oAudio.volume = 0;
		$("#dvolume").html("<i class=\"fa fa-volume-off fa-2x\"></i><i class=\"fa fa-ban fa-stack-2x text-danger\"></i>");
     musicvolume.text("有声");
	}else{
		oAudio.volume = maxVolume;
		$("#dvolume").html("<i class=\"fa fa-volume-up fa-2x\"></i>");
    musicvolume.text("静音");
	}
}





