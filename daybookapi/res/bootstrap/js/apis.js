$(function(){
	$("#formswitch,#postswitch").bootstrapSwitch();

	$('#formswitch').on('switch-change', function (e, data) {
	    /*var $el = $(data.el)
	      , value = data.value;
	    console.log(e, $el, value);*/
	    if(data.value){
	    	$("form").attr("target","_blank");
	    }else{
	    	$("form").attr("target","");
	    }

	});	

	$("#postswitch").on("switch-change",function(e,data){
		if(data.value){
	    	$("form").attr("method","get");
	    }else{
	    	$("form").attr("method","post");
	    }
	});


});
