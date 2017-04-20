
	// NProgress.start();

	// NProgress.done();

	$('.navs ul').prev('a').on('click', function () {
		$(this).next().slideToggle();
	});

	

// 在进入页面的时候要先验证是否有登录, 如果有登录什么都不用做
// 如果没有登录那么就要跳转到 登录页面

// 判断是否含有 sessionid 即可
// php 给浏览器发送的 seesionid 名字叫做 PHPSESSID


// 我们在发送cookie的时候，浏览器会给出一个sessid值，下次请求的时候，直接用这个值来请求，也就是说我们在第一次登录的时候，会有一个sessid值
// 第二次登录的时候直接拿这个值来进行匹配，如果有，就说明已经登陆过，就什么也不做，如果没有就说明没有登录过，就直接跳转到登录界面
// 并且如果当前页面不是登录页面，也要跳转到登录页面
if ( !$.cookie( 'PHPSESSID' ) && location.pathname != '/index.php/login' ) {
	// 跳转到登录页面
	// location.href = '';
	// Browser Object Model 对象
	// widnow
	// document
	// location
	// screen
	// confirm
	// open
	// alert
	// console
	// ...
	location.pathname = '/index.php/login';
}






// 页面加载的时候 从 cookie 中取出用户信息, 加载 图片与名字
//页面加载的时候，要显示出相应的名字和头像

// 在cookie缓存中会有一个profile属性，可以得到头像和文字的属性值
// 因为模板引擎传入的是对象，所以这里用JSON.parse方法将其转为对象
var profile = JSON.parse( $.cookie( 'profile' ) );


// console.log( template );
var html = template( 'profileId', profile );
$( '.aside .profile' ).html( html );




