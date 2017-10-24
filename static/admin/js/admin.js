$(document).ready(function(){
	//判断登录状态
	$.getJSON('/cms/index.php/Account/login/check?access_key=0b454310b1ee2c902eb90bf02b5cf0bc')
	.success(function(result){
		if(!result.current_user){
			go2LoginPage();
		}
	})
	.error(function(){
		go2LoginPage();
	})
	;
});

function go2LoginPage(){
	window.location.href="/cms/index.php/Account/login";
}
