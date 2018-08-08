@extends('Home.User.Ucommon')
@section('Home_title','收货地址管理')

@section('User_content')
                    <div class="my_nala_centre ilizi_centre">
                        <div class="ilizi cle">
                            <div class="box">
                                <div class="box_1">
                                  <div class="userCenterBox boxCenterList clearfix" style="_height:1%; font-size:14px;">
                                      <h1>添加收货地址</h1>
                                      <form action="/user/my_address/store" method="post" name="isForm">
                                        {{ csrf_field() }}
                                        <input name="m_id" type="hidden" size="30" value="{{ $get_session['id'] }}" class="inputBg">
                                        <table width="100%" border="0" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td align="right">名字：</td>
                                                    <td><input name="add_name" type="text" size="30" class="inputBg"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">电话：</td>
                                                    <td><input name="add_phone" type="text" size="30" class="inputBg"><span id="add_phone"></span></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top">详细地址：</td>
                                                    <td>
                                                        <textarea name="add_detail" cols="50" rows="4" class="B_blue"></textarea>
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
                                        <h1>我的收货地址</h1>
                                        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                            <tbody>
                                                <tr align="center">
                                                    <td bgcolor="#ffffff">默认地址</td>
                                                    <td bgcolor="#ffffff">名字</td>
                                                    <td bgcolor="#ffffff">电话</td>
                                                    <td bgcolor="#ffffff">地址</td>
                                                    <td bgcolor="#ffffff">操作</td>
                                                  </tr>
                                            </tbody>
                                            @foreach ($data as $k=>$v)
                                            <tr align="center">
                                                <td bgcolor="#ffffff">
                                                  @if ($v['address_status'] == '1')
                                                    默认地址 | <a href="/user/my_address/Nodefault/{{ $v['id'] }}">取消默认</a>
                                                  @else
                                                    <a href="/user/my_address/default/{{ $v['id'] }}">设为默认地址</a>
                                                  @endif
                                                </td>
                                                <td bgcolor="#ffffff">{{ $v['address_name'] }}</td>
                                                <td bgcolor="#ffffff">{{ $v['address_phone'] }}</td>
                                                <td bgcolor="#ffffff">{{ $v['address_address'] }}</td>
                                                <td bgcolor="#ffffff"><a href="/user/my_address/edit/{{ $v['id'] }}">修改</a> | <a href="/user/my_address/del/{{ $v['id'] }}">删除</a></td>
                                              </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                    isPhone = false;
                      $('input[name=add_phone]').focus(function(){
                        $('#add_phone').html('<font style="color:red">请输入手机号</font>');
                      }).blur(function(){
                        var phone = $(this).val()
                        var phone_preg = /^1[345678]\d{9}$/;
                        if (phone_preg.test(phone)) {
                          isPhone = true;
                          $('#add_phone').html('<font style="color:red"></font>');
                        }else{
                          isPhone = false;
                          $('#add_phone').html('<font style="color:red">手机号格式不正确</font>');
                        }
                      })

                      $('form[name=isForm]').submit(function(){
                			if (isPhone) {
                				return true;
                			}
                			return false;
                		})

                    </script>
@endsection
