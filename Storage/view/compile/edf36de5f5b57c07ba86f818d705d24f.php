<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>商品页面</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop_list.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/shop.css"/>
		<script src="./Public/index/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/right.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
//			验证规格地址
			validate = "<?php echo U('Shopcart/validate')?>";
//			商品价格
			price = "<?php echo $shopData['shopprice']?>";
//			付款商品页面
			Jump = "<?php echo U('Shopcart/session')?>";
//			购物车
			shopcar = "<?php echo U('Shopcart/addcart')?>";
			payment = "<?php echo U('Shopcart/index')?>";
		</script>
		<script src="./Public/index/js/enlarge.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		<!--文本城市区域js-->
		<!--<script src="./Public/index/js/shop/cityJson.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop/citySet.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop/Popt.js" type="text/javascript" charset="utf-8"></script>-->
	</head>
	<body>
				<!--顶部区域-->
		<div id="top">
			<div class="top_middle">
				<div class="top_right">
					<ul>
						<li>
							
							                
								<a href="my.html"><span style="margin-right: 5px;">admin9999</span>
								<a href="out.html" style="margin-right: 10px;">退出</a>
														</li>
						<li class="line"></li>
						<li>
							<a href="my.html" class="dd">个人中心</a>
						</li>
						<li class="line"></li>
						<li>
							<a href="order.html" class="dd">我的订单</a>
						</li>
						<li class="line"></li>
						<!-- <li>
							<a href="http://localhost/shop/index.php?m=Home&c=Info&a=follow" class="dd">我的收藏</a>
						</li> -->
						<!-- <li class="line"></li> -->
						<li>
							<p class="gy">
								<a href="javascript:;" class="gb">联系我<i class="iconfont">&#xe652;</i></a>
							</p>
							<div class="box gyjd">
								<img src="./Public/index/images/332.jpg"/>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		
		 		
		<!--顶部区域结束-->
		<!--搜索栏部分-->
		<div id="search">
			<div class="logo">
				<a href="index.html"><img src="./Public/index/images/24.png"/></a>
			</div>
			<input type="text" name="" id="search_shop_list" placeholder="闪购" class="text" />
			<input type="submit" name="" id="search_shop" value="搜索" class="tj" />
			<p class="tg">
				<!--放点热门点击的产品分类链接-->
				<a href=""></a>
			</p>
			<div class="shop">
				<i class="tb_1"></i>
				<a href="cart.html">我的购物车</a>
				<i class="iconfont tb_2">&#xe677;</i>
				<div class="sum">0
               </div>
			</div>
		</div>
		<!--搜索栏结束-->
		<!--导航开始-->
		<div id="nav">
			<div class="center">
				<div class="dh">
					<a href="javascript:;" class="whole">全部商品分类</a>
					<div class="shop_title                 shop_list
               "                 style="display: none;"
               >
						<ul>
							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_1.html">电视</a><span>、</span>
																			<a href="shoplist_1.html">空调</a><span>、</span>
																			<a href="shoplist_1.html">洗衣机</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>电视<i>></i></dt>
													<dd>
																													<a href="shoplist_5.html">合资电视</a>
																													<a href="shoplist_74.html">国产品牌</a>
																													<a href="shoplist_75.html">互联品牌</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>空调<i>></i></dt>
													<dd>
																													<a href="shoplist_76.html">壁挂式空调</a>
																													<a href="shoplist_77.html">柜式空调</a>
																													<a href="shoplist_78.html">空调配件</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>洗衣机<i>></i></dt>
													<dd>
																													<a href="shoplist_79.html">滚筒洗衣机</a>
																													<a href="shoplist_80.html">洗烘一体机</a>
																													<a href="shoplist_81.html">波轮洗衣机</a>
																													<a href="shoplist_82.html">迷你洗衣机</a>
																													<a href="shoplist_83.html">洗衣机配件</a>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_6.html">手机</a><span>、</span>
																			<a href="shoplist_6.html">手机配件</a><span>、</span>
																			<a href="shoplist_6.html">京东通信</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>手机<i>></i></dt>
													<dd>
																													<a href="shoplist_84.html">手机</a>
																													<a href="shoplist_85.html">对讲机</a>
																													<a href="shoplist_86.html">以旧换新</a>
																													<a href="shoplist_87.html">手机维修</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>手机配件<i>></i></dt>
													<dd>
																													<a href="shoplist_88.html">手机电池</a>
																													<a href="shoplist_89.html">移动电源</a>
																													<a href="shoplist_90.html">蓝牙耳机</a>
																													<a href="shoplist_93.html">充电器</a>
																													<a href="shoplist_94.html">数据线</a>
																													<a href="shoplist_95.html">手机耳机</a>
																													<a href="shoplist_96.html">手机支架</a>
																													<a href="shoplist_97.html">贴膜</a>
																													<a href="shoplist_98.html">手机存储卡</a>
																													<a href="shoplist_99.html">保护套</a>
																													<a href="shoplist_106.html">苹果周边</a>
																													<a href="shoplist_103.html">手机饰品</a>
																													<a href="shoplist_104.html">拍照配件</a>
																													<a href="shoplist_105.html">车载配件</a>
																													<a href="shoplist_107.html"> 创意配件</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>京东通信<i>></i></dt>
													<dd>
																													<a href="shoplist_108.html">选号中心</a>
																													<a href="shoplist_109.html">自助服务</a>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_7.html">电脑整机</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>电脑整机<i>></i></dt>
													<dd>
																													<a href="shoplist_110.html">笔记本</a>
																													<a href="shoplist_111.html">游戏本</a>
																													<a href="shoplist_112.html">平板电脑</a>
																													<a href="shoplist_113.html">平板电脑配件</a>
																													<a href="shoplist_114.html">台式机</a>
																													<a href="shoplist_115.html">一体机</a>
																													<a href="shoplist_116.html">服务器</a>
																													<a href="shoplist_117.html">笔记本配件</a>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_8.html">家纺</a><span>、</span>
																			<a href="shoplist_8.html">灯具</a><span>、</span>
																			<a href="shoplist_8.html">家具</a><span>、</span>
																			<a href="shoplist_8.html">厨具</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>家纺<i>></i></dt>
													<dd>
																													<a href="shoplist_118.html">床品套件</a>
																													<a href="shoplist_119.html">被子</a>
																													<a href="shoplist_120.html">枕心</a>
																													<a href="shoplist_121.html">蚊帐</a>
																													<a href="shoplist_122.html">凉席</a>
																													<a href="shoplist_123.html">毛巾浴巾</a>
																													<a href="shoplist_124.html">床单被罩</a>
																													<a href="shoplist_125.html">床垫</a>
																													<a href="shoplist_126.html">毯子</a>
																													<a href="shoplist_127.html">抱枕</a>
																													<a href="shoplist_128.html">靠枕</a>
																													<a href="shoplist_129.html">窗帘</a>
																													<a href="shoplist_130.html">电热毯</a>
																													<a href="shoplist_131.html">布艺软饰</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>灯具<i>></i></dt>
													<dd>
																													<a href="shoplist_132.html">台灯</a>
																													<a href="shoplist_133.html">吸顶灯</a>
																													<a href="shoplist_134.html">筒灯射灯</a>
																													<a href="shoplist_135.html">LED灯</a>
																													<a href="shoplist_136.html">节能灯</a>
																													<a href="shoplist_137.html">落地灯</a>
																													<a href="shoplist_138.html">五金电器</a>
																													<a href="shoplist_139.html">应急灯/手电</a>
																													<a href="shoplist_140.html">装饰灯</a>
																													<a href="shoplist_141.html">吊灯</a>
																													<a href="shoplist_142.html">氛围照明</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>家具<i>></i></dt>
													<dd>
																													<a href="shoplist_143.html">卧室家具</a>
																													<a href="shoplist_144.html">客厅家具</a>
																													<a href="shoplist_145.html">餐厅家具</a>
																													<a href="shoplist_146.html">书房家具</a>
																													<a href="shoplist_147.html">儿童家具</a>
																													<a href="shoplist_148.html">储物家具</a>
																													<a href="shoplist_149.html">阳台/户外</a>
																													<a href="shoplist_150.html">商业办公</a>
																													<a href="shoplist_151.html">床</a>
																													<a href="shoplist_152.html">床垫</a>
																													<a href="shoplist_153.html">沙发</a>
																													<a href="shoplist_154.html">电脑椅</a>
																													<a href="shoplist_155.html">衣柜</a>
																													<a href="shoplist_156.html">茶几</a>
																													<a href="shoplist_157.html">电视柜</a>
																													<a href="shoplist_158.html">餐桌</a>
																													<a href="shoplist_159.html">电脑桌</a>
																													<a href="shoplist_160.html">鞋架</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>厨具<i>></i></dt>
													<dd>
																													<a href="shoplist_161.html">烹饪锅具</a>
																													<a href="shoplist_162.html">刀剪菜板</a>
																													<a href="shoplist_163.html">厨房配件</a>
																													<a href="shoplist_164.html">水具酒具</a>
																													<a href="shoplist_165.html">餐具</a>
																													<a href="shoplist_166.html">茶具</a>
																													<a href="shoplist_167.html">咖啡具</a>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_9.html">男装</a><span>、</span>
																			<a href="shoplist_9.html">女装</a><span>、</span>
																			<a href="shoplist_9.html">童装</a><span>、</span>
																			<a href="shoplist_9.html">内衣</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>男装<i>></i></dt>
													<dd>
																													<a href="shoplist_62.html">衬衫</a>
																													<a href="shoplist_63.html">卫衣</a>
																													<a href="shoplist_64.html">T恤</a>
																													<a href="shoplist_67.html">仿皮皮衣</a>
																													<a href="shoplist_70.html">短袖</a>
																													<a href="shoplist_71.html">裤子</a>
																													<a href="shoplist_72.html">夹克</a>
																													<a href="shoplist_168.html">牛仔裤</a>
																													<a href="shoplist_169.html">休闲裤</a>
																													<a href="shoplist_170.html">针织衫</a>
																													<a href="shoplist_171.html">西服</a>
																													<a href="shoplist_172.html">西裤</a>
																													<a href="shoplist_173.html">POLO衫</a>
																													<a href="shoplist_174.html">羽绒服</a>
																													<a href="shoplist_175.html">西服套装</a>
																													<a href="shoplist_176.html">真皮皮衣</a>
																													<a href="shoplist_178.html">风衣</a>
																													<a href="shoplist_179.html">卫裤/运动裤</a>
																													<a href="shoplist_180.html">短裤</a>
																													<a href="shoplist_181.html">仿真皮衣</a>
																													<a href="shoplist_182.html">棉服</a>
																													<a href="shoplist_183.html">马甲/背心</a>
																													<a href="shoplist_184.html">毛呢大衣</a>
																													<a href="shoplist_185.html">羊毛衫</a>
																													<a href="shoplist_186.html">大码男装</a>
																													<a href="shoplist_187.html">中老年男装</a>
																													<a href="shoplist_188.html">工作装</a>
																													<a href="shoplist_189.html">设计师/潮牌</a>
																													<a href="shoplist_190.html">唐装/中山装</a>
																													<a href="shoplist_191.html">加绒裤</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>女装<i>></i></dt>
													<dd>
																													<a href="shoplist_66.html">时尚女装</a>
																													<a href="shoplist_192.html">连衣裙</a>
																													<a href="shoplist_193.html">T恤</a>
																													<a href="shoplist_194.html">雪纺衫</a>
																													<a href="shoplist_195.html">衬衫</a>
																													<a href="shoplist_196.html">休闲裤</a>
																													<a href="shoplist_197.html">牛仔裤</a>
																													<a href="shoplist_198.html">针织衫</a>
																													<a href="shoplist_199.html">短外套</a>
																													<a href="shoplist_200.html">卫衣</a>
																													<a href="shoplist_201.html">小西装</a>
																													<a href="shoplist_202.html">风衣</a>
																													<a href="shoplist_203.html">毛呢大衣</a>
																													<a href="shoplist_204.html">半身裙</a>
																													<a href="shoplist_205.html">短裤</a>
																													<a href="shoplist_206.html">吊带/背心</a>
																													<a href="shoplist_207.html">打底衫</a>
																													<a href="shoplist_208.html">打底裤</a>
																													<a href="shoplist_209.html">正装裤</a>
																													<a href="shoplist_210.html">马甲</a>
																													<a href="shoplist_211.html">大码女装</a>
																													<a href="shoplist_212.html">中老年女装</a>
																													<a href="shoplist_213.html">真皮大衣</a>
																													<a href="shoplist_214.html">皮革</a>
																													<a href="shoplist_215.html">羊毛衫</a>
																													<a href="shoplist_216.html">羊绒衫</a>
																													<a href="shoplist_217.html">棉服</a>
																													<a href="shoplist_218.html">羽绒服</a>
																													<a href="shoplist_219.html">仿皮皮衣</a>
																													<a href="shoplist_220.html">加绒裤</a>
																													<a href="shoplist_221.html">婚纱</a>
																													<a href="shoplist_222.html">旗袍/唐装</a>
																													<a href="shoplist_223.html">礼服</a>
																													<a href="shoplist_224.html">设计师/潮流</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>童装<i>></i></dt>
													<dd>
																													<a href="shoplist_225.html">套装</a>
																													<a href="shoplist_226.html">上衣</a>
																													<a href="shoplist_227.html">运动鞋</a>
																													<a href="shoplist_228.html">裤子</a>
																													<a href="shoplist_230.html">皮鞋</a>
																													<a href="shoplist_231.html">帆布鞋</a>
																													<a href="shoplist_232.html">亲子装</a>
																													<a href="shoplist_233.html">羽绒服/棉服</a>
																													<a href="shoplist_234.html">运动服</a>
																													<a href="shoplist_235.html">鞋子</a>
																													<a href="shoplist_236.html">演出服</a>
																													<a href="shoplist_237.html">裙子</a>
																													<a href="shoplist_238.html">功能写</a>
																													<a href="shoplist_239.html">凉鞋</a>
																													<a href="shoplist_240.html">配饰</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>内衣<i>></i></dt>
													<dd>
																													<a href="shoplist_245.html">男士内裤</a>
																													<a href="shoplist_241.html">文胸</a>
																													<a href="shoplist_247.html">塑身美体</a>
																													<a href="shoplist_246.html">女士内裤</a>
																													<a href="shoplist_244.html">睡衣/家居服</a>
																													<a href="shoplist_248.html">文胸套装</a>
																													<a href="shoplist_249.html">情侣睡衣</a>
																													<a href="shoplist_250.html">吊带/背心</a>
																													<a href="shoplist_251.html">少年文胸</a>
																													<a href="shoplist_252.html">休闲棉袜</a>
																													<a href="shoplist_253.html">商务男袜</a>
																													<a href="shoplist_254.html">连裤袜/丝袜</a>
																													<a href="shoplist_255.html">美腿袜</a>
																													<a href="shoplist_256.html">打底裤袜</a>
																													<a href="shoplist_257.html">抹胸</a>
																													<a href="shoplist_258.html">内衣配件</a>
																													<a href="shoplist_259.html">大码内衣</a>
																													<a href="shoplist_260.html">打底衫</a>
																													<a href="shoplist_261.html">泳衣</a>
																													<a href="shoplist_262.html">秋衣秋裤</a>
																													<a href="shoplist_263.html">保暖内衣</a>
																													<a href="shoplist_264.html">情趣内衣</a>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_10.html">香水彩妆</a><span>、</span>
																			<a href="shoplist_10.html">清洁用品</a><span>、</span>
																			<a href="shoplist_10.html">宠物</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>香水彩妆<i>></i></dt>
													<dd>
																													<a href="shoplist_265.html">女士香水</a>
																													<a href="shoplist_266.html">男士香水</a>
																													<a href="shoplist_267.html">底妆</a>
																													<a href="shoplist_268.html">眉笔</a>
																													<a href="shoplist_269.html">睫毛膏</a>
																													<a href="shoplist_270.html">眼线</a>
																													<a href="shoplist_271.html">眼影</a>
																													<a href="shoplist_272.html">唇膏</a>
																													<a href="shoplist_273.html">美甲</a>
																													<a href="shoplist_274.html">美妆工具</a>
																													<a href="shoplist_275.html">套装</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>清洁用品<i>></i></dt>
													<dd>
																													<a href="shoplist_276.html">纸品湿巾</a>
																													<a href="shoplist_277.html">衣物清洁</a>
																													<a href="shoplist_278.html">清洁工具</a>
																													<a href="shoplist_279.html">家庭清洁</a>
																													<a href="shoplist_280.html">一次性用品</a>
																													<a href="shoplist_281.html">除虫用品</a>
																													<a href="shoplist_282.html">皮具护理</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>宠物<i>></i></dt>
													<dd>
																													<a href="shoplist_283.html">水族用品</a>
																													<a href="shoplist_284.html">宠物主粮</a>
																													<a href="shoplist_285.html">宠物零食</a>
																													<a href="shoplist_286.html">猫砂/尿布</a>
																													<a href="shoplist_287.html">洗护美容</a>
																													<a href="shoplist_288.html">家居日用</a>
																													<a href="shoplist_289.html">医疗保健</a>
																													<a href="shoplist_290.html">出行装备</a>
																													<a href="shoplist_291.html">宠物玩具</a>
																													<a href="shoplist_292.html">宠物牵引</a>
																													<a href="shoplist_293.html">宠物驱虫</a>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_11.html">鞋靴</a><span>、</span>
																			<a href="shoplist_11.html">箱包</a><span>、</span>
																			<a href="shoplist_11.html">珠宝</a><span>、</span>
																			<a href="shoplist_11.html">奢侈品</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>鞋靴<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>箱包<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>珠宝<i>></i></dt>
													<dd>
																													<a href="shoplist_73.html">时尚饰品</a>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>奢侈品<i>></i></dt>
													<dd>
																													<a href="shoplist_65.html">太阳镜眼镜框</a>
																													<a href="shoplist_68.html">钱包</a>
																													<a href="shoplist_69.html">服饰</a>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_12.html">运动户外</a><span>、</span>
																			<a href="shoplist_12.html">钟表</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>运动户外<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>钟表<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_13.html">汽车</a><span>、</span>
																			<a href="shoplist_13.html">汽车用品</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>汽车<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>汽车用品<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_14.html">母婴</a><span>、</span>
																			<a href="shoplist_14.html">玩具</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>母婴<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>玩具<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_15.html">食品</a><span>、</span>
																			<a href="shoplist_15.html">酒类</a><span>、</span>
																			<a href="shoplist_15.html">生鲜</a><span>、</span>
																			<a href="shoplist_15.html">特产</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>食品<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>酒类<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>生鲜<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>特产<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_16.html">中药西品</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>中药西品<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_17.html">图书</a><span>、</span>
																			<a href="shoplist_17.html">音像</a><span>、</span>
																			<a href="shoplist_17.html">电子书</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>图书<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>音像<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>电子书<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_18.html">彩票</a><span>、</span>
																			<a href="shoplist_18.html">旅行</a><span>、</span>
																			<a href="shoplist_18.html">充值</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>彩票<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>旅行<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>充值<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														<li  class="nav_list">
								<div class="xz">
																			<a href="shoplist_19.html">理财</a><span>、</span>
																			<a href="shoplist_19.html">众筹</a><span>、</span>
																			<a href="shoplist_19.html">白条</a><span>、</span>
																			<a href="shoplist_19.html">保险</a><span>、</span>
																		<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
																						<dl class="first">
													<dt>理财<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>众筹<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>白条<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																						<dl class="first">
													<dt>保险<i>></i></dt>
													<dd>
																											</dd>
												</dl>
											
																			</div>
								</div>
							</li>

							
														
						</ul>
					</div>
				</div>
				<ul class="lead">
										<li>
						<a href="shoplist_9.html">服装城</a>
					</li>
										<li>
						<a href="shoplist_6.html">数码产品</a>
					</li>
										<li>
						<a href="shoplist_7.html">电脑、办公</a>
					</li>
										<li>
						<a href="shoplist_8.html">家装建材</a>
					</li>
										<li>
						<a href="shoplist_1.html">家用电器</a>
					</li>
										<li>
						<a href="shoplist_10.html">礼品箱包</a>
					</li>
									</ul>
			</div>
		</div>
		<!--导航 结束-->
		
		<script type="text/javascript">
			// 发送JIMI位置
			var jimi_search = "http://localhost/shop/index.php?m=Home&c=Index&a=Jimi";
//			删除用户 不想要的商品
			var shop = "http://localhost/shop/index.php?m=Home&c=Shopcart&a=indexdel";
		</script>
		<script type="text/javascript">
			$(function(){
//				删除指定不要的商品
				var Adel = $('#right .right .man_1 .shop .shop_l .gift .p_del');
				Adel.click(function(){
					var session = $(this).attr('hd');
					var id = $("#right .right .man_1 .shop .shop_l .gift .p_del").index(this);
					// $("#right .right .man_1 .shop .shop_l .gift").eq(id).remove(id);
					// alert(id);
					// return false;
					$.ajax({
						type:"post",
						url:shop,
						data:{session:session},
						dataType:'text',
						async:true,
						success:function(phpData){
							$('#right .right .man_1 .jdm_tbar .jtc_sum strong span').html(phpData);
							$("#right .right .man_1 .shop .shop_l .gift").eq(id).remove();
							alert('删除成功！');
						}
					});
					
				})
			})
		</script>
		<!--右侧导航栏-->
		<div id="right">
			<div class="left">
				<!--线条-->
				<div class="bg"></div>
				<!--底部-->
				<div class="bottom" style="height:36px;">
					<div class="upper">
						<i></i>
						<em>顶部</em>
					</div>
				</div>
				<!--中间-->
				<div class="among">
					<div class="middle" hd="2">
						<i></i>
						<em>京东会员</em>
					</div>
					<div class="middle feed_1" hd="2">
						<i></i>
						<em>购物车</em>
					</div>
					<div class="middle feed_4" hd="2">
						<i></i>
						<em>咨询JIMI</em>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="man_1">
					<h3>
						<span>
							<b></b>
							<em>京东会员</em>
						</span>
					</h3>
					<div class="my">
						<div class="rt">
							<img src="./Public/index/images/331.jpg
               "/>
						</div>
						<div class="xinxi">
							<div class="name">
							                
								<a href="my.html">admin9999														</div>
							<div class="tb" style="margin-top:5px;">
								<a href="my.html" class="tb_my"><i></i></a>
								<!-- <a href="javascript:;" class="hy"><i></i></a> -->
							</div>
						</div>
						<div class="get_dou">
							<span class="jd">欢迎来到京东！</span>
						</div>
						<div class="account">
							<a href="javascript:;" class="one">
								<div class="info">                0.00</div>
								<div class="info_name">京豆</div>
							</a>
							<a href="order.html">
								<div class="info">                0</div>
								<div class="info_name">我的订单</div>
							</a>
							<a href="cart.html" class="last">
								<div class="info">0
               </div>
								<div class="info_name">购物车</div>
							</a>
						</div>
					</div>
				</div>
				<div class="man_1 man_2">
					<h3>
						<span>
							<b></b>
							<em>购物车</em>
						</span>
					</h3>
					<div class="shop">
						<div class="shop_l">
															<div class="jdm">
									<div class="tip_inner">
										<i class="i_f"></i>
										<div class="tip_text">
											购物车空空如也~~
											<br />
											<a href="index.html">去首页看看</a>
										</div>
									</div>
								</div>
							
               						</div>
					</div>
					<div class="jdm_tbar">
						<div class="gw">
							<div class="jtc_sum">
								共计：<strong>￥<span>0
               </span>.00</strong>
							</div>
							<a href="cart.html" class="jtc_btn">去结算</a>
						</div>
					</div>
				</div>
				<div class="man_1 man_5">
					<h3>
						<span>
							<b></b>
							<em> 咨询JIMI</em>
						</span>
					</h3>
					<div class="char" id="gundong">
						<ul class="chars">
							

							
						</ul>
					</div>
					<div class="zx">
						<textarea name="" rows="" cols="" class="wz"></textarea>
						<input type="button" id="" value="发送" class="fs" />
					</div>
				</div>
			</div>
		</div>
		<!--商品区域-->
		<div id="shop">
			<!--商品位置-->
			<div class="title">
				<?php foreach ($topCateData as $k=>$v){?>
					<?php if($k==0){?>
                
					<strong>
						<?php echo $v['cname']?> 
					</strong>
					<span>> </span>
					<?php }else{?>
					<span>
						<a href="shoplist_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a> > 
					</span>
					
               <?php }?>
				<?php }?>
				<span>
					<?php echo $shopData['brand']['bname']?>
					 > 
				</span>
			</div>
			<!--商品主图-->
			<dic class="pic">
				<!--左边-->
				<div class="left">
					<div class="box">
						<div class="pic_img">
							<img src="<?php echo $shopData['small'][0][0]?>"/>
							<b></b>
							<div class="cover"></div>
						</div>
						<div class="min_pic">
							<?php foreach ($shopData['small'] as $v){?>
							<img _bigsrc="<?php echo $v[1]?>" src="<?php echo $v[0]?>"/>
							<?php }?>
						</div>
						<div class="large">
							<img src="<?php echo $shopData['small'][0][1]?>" class="max" />
						</div>
					</div>
					<div class="shop_bh">
						<div class="bh">
							<span>商品编号：</span>
							<span><?php echo $shopData['gnumber']?></span>
						</div>
						<!--<div class="fx">
							<a href="" class="shop_fx"><b></b>分享</a>
							<a href="" class="shop_gz"><b></b>关注商品</a>
						</div>-->
					</div>
				</div>
				<!--中间-->
				<div class="middle">
					<h1><?php echo $shopData['gname']?></h1>
					<div class="p_ad">正品保障！！！！！</div>
					<div class="summary">
						<div class="box">
							<div class="dt">京 东 价：</div>
							<div class="dd">
								<strong class="jdz">￥<span><?php echo $shopData['shopprice']?></span>.00</strong>
								<span class="pricing"> [吊牌价：<div class="page_dpprice">￥<?php echo $shopData['marketprice']?>.00</div>]</span>
								<!--<a href="">降价通知</a>-->
							</div>
						</div>
						<!--<div class="comment_count">
							<div class="p">累计评价</div>
							<div class="s">3178</div>
						</div>-->
					</div>
					<div class="city">
						
						<div class="fw">
							<div class="dt">
								服    务：
							</div>
							<div class="dd">
								由京东发货，并提供售后服务。
							</div>
						</div>
					</div>
					<div class="choose">
						<ul class="abroad">
							<li class="yf">
								<div class="dt">
									运费：
								</div>
								<div class="dd">
									卖家承担运费
								</div>
							</li>
							<?php foreach ($typeatrData as $v){?>
								<li class="spce" hd="0">
									<div class="dt">
										<?php echo $v['taname']?>：
									</div>
									
									<div class="dd">
										<div class="tc">
											<?php foreach ($v['opt'] as $value){?>
												<div gtid="<?php echo $value['gtid']?>" class="tc_box">
													<?php echo $value['gtvalue']?>
													<i></i>
												</div>
											<?php }?>
										</div>
									</div>
								</li>
							<?php }?>
							<li>
								<div class="dt">
									数量：
								</div>
								<div class="dd">
									<div class="number">
										<input type="text" name="" id="shuliang" value="1" maxlength="3" />
										<div class="add">
											<a href="javascript:;" class="jia">+</a>
											<a href="javascript:;" class="jian">-</a>
										</div>
									</div>
								</div>
								<span style="color:red;font-weight:700;font-size:14px;margin-left:5px;line-height:40px;" class="hy"></span>
							</li>
							<li class="gw">
								<div class="dt">
									
								</div>
								<div class="dd">
									<input type="hidden" name="" id="did" value="<?php echo Q('get.gid')?>" />
									<a <?php if(isset($_SESSION['user'])){?>
                href="javascript:;" hd="0"<?php }else{?> href="login.html"
               <?php }?> class="btn_append"></a>
									<a <?php if(isset($_SESSION['user'])){?>
                href="javascript:;" hd="0"<?php }else{?> href="login.html"
               <?php }?> class="btn_easybuy"></a>
								</div>
							</li>
							<li class="yf">
								<div class="dt">
									温馨提示：
								</div>
								<div class="dd">
									1.支持7天无理由退货
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!--右边-->
				<div class="right">
					<div class="logo">
						<img src="<?php echo $shopData['brand']['logo']?>"/>
					</div>
					<div class="zyy">
						<span>京东自营</span>
					</div>
					<dl class="zc">
						<dt>服务支持：</dt>
						<dd>
							<a href="javascript:;" class="cr"><img src="./Public/index/images/shop/2.png"/>次日达</a>
							<a href="javascript:;"><img src="./Public/index/images/shop/3.png"/>自提</a>
						</dd>
					</dl>
				</div>
			</dic>
		</div>
		<!--详情页-->
		<div id="w">
			<!--详情页左边-->
			<div class="left">
				<div class="dl">
					<div class="title">相关分类</div>
					<div class="pop_summary">
						<?php foreach ($typeData as $v){?>
							<a href="shoplist_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a>
						<?php }?>
					</div>
				</div>
				<!--达人选购-->
				<div class="dr">
					<div class="title">达人选购</div>
					<div class="box">
						<ul>
							<?php foreach ($sonData as $v){?>
								<li>
									<div class="p-img">
										<a href="shop_<?php echo $v['gid']?>.html"><img src="<?php echo $v['pic']?>"/></a>
									</div>
									<div class="p-name">
										<a href="shop_<?php echo $v['gid']?>.html"><?php echo $v['gname']?></a>
									</div>
									<div class="p-price">
										<strong>￥<?php echo $v['shopprice']?>.00</strong>
									</div>
								</li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
			<!--详情页右边-->
			<div class="right">
				<div class="box_right">
					<div class="right_top">
						<ul class="m1">
							<li class="cuur">商品介绍</li>
							<li>规格参数</li>
							<li>商品评价<span>(<?php echo $shopData['count']?>)</span></li>
							<li>售后保障</li>
						</ul>
					</div>
				</div>
				
				<div class="right_middle">
					<div class="mc" style="display: block;">
						<div class="xqy">
							<?php echo $shopData['intro']?>
							
						</div>
					</div>
					<div class="mc">
						<div class="p_parameter">
							<ul class="barand">
								<li>品牌：
									<span class="pinpai"><?php echo $shopData['brand']['bname']?></span>
									<!-- <a href="" class="gz"><b>♥</b>关注</a> -->
								</li>
							</ul>
							<ul class="parameter2">
								<li>商品名称：<?php echo $shopData['gname']?></li>
								<li>商品编号：<?php echo $shopData['gnumber']?></li>
								<?php if(isset($shopData['attr'])){?>
                
									<?php foreach ($shopData['attr'] as $v){?>
										<?php if(!empty($v['gtvalue'])){?>
                
											<li><?php echo $v['taname']?>：<?php echo $v['gtvalue']?></li>
										
               <?php }?>
									<?php }?>
								
               <?php }?>
							</ul>
						</div>
					</div>
					<div class="mc">
						<div class="p_parameters">
							<ul>
								<?php foreach ($shopData['remark'] as $v){?>
									<li>
										<div class="pl_left">
											<div class="grade_star" <?php if($v['star']==1){?>
                style="width:18px;"<?php }else if($v['star']==2){?>style="width:35px;"<?php }else if($v['star']==3){?>style="width:50px;"<?php }else if($v['star']==4){?>style="width:69px;"<?php }else{?>style="width:85px;"
               <?php }?>></div>
											<div class="comment_time"><?php echo date('Y-m-d',$v['time'])?> <?php echo date('H:i:s',$v['time'])?></div>
											<div><?php echo $v['uname']?></div>
										</div>
										<div class="column">
											<?php echo $v['content']?>
										</div>
									</li>
								<?php }?>
							</ul>
						</div>
					</div>
					<div class="mc">
						<img src="./Public/index/images/shop/shouhou.png"/>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
		
		<!--底部区域-->
		

		<!--底部区域-->
		<div id="footer">
			<div class="slogen">
				<div class="img">
					<img src="./Public/index/images/16.png"/>
					<img src="./Public/index/images/17.png"/>
					<img src="./Public/index/images/18.png"/>
					<img src="./Public/index/images/19.png" class="last"/>
				</div>
			</div>
			
			<div class="jd">
				<span class="fist">京ICP备12048441号-3</span>
				|
				<span>Copyright © 2010-2015 houdunwang.com All Rights Reserved</span>
			</div>
			<div class="jd jd_1">
				                
																	<a href="http://www.baidu.com" target="_blank">百度</a>
											                
						|
						
               						<a href="http://www.sina.com.cn/" target="_blank">新浪</a>
									
               			</div>
			<div class="jd jd_2">
				<span>联系邮箱：462441355@qq.com</span>
				<span>联系电话：15728048627</span>
			</div>
			<div class="img">
				<img src="./Public/index/images/194.png"/>
				<img src="./Public/index/images/195.png"/>
				<img src="./Public/index/images/211.jpg"/>
				<img src="./Public/index/images/212.jpg"/>
				<img src="./Public/index/images/214.jpg"/>
			</div>
		</div>
	</body>
</html>
