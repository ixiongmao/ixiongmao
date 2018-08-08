<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="font-family:'Microsoft YaHei';">
    <tbody>
        <tr>
            <td>
                <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" height="40"></table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#373d41" height="48" style="font-family:'Microsoft YaHei';">
                    <tbody>
                        <tr>
                            <td width="74" height="48" border="0" align="center" valign="middle" style="padding-left:20px;">
                                <a href="" target="_blank"></a>
                            </td>
                            <td width="703" height="48" colspan="2" align="right" valign="middle" style="color:#ffffff; padding-right:20px;">
                                <a href="{{ $systems['system_site_url'] }}" target="_blank" style="color:#ffffff;text-decoration:none;font-family:'Microsoft YaHei';">首页</a>&nbsp;&nbsp;
                                <span style="color:#6c7479;">|</span>&nbsp;&nbsp;
                                <a href="{{ $systems['system_site_url'] }}/user/index" target="_blank" style="color:#ffffff;text-decoration:none;font-family:'Microsoft YaHei';">会员中心</a>&nbsp;&nbsp;
                          </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="800" border="0" align="left" cellpadding="0" cellspacing="0" style=" border:1px solid #edecec; border-top:none; padding:0 20px;font-size:14px;color:#333333;">
                    <tbody>
                        <tr>
                            <td width="760" height="56" border="0" align="left" colspan="2" style=" font-size:16px;vertical-align:bottom;font-family:'Microsoft YaHei';">尊敬的用户 {{ $m_name }}：：</td>
                        </tr>
                        <tr>
                            <td width="760" height="30" border="0" align="left" colspan="2">&nbsp;</td></tr>
                        <tr>
                            <td width="40" height="32" border="0" align="left" valign="middle" style=" width:40px; text-align:left;vertical-align:middle; line-height:32px; float:left;"></td>
                            <td width="720" height="32" border="0" align="left" valign="middle" style=" width:720px; text-align:left;vertical-align:middle;line-height:32px;font-family:'Microsoft YaHei';">您于{{ date('Y-m-d H:i:s',$orders_time)}} 左右购买的商品信息已收到，请静静的等待发货，谢谢！</td></tr>
                        <tr>
                            <td width="40" height="32" border="0" align="left" valign="middle" style=" width:40px; text-align:left;vertical-align:middle; line-height:32px; float:left;"></td>
                            <td width="720" height="32" border="0" align="left" valign="middle" style=" width:720px; text-align:left;vertical-align:middle;line-height:32px;font-family:'Microsoft YaHei';">
                                <br>订单记录<small style="color:  red;">(详细记录，请登录平台会员中心查看)</small>：</td></tr>
                        <tr>
                            <td width="40" height="32" border="0" align="left" valign="middle" style=" width:40px; text-align:left;vertical-align:middle; line-height:32px; float:left;"></td>
                            <td width="720" height="32" border="0" align="left" valign="middle" style=" width:720px; text-align:left;vertical-align:middle;line-height:32px;font-family:'Microsoft YaHei';">
                                <table width="90%" cellspacing="0" cellpadding="0" bordercolor="#666666" border="0" bgcolor="#FFFFFF" style="margin-left:20px;margin-top:10px;font-size:12px;font-weight:normal;border-collapse:collapse;">
                                    <tbody style="text-align:  center;">
                                        <tr style="background-color:#e4e4e4;">
                                            <th width="12%" style="border:1px solid #ccc; height:32px;">订单金额</th>
                                            <th width="12%" style="border:1px solid #ccc; height:32px;">赠送积分</th>
                                          </tr>
                                        <tr>
                                            <td style="border:1px solid #ccc;word-break:break-all;padding:4px">{{ $totalpricenums }}</td>
                                            <td style="border:1px solid #ccc;word-break:break-all;padding:4px">{{ $integral }}</td>
                                          </tr>
                                    </tbody>
                                </table>
                                <br>
                              </td>
                        </tr>
                        <tr>
                            <td width="720" height="32" colspan="2" style="padding-left:40px;">&nbsp;</td></tr>
                        <tr>
                            <td width="720" height="14" colspan="2" style="padding-bottom:16px; border-bottom:1px dashed #e5e5e5;font-family:'Microsoft YaHei';">北京严选科技</td></tr>
                        <tr>
                            <td width="720" height="14" colspan="2" style="padding:8px 0 28px;color:#999999; font-size:12px;font-family:'Microsoft YaHei';">此邮件为系统邮件请勿回复</td></tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#fff">
                    <tbody>
                        <tr>
                            <td>
                                <p style="line-height: 22px; font-family: 'Microsoft YaHei'; font-size: 12px; color: #999; text-align: center;">
                                Copyright © 2018 严选 Powered By: <a href="https://laravel.com/" target="_blank" title="Laravel的官网" style="text-decoration:none; color:#00a2ca;">Laravel</a>/<a href="https://github.com/laravel/laravel" target="_blank" title="Laravel的GitHub" style="text-decoration:none; color:#00a2ca;">GitHub</a>
                                <p title="AES_256_GCM" style="color:  rgb(123,239,175);line-height: 10px; font-family: 'Microsoft YaHei'; font-size: 12px; text-align: center;">本站使用的SSL 256位加密</p>
                                <p title="BT" style="line-height: 22px; font-family: 'Microsoft YaHei'; font-size: 12px; color: #999; text-align: center;">本站正在使用腾讯云服务器和宝塔Linux面板维护管理</p>
                              </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
