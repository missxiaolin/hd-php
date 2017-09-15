<?php 

Route::get('/','Home/Index/index');
//退出
Route::get('out.html','Home/Login/out');
// 搜索商品
Route::get('search_{seach}.html','Home/Search/index');
// 商品找不到列表
Route::get('searchs_{cid}_{seach}.html','Home/Search/shoplist');
// 点击进入商品列表页
Route::get('shoplist_{cid}.html','Home/Shop/shoplist');
// 登陆
Route::get('login.html','Home/Login/index');
Route::post('login.html','Home/Login/index');
// 注册
Route::get('register.html','Home/Register/index');
Route::post('register.html','Home/Register/index');
// 我的订单
Route::get('order.html','Home/Info/order');
// 个人信息
Route::get('my.html','Home/Info/index');
Route::post('my.html','Home/Info/index');
// 结算
Route::get('vipabc_{oid}.html','Home/Info/vipabc');
Route::post('vipabc_{oid}.html','Home/Info/vipabc');
// 确认收货
Route::get('ensure_{oid}.html','Home/Info/ensure');
Route::post('ensure_{oid}.html','Home/Info/ensure');
// 商品评价
Route::get('assess_{gid}.html','Home/Info/assess');
Route::post('assess_{gid}.html','Home/Info/assess');
// 头像
Route::get('portrait.html','Home/Info/portrait');
// 收货地址
Route::get('address.html','Home/Info/address');
// 进入商品页面
Route::get('shop_{gid}.html','Home/Shop/shop');
// 购物车详情页
Route::get('cart.html','Home/Shopcart/carindex');
// 添加购物车
Route::get('addcart.html','Home/Shopcart/addcart');

// 订单结算
Route::get('shopcart.html','Home/Shopcart/index');
Route::post('shopcart.html','Home/Shopcart/index');
// 提交订单成功！
Route::get('buysuccess_{oid}.html','Home/Shopcart/buysuccess');
Route::post('buysuccess.html','Home/Shopcart/buysuccess');











// 文章列表
Route::get('arc.html','Home/Arc/index');
// 文章内容
Route::get('arclist_{wid}.html','Home/Arc/arccon');















