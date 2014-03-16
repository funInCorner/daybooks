 var siteurls = "";
 
 
        
        //每日歌曲测试
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
                            if(index == 0){
                                $("#nowplays").html('当前播放:'+val.showdate+':<b>'+val.musicName+'-'+val.songer+'</b>');
                                $("#audiofile").val(val.msuicUrl);
                            }
                            tmpli = '<li><a href="#" songname="'+val.musicName+'" songer="'+val.songer+'" showdates="'+val.showdate+'" onclick="playbmusic(this,\''+val.msuicUrl+'\')">'+val.showdate+'&nbsp;&nbsp;'+val.musicName+'-'+val.songer+'</a></li>';
                           $("#everydayMusicul").append(tmpli);

                        });    
                    }
                    
                    
                }
            });
        }

        function musicsortpanels(sorts){
            $.ajax({
                type:"post",
                url:siteurls+"index.php/welcome/firstloadmusic",
                data:{sort:sorts},
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
                            tmpli = '<li><a href="#" songname="'+val.musicName+'" songer="'+val.songer+'" onclick="playbmusic(this,\''+val.msuicUrl+'\')">'+val.showdate+'&nbsp;&nbsp;'+val.musicName+'-'+val.songer+'</a></li>';
                           $("#everydayMusicul").append(tmpli);
                        });    
                        $.ui.scrollToTop("daymusic");
                    } 

                    $("#musicsort").val(sorts);
                }
            });
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
