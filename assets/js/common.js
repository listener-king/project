
define( [ 
	'jquery'
	, 'template'
	, 'nprogress'
	, 'cookie' ]
, function ( $, template, nprogress ) {
	
	// 验证用户登录, 跳转到 登录页
	if ( !$.cookie( 'PHPSESSID' ) && location.pathname != '/index.php/login' ) {
		location.pathname = '/index.php/login';
		return;
	}


	if ( location.pathname == '/index.php/login' ) return; 


	// 配置全局加载数据的进度
	$( document ).ajaxStart(function () {

		// console.log( 'start' );
		nprogress.start();


	

		$( '<div id="itcast_cover"><img src="/assets/images/loading.gif"></div>' )
			.appendTo( 'body' );

				// 进度加载
		if ( $( '#itcast_cover' ).length > 0 ) {
			$( '#itcast_cover' ).show();
			return;
		} 

	}).ajaxStop(function () {
		// console.log( 'stop' );
		nprogress.done();


		// 隐藏进度条
		$( '#itcast_cover' ).fadeOut();
	});



	// 可以进入到这里表示已经登录成功
	// 页面加载后, 从 cookie 中获得用户名与头像的路径
	//把字符串转化为js对象
	var profile = JSON.parse( $.cookie( 'profile' ) || '{}' );

	var html = template( 'profileId', profile );
	$( '.aside .profile' ).html( html );


		$('.navs ul').prev('a').on('click', function () {
		$(this).next().slideToggle();
	});


//如果请求地址不是登录页面，就跳转到登录页面
	$.ajax({
		url: '/api/teacher'
	})
});
