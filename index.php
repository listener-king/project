<?php



// 将 views/index/index.html 这个文件放到这里
// include_once './views/index/index.html';

// 接收路径描述, 根据路径的描述 include 不同的 html 显示到页面中( 路由 route )
// var_dump( $_SERVER );     会显示出集中打开文件的方式（路径）
// 使用 PATH_INFO 来获得用户输入的 路径（这个方法是其中一种）
// echo $_SERVER[ 'PATH_INFO' ];
// 需要一个东西可以判断数组中是否存在某一个键
// array_key_exists( key, array )


/*
$isExist = array_key_exists( 'PATH_INFO', $_SERVER );

// var_dump( $isExist );

// 如果没有输入路径应该显示的是 主页, 如果有路径就显示路径描述的页面
if ( $isExist ) {
    // 输入了路径
    include_once './views' . $_SERVER[ 'PATH_INFO' ] . '.html';
    // 输入的是长名字 还是 短名字呢?



} else {
    // 没有输入路径
    include_once './views/index/index.html';
}
*/



// 设定算法, 我们可以一开始就获得输入的 路径, 用 / 分隔一下
// 拿到自路径结构. 可以考虑如果分割后得到的是两个数据 就表明是长路径形式
// 如果分割后得到的是 1 个元素, 那么使用的 就是短路径形式


/*
$isExist = array_key_exists( 'PATH_INFO', $_SERVER );

if ( $isExist ) {
    $path_info = $_SERVER[ 'PATH_INFO' ];
    // 进行分隔, 判断长短
    // /index.php/index/index
    // /index.php/login
    // split
    // explode 函数可以用来分隔字符串
    // $path_infos = explode( '/', $path_info );
    // 1: 长路径   '/index/login'      [ '', 'index', 'login' ]
    // 2: 短路径   '/login'            [ '', 'login' ]  
    // 3: /        '/'                 [ '', '' ]

    // slice
    // substr

    $path_info = substr( $path_info, 1 ); // 将开始的 / 去除
    $path_infos = explode( '/', $path_info );

    // 如果是 '' 还是走默认的页面
    // 如果是两个元素 配置按照输入显示
    // 如果是一个那么就加上 index 显示
    if ( count( $path_infos ) == 2 ) {
        // 用输入的路径显示
    } elseif ( count( $path_infos ) == 1 && $path_infos[ 0 ] == '' ) {
        // 按照默认输入
    } else {
        // 嵌入 index 后在找出页面
    }
    var_dump( $path_infos );

} else {
    // 不用分隔直接获得路径 index index
    $path = 'index';
    $filename = 'index';
}
*/


// include_once( './views/' . $path . '/' . $filename . '.html' );

// 首先判断这个数组里有没有PATH-INFO这个方法
$isExist = array_key_exists( 'PATH_INFO', $_SERVER );

// 用户在写路径的时候，会有以下几种形式
//  www.studyit.com                              不存在 PATH_INFO
//  www.studyit.com/                             存在: '/'
//  www.studyit.com/login                        存在: '/login'
//  www.studyit.com/list/login                  存在: '/list/login'


// 因为有可能有路径，也有可能没有路径，这时我们不好管理，我们同意弄成有路径的，就比较好管理
// 如果有路径，就不用管，直接对其处理，如果没有，就加上/，让它变成有
if ( $isExist ) {
    $path_info = $_SERVER[ 'PATH_INFO' ];
} else {
    $path_info = '/';
} 

// 这时候会把路径的最前面的"/"去除
$path_info = substr( $path_info, 1 );
// 分别得到 ""    login    index/login

// 然后用/将$path_info分割开，得到的是一个数组
$path_infos = explode( '/', $path_info );
// 1, ['']
// 2, ['login']
// 3, ['list', 'login' ]

// count是php中，数组长度的方法   这时候是第三种情况
if ( count( $path_infos ) == 2 ) {
    $path = $path_infos[ 0 ];
    $filename = $path_infos[ 1 ];
    //strlen是php中获得字符串长度的方法
    //php中的elseif中间是没有空格的
    // 剩下还有第一和第二种，如果索引为0项的长度大于0，说明就是第二种情况
} elseif ( strlen( $path_infos[ 0 ] ) > 0 ) {
    $path = 'index';
    $filename = $path_infos[ 0 ];
} else {
    $path = 'index';
    $filename = 'index';
}

include_once( './views/' . $path . '/' . $filename . '.html' );




?>