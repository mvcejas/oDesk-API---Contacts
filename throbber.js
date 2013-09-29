$(document).ajaxStart(function(){
	$('body').append('<div id="throbber" style="position:fixed;top:40px;right:0;bottom:0;left:0;z-index:1040;text-align:center;padding-top:10%;background:rgba(255,255,255,0.2)"><img src="throbber.gif"></div>');
}).ajaxStop(function(){
	$('body').find('#throbber').remove();
});
