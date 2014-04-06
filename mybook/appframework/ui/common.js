var debug = true;
var picurls="";
var siteurls
if(debug){
	var siteurls = "http://192.168.1.128/daybookapi/index.php/apis";//接口地址
	var picurls = "http://192.168.1.128/daybookapi/";	
}else{
	var siteurls = "http://sheny.oozu.cn/daybookapi/index.php/apis";//接口地址
	var picurls = "http://sheny.oozu.cn/daybookapi/";	
}
console.log(siteurls);

/**
 * 解决JSONP跨越的一个种方法
 * body添加js标签
 * http://www.cnblogs.com/chopper/archive/2012/03/24/2403945.html
 * **/
function addScriptTag(src){
	var script = document.createElement("script");
		script.setAttribute("script","text/javascript");
		script.src = src;
		document.body.appendChild(script);
}

function subtext(string,length){
	var strings = string.substring(0,length) + "...";
	return strings;
}

//页面加载的js

var webRoot = "./";
$.ui.autoLaunch = false; //By default, it is set to true and you're app will run right away.  We set it to false to show a splashscreen
//To disable custom operating system themes, set $.ui.useOSThemes to false.
$.ui.useOSThemes=false;
$.ui.openLinksNewTab = false;  

$(document).ready(function(){
   // $.ui.launch();
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

function unloadedPanel(what) {
   console.log("unloaded " + what.id);
}

function lsSetItem(id){
    var ls = window.localStorage;
    ls.setItem('id',id);
    //console.log('设置id成功');     
}