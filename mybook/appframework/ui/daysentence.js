var getsentenceCount = 3;

$.ui.ready(function(){
	$.jsonP({
    	url:siteurls+"?callback=?&type=daysentence",
    	success:function(datas){
    		//datas is Object
    		if($("#unsenResult").length > 0 ){
                $("#unsenResult").remove();
            }
    		$("#daysentenul").empty();
    		 var tmpli = "";
    		 if(datas.status == 0){
                 tmpli = '<li>没有歌曲了!</li>';
                 $("#daysentenul").append(tmpli);
             }else{
                 showdata = datas.data;
                 $.each(showdata,function(index,val){
                 	 tmpli ='<li class="divider">'+val.showdate+'</li>';
                     tmpli += '<li id="'+val.sid+'" ><a href="#" >';
                     tmpli +='<div class="grid">';
                     tmpli +='<div class="col1-3"><img src="'+val.showimg+'" style="background:url(\'images/loading.gif\') no-repeat center center;"/></div>';
                     tmpli +='<div class="col2-3"><p>'+val.engsen+'<br/><br/>'+val.scsen+'<br/><br/><strong>词霸小编:</strong>'+val.desc+'</p></div>';
                     tmpli +='</div></a></li>';

                     $("#daysentenul").append(tmpli);
                 });    
                 $.ui.updateBadge(".navbar_sentence",showdata.length,'lr');
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


});
