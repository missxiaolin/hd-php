<?php
	$linkModel = new \Common\Model\Link;
	$linkData = $linkModel->get();


?>


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
				<span class="fist">{{C('webSet.COPY_NUM')}}</span>
				|
				<span>{{C('webSet.COPY_INFO')}}</span>
			</div>
			<div class="jd jd_1">
				{{if value="isset($linkData)"}}
					{{foreach from="$linkData" key="$k" value="$v"}}
						{{if value="$k neq 0"}}
						|
						{{endif}}
						<a href="{{$v['url']}}" target="_blank">{{$v['lname']}}</a>
					{{endforeach}}
				{{endif}}
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