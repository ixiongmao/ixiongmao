@extends('Home.common')

@section('Home_title', '以旧换新')

@section('Left_Nav')
    @parent
@endsection

@section('content')
<style>

.con ul li{
	width: 325px;
	height:50px;
	background: #333;
	float: left;
	text-align: center;
	line-height: 50px;
	color: #fff;
	font-size: 18px;
}
.aa{
	width: 1300px;
	height: 500px;
	margin:auto;
	display: none;
}
.aa span{
	margin-left: 480px;
	font-size: 20px;
	color: #b9000f;

}
.bb{
	width: 325px;
	height: 200px;
	background: #fff;
	float: left;
}
.bb img{
	margin-left: 25%;
}
h1{
	margin-left: 37.5%;
	font-size: 10px;
	color: #b9000f;
}
/*img{
	 margin-left: 25%;
}*/
</style>
<div style="margin:auto;width: 1300px;height: 100%;">
	<img src="/Home/huishou/1.png" style="width: 100%"/>

<div class="con">
	<ul>
		<li>雷神</li>
		<li>联想</li>
		<li>外星人</li>
		<li>戴尔</li>
	</ul>

</div>
</div>
<div class="aa" style="display: block;">
	<div class="bb"><img src="/Home/huishou/leishen/1.jpg"><h1>雷神911-S2b</h1></div>
	<div class="bb"><img src="/Home/huishou/leishen/2.jpg"><h1>雷神911M-M5T系列</h1></div>
	<div class="bb"><img src="/Home/huishou/leishen/3.jpg"><h1>雷神G150TH系列</h1></div>
	<div class="bb"><img src="/Home/huishou/leishen/4.jpg"><h1>雷神911GT-Y6系列</h1></div>
	<div class="bb"><img src="/Home/huishou/leishen/5.jpg"><h1>雷神911-S1g系列</h1></div>
	<div class="bb"><img src="/Home/huishou/leishen/6.jpg"><h1>雷神911GT-Y6系列</h1></div>
	<div class="bb"><img src="/Home/huishou/leishen/7.jpg"><h1>雷神ST-Plus系列</h1></div>
	<div class="bb"><img src="/Home/huishou/leishen/8.jpg"><h1>雷神G150TH-1系列</h1></div>
	<span>详情请联系客服 电话:{{ $systems['system_phone']}} 或者QQ：{{ $systems['system_qq'] }}</span>
</div>
<div class="aa">
	<div class="bb"><img src="/Home/huishou/Lenovo/1.jpg"><h1>联想Rescuer拯救者R720系列</h1></div>
	<div class="bb"><img src="/Home/huishou/Lenovo/2.jpg"><h1>联想Y470</h1></div>
	<div class="bb"><img src="/Home/huishou/Lenovo/3.jpg"><h1>联想G470</h1></div>
	<div class="bb"><img src="/Home/huishou/Lenovo/4.jpg"><h1>联想IdeaPad 7005</h1></div>
	<div class="bb"><img src="/Home/huishou/Lenovo/5.jpg"><h1>联想小新Air 13 Pro系列</h1></div>
	<div class="bb"><img src="/Home/huishou/Lenovo/6.jpg"><h1>联想YOGA3 Pro</h1></div>
	<div class="bb"><img src="/Home/huishou/Lenovo/7.jpg"><h1>联想Rescuer拯救者14寸系列</h1></div>
	<div class="bb"><img src="/Home/huishou/Lenovo/8.jpg"><h1>联想G50-70</h1></div>

	<span>详情请联系客服 电话:{{ $systems['system_phone']}} 或者QQ：{{ $systems['system_qq'] }}</span>
</div>
<div class="aa">

	<div class="bb"><img src="/Home/huishou/wxr/1.jpg"><h1>Alienware 13</h1></div>
	<div class="bb"><img src="/Home/huishou/wxr/2.jpg"><h1>Alienware 15</h1></div>
	<div class="bb"><img src="/Home/huishou/wxr/3.jpg"><h1>Alienware 17</h1></div>
	<div class="bb"><img src="/Home/huishou/wxr/4.jpg"><h1>Alienware 18</h1></div>
	<div class="bb"><img src="/Home/huishou/wxr/5.jpg"><h1>Alienware 14</h1></div>
	<div class="bb"><img src="/Home/huishou/wxr/6.jpg"><h1>Alienware M14x</h1></div>
	<div class="bb"><img src="/Home/huishou/wxr/7.jpg"><h1>Alienware M11x</h1></div>
	<div class="bb"><img src="/Home/huishou/wxr/8.jpg"><h1>Alienware M15x</h1></div>
	<span>详情请联系客服 电话:{{ $systems['system_phone']}} 或者QQ：{{ $systems['system_qq'] }}</span>
</div>
<div class="aa">
	<div class="bb"><img src="/Home/huishou/dell/1.jpg"><h1>戴尔 Precision 5520</h1></div>
	<div class="bb"><img src="/Home/huishou/dell/2.jpg"><h1>戴尔 Precision 5510</h1></div>
	<div class="bb"><img src="/Home/huishou/dell/3.jpg"><h1>戴尔 XPS 11</h1></div>
	<div class="bb"><img src="/Home/huishou/dell/4.jpg"><h1>戴尔 XPS 13 9365</h1></div>
	<div class="bb"><img src="/Home/huishou/dell/5.jpg"><h1>戴尔 XPS 13 9343</h1></div>
	<div class="bb"><img src="/Home/huishou/dell/6.jpg"><h1>戴尔 XPS 15 9530</h1></div>
	<div class="bb"><img src="/Home/huishou/dell/7.jpg"><h1>戴尔 XPS 12 9250</h1></div>
	<div class="bb"><img src="/Home/huishou/dell/8.jpg"><h1>戴尔 latitude E5250</h1></div>
	<span>详情请联系客服 电话:{{ $systems['system_phone']}} 或者QQ：{{ $systems['system_qq'] }}</span>
</div>


<script type="text/javascript">
	$('.con ul li').mouseover(function(){
		$(this).css('background','#b9000f')
		$('.aa').hide();
		var a = $(this).index();
		$('.aa').eq(a).show();
				console.log(a)
	}).mouseout(function(){
		$(this).css('background','')
	})
</script>
@endsection
