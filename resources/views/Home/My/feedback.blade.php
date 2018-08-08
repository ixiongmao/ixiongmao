@extends('Home.User.Ucommon')

@section('Home_title','我的反馈')
@section('User_content')
                    <div class="my_nala_centre ilizi_centre">
                        <div class="ilizi cle">
                            <div class="box">
                                <div class="box_1">
                                  <div class="userCenterBox boxCenterList clearfix" style="_height:1%; font-size:14px;">
                                      <h1>添加反馈</h1>
                                      <form action="/user/my_feedback/create" method="post">
                                        {{ csrf_field() }}
                                        <input name="m_id" type="hidden" value="{{ $get_session['id'] }}">
                                        <input name="m_email" type="hidden" value="{{ $get_session['u_email'] }}">
                                        <table width="100%" border="0" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td align="right">反馈的标题：</td>
                                                    <td><input name="fk_name" type="text" size="80" class="inputxt inval" style="height:30px;"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top">反馈的信息：</td>
                                                    <td>
                                                        <textarea name="fk_detail" id="d_content" style="width:100px;height:50px;"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <input type="hidden" name="act" value="act_add_message">
                                                        <input type="submit" value="提 交" class="btn btn-primary"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                      </form>
                                  </div>

                                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%;">
                                        <h1>@yield('Home_title')</h1>
                                        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                            <tbody>
                                                <tr align="center">
                                                    <td bgcolor="#ffffff">反馈的标题</td>
                                                    <td bgcolor="#ffffff">反馈的信息</td>
                                                    <td bgcolor="#ffffff">反馈的时间</td>
                                                  </tr>
                                            </tbody>
                                            @foreach ($Feedback_data as $k=>$v)
                                            <tr align="center">
                                                <td bgcolor="#ffffff">{{ $v['feedbacks_name'] }}</td>
                                                <td bgcolor="#ffffff"><input type="submit" class="btn btn-primary" value="点击查看反馈内容" id="content-{{ $v['id'] }}"></td>
                                                <td bgcolor="#ffffff">{{ date('Y-m-d H:i:s',$v->feedbacks_time) }}</td>
                                              </tr>
                                              <script type="text/javascript">
                                              $('#content-{{ $v['id'] }}').click(function() {
                                                layer.open({
                                                  title: '内容显示'
                                                  ,area: ['700px','400px']
                                                  ,resize: false
                                                  ,content: '<style>.ixongmao_content img{ width:100%;}</style><div class="ixongmao_content">{!! $v['feedbacks_content'] !!}</div>'
                                                });
                                              });
                                              </script>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
