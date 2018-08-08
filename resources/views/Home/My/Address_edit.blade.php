@extends('Home.User.Ucommon')

@section('Home_title', '修改收货地址')

@section('User_content')
    <div class="my_nala_centre ilizi_centre">
        <div class="ilizi cle">
            <div class="box">
                <div class="box_1">
                    <div class="userCenterBox boxCenterList clearfix" style="_height:1%; font-size:14px;">
                        <h1>@yield('Home_title')</h1>
                        <form action="/user/my_address/update/{{ $data['id'] }}" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <table width="100%" border="0" cellpadding="3">
                                <tbody>
                                    <tr>
                                        <td align="right">名字：</td>
                                        <td><input name="add_name" type="text" size="30" class="inputBg" value="{{ $data['address_name'] }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">电话：</td>
                                        <td><input name="add_phone" type="text" size="30" class="inputBg" value="{{ $data['address_phone'] }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top">详细地址：</td>
                                        <td>
                                            <textarea name="add_detail" cols="50" rows="4" class="B_blue">{{ $data['address_address'] }}</textarea>
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
                </div>
            </div>
        </div>
    </div>
@endsection
