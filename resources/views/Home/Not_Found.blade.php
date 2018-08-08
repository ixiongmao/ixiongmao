@extends('Home.common')

@section('Home_title',session('Notice'))

@section('Left_Nav')
    @parent
@endsection

@section('content')
<div id="wrapper" class="container">
    <div class="here cle" style="padding:10px 20px;">
        <a href="/">首页</a>
        <code>&gt;</code>系统提示</div>
    <div class="box" style="padding:20px;">
        <h3 style="text-align: center;">
            <span>系统信息</span></h3>
        <div class="boxCenterList RelaArticle msg-wrap" align="center" style="padding-top:30px;">
            <p class="msg-content">
              @if (session('Notice'))
                {{ session('Notice') }}
              @else
                禁止访问此页面！
              @endif
            </p>
            <p class="msg-url">
                <a href="/">返回首页</a></p>
        </div>
    </div>
</div>

<script type="text/javascript">
  var bar = 0;
    var line = "||";
    var amount = "||";
    count();
    function count() {
        bar = bar + 2;
        if (bar < 99) {
            setTimeout("count()", 80);
        } else {
            window.location = "/";
        }
    }
</script>

@endsection
