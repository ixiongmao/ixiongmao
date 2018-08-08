@extends('Admin.common')

@section('AD2_title', '用户商品浏览记录')

@section('Left_Nav')
    @parent
@endsection

@section('content')
<table class="table table-hover table-border">
	<tr>
		<th>用户名</th>
		<th>浏览信息</th>
		<th>浏览时间</th>
	</tr>
	@foreach($data as $k=>$v)
	@foreach($users as $kk=>$vv)
	@foreach($goods as $kkk=>$vvv )
		@if( $v['uid']  == $vv['id'])
		@if( $v['gid']  == $vvv['id'])
	<tr>
		<th>{{ $vv['u_name'] }}</th>
		<th>{{ $vvv['goods_name'] }}</th>
		<th>{{date('Y-m-d H:i:s', $v['time'] )}}</th>
	</tr>
		@endif
		@endif
	@endforeach
	@endforeach
	@endforeach
</table>

@endsection