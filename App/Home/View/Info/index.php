<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>个人信息</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
//			性别
			var sex = "{{$oldData['sex']}}";
//			年月日
			var year = "{{$oldData['birthday'][0]}}";
			var month = "{{$oldData['birthday'][1]}}";
			var day = "{{$oldData['birthday'][2]}}";
//			婚姻
			var wedlock ="{{$oldData['wedlock']}}";
//			月收入
			var revenue ="{{$oldData['revenue']}}";
//			教育程度
			var education = "{{$oldData['education']}}";
		</script>
		<script src="./Public/index/js/info.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		{{include file="../Common/header"}}
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b class="man">个人中心</b>
		</div>
		<div id="basicdata">
			<div class="upper">
				{{include file="../Common/infoleft"}}
			</div>
			<div class="downer">
				<div class="man_top">
					<ul>
						<li><a href="my.html" {{if value="'ACTION' eq 'index'"}}class="cure"{{endif}}>基本信息</a></li>
						<li><a href="portrait.html" {{if value="'ACTION' eq 'portrait'"}}class="cure"{{endif}}>头像照片</a></li>
					</ul>
				</div>
				<div class="man_info">
					<div class="user_set">
						<div class="from">
							<form action="my.html" method="post" id="userfrom">
								<div class="item">
									<span class="label">
										用户名：
									</span>
									<div class="fl">
										<strong>
											{{$oldData['account']}}
										</strong>
									</div>
								</div>
								<div class="item">
									<span class="label">
										用户昵称：
									</span>
									<div class="fl">
										<input type="tel" name="username" class="username" id="" value="{{$oldData['username']}}" />
									</div>
								</div>
								<div class="item">
									<span class="label">
										性别：
									</span>
									<div class="fl">
										<input type="radio" class="sex" name="sex" value="男" checked="checked" /><label class="mr">男</label>
										<input type="radio" class="sex" name="sex" value="女" /><label class="mr">女</label>
										<input type="radio" class="sex" name="sex" value="保密" /><label class="mr">保密</label>
									</div>
								</div>
								<div class="item">
									<span class="label">
										生日：
									</span>
									<div class="fl">
										<select name="birthday[]" class="selt datas">
											<option value="0" disabled="disabled" selected="selected">请选择：</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
											<option value="2011">2011</option>
											<option value="2010">2010</option>
											<option value="00后">00后</option>
											<option value="2009">2009</option>
											<option value="2008">2008</option>
											<option value="2007">2007</option>
											<option value="2006">2006</option>
											<option value="2005">2005</option>
											<option value="2004">2004</option>
											<option value="2003">2003</option>
											<option value="2002">2002</option>
											<option value="2001">2001</option>
											<option value="2000">2000</option>
											<option value="90后">90后</option>
											<option value="1999">1999</option>
											<option value="1998">1998</option>
											<option value="1997">1997</option>
											<option value="1996">1996</option>
											<option value="1995">1995</option>
											<option value="1994">1994</option>
											<option value="1993">1993</option>
											<option value="1992">1992</option>
											<option value="1991">1991</option>
											<option value="1990">1990</option>
											<option value="80后">80后</option>
											<option value="1989">1989</option>
											<option value="1988">1988</option>
											<option value="1987">1987</option>
											<option value="1986">1986</option>
											<option value="1985">1985</option>
											<option value="1984">1984</option>
											<option value="1983">1983</option>
											<option value="1982">1982</option>
											<option value="1981">1981</option>
											<option value="1980">1980</option>
											<option value="70后">70后</option>
											<option value="1979">1979</option>
											<option value="1978">1978</option>
											<option value="1977">1977</option>
											<option value="1976">1976</option>
											<option value="1975">1975</option>
											<option value="1974">1974</option>
											<option value="1973">1973</option>
											<option value="1972">1972</option>
											<option value="1971">1971</option>
											<option value="1970">1970</option>
											<option value="60后">60后</option>
											<option value="1969">1969</option>
											<option value="1968">1968</option>
											<option value="1967">1967</option>
											<option value="1966">1966</option>
											<option value="1965">1965</option>
											<option value="1964">1964</option>
											<option value="1963">1963</option>
											<option value="1962">1962</option>
											<option value="1961">1961</option>
											<option value="1960">1960</option>
											<option value="50后">50后</option>
											<option value="1959">1959</option>
											<option value="1958">1958</option>
											<option value="1957">1957</option>
											<option value="1956">1956</option>
											<option value="1955">1955</option>
											<option value="1954">1954</option>
											<option value="1953">1953</option>
											<option value="1952">1952</option>
											<option value="1951">1951</option>
											<option value="1950">1950</option>
											<option value="40后">40后</option>
											<option value="1949">1949</option>
											<option value="1948">1948</option>
											<option value="1947">1947</option>
											<option value="1946">1946</option>
											<option value="1945">1945</option>
											<option value="1944">1944</option>
											<option value="1943">1943</option>
											<option value="1942">1942</option>
											<option value="1941">1941</option>
											<option value="1940">1940</option>
										</select>
                                        <label class="ml5 mr5">年</label>
                                        <select name="birthday[]" class="selt selt1 yue" id="birthdayMonth">
                                        	<option value="0" disabled="disabled" selected="selected">请选择：</option>
                                        	<option value="1">1</option>
                                        	<option value="2">2</option>
                                        	<option value="3">3</option>
                                        	<option value="4">4</option>
                                        	<option value="5">5</option>
                                        	<option value="6">6</option>
                                        	<option value="7">7</option>
                                        	<option value="8">8</option>
                                        	<option value="9">9</option>
                                        	<option value="10">10</option>
                                        	<option value="11">11</option>
                                        	<option value="12">12</option>
                                        </select>
                                        <label class="ml5 mr5">月</label>
                                        <select name="birthday[]" class="selt selt1 ri" id="birthdayDay">
                                        	<option value="0" disabled="disabled" selected="selected">请选择：</option>
                                        	<option value="1">1</option>
                                        	<option value="2">2</option>
                                        	<option value="3">3</option>
                                        	<option value="4">4</option>
                                        	<option value="5">5</option>
                                        	<option value="6">6</option>
                                        	<option value="7">7</option>
                                        	<option value="8">8</option>
                                        	<option value="9">9</option>
                                        	<option value="10">10</option>
                                        	<option value="11">11</option>
                                        	<option value="12">12</option>
                                        	<option value="13">13</option>
                                        	<option value="14">14</option>
                                        	<option value="15">15</option>
                                        	<option value="16">16</option>
                                        	<option value="17">17</option>
                                        	<option value="18">18</option>
                                        	<option value="19">19</option>
                                        	<option value="20">20</option>
                                        	<option value="21">21</option>
                                        	<option value="22">22</option>
                                        	<option value="23">23</option>
                                        	<option value="24">24</option>
                                        	<option value="25">25</option>
                                        	<option value="26">26</option>
                                        	<option value="27">27</option>
                                        	<option value="28">28</option>
                                        	<option value="29">29</option>
                                        	<option value="30">30</option>
                                        	<option value="31">31</option>
                                        </select>
                                        <label class="ml5 mr5">日</label>
                                        <span class="ftx03">填生日有惊喜哦~</span>
										</select>
									</div>
								</div>
								<div class="item">
									<span class="label">
										真实姓名：
									</span>
									<div class="fl">
										<input type="text" class="user" name="name" id="" value="{{$oldData['name']}}" />
									</div>
								</div>
								<div class="item">
									<span class="label">
										联系电话：
									</span>
									<div class="fl">
										<input type="text" class="user" name="cellphone" id="" value="{{$oldData['cellphone']}}" />
									</div>
								</div>
								<div class="item">
									<span class="label">
										固定电话：
									</span>
									<div class="fl">
										<input type="text" class="user" name="telphone" id="" value="{{$oldData['telphone']}}" />
									</div>
								</div>
								
								<div class="item">
									<span class="label">
										婚姻状况：
									</span>
									<div class="fl">
										<input type="radio" name="wedlock" class="wedlock" value="未婚" /><label class="mr">未婚</label>
										<input type="radio" name="wedlock" class="wedlock" value="已婚" /><label class="mr">已婚</label>
										<input type="radio" name="wedlock" class="wedlock" value="保密" checked="checked" /><label class="mr">保密</label>
									</div>
								</div>
								<div class="item">
									<span class="label">
										月收入：
									</span>
									<div class="fl">
										<select name="revenue" class="selt shouru">
											<option value="0">请选择</option>
											<option value="1">2000元以下</option>
											<option value="2">2000-3999元</option>
											<option value="3">4000-5999元</option>
											<option value="4">6000-7999</option>
											<option value="5">8000元以上</option>
										</select>
									</div>
								</div>
								<div class="item">
									<span class="label">
										身份证号码：
									</span>
									<div class="fl">
										<input type="text" class="user" name="idcard" id="" value="{{$oldData['idcard']}}" />
									</div>
								</div>
								<div class="item">
									<span class="label">
										教育程度：
									</span>
									<div class="fl">
										<select name="education" class="selt education">
											<option value="0">教育程度</option>
											<option value="1">初中</option>
											<option value="2">高中</option>
											<option value="3">中专</option>
											<option value="4">大专</option>
											<option value="5">本科</option>
											<option value="6">硕士</option>
											<option value="7">博士</option>
											<option value="8">其他</option>
										</select>
									</div>
								</div>
								<div class="item">
									<span class="label"></span>
									<div class="fl">
										<input type="submit" name="" class="tj" id="" value="提交" />
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="user_info">
						<div class="u_pic">
							{{if value="!empty($oldData['user_thum'])"}}
								<img src="{{$oldData['user_thum']}}"/>
							{{else}}
								<img src="./Public/index/images/331.jpg"/>
							{{endif}}
							<div class="make"></div>
						</div>
						<div class="info_m">
							<div class="top_info">
								<b>用户名：{{$oldData['account']}}</b>
							</div>
							<!--<div class="hy">
								<i></i>
								<span><a href="">注册企业会员</a></span>
							</div>-->
							<div>
								会员类型：个人用户
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

		{{include file="../Common/footer"}}
	</body>
</html>
