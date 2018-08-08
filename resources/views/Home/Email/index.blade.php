<div align="center">
    <div class="open_email" style="margin-left: 8px; margin-top: 8px; margin-bottom: 8px; margin-right: 8px;">
        <div>
            <span class="genEmailNicker"></span>
            <br>
            <span class="genEmailContent"></span>
            <div id="cTMail-Wrap" style="box-sizing:border-box;text-align:center;min-width:320px; max-width:660px; border:1px solid #f6f6f6; background-color:#f7f8fa; margin:auto; padding:20px 0 30px; font-family:'helvetica neue',PingFangSC-Light,arial,'hiragino sans gb','microsoft yahei ui','microsoft yahei',simsun,sans-serif">
                <div class="main-content" style="">
                    <table style="width:100%;font-weight:300;margin-bottom:10px;border-collapse:collapse">
                        <tbody>
                            <tr style="font-weight:300">
                                <td style="width:3%;max-width:30px;"></td>
                                <td style="max-width:600px;">
                                    <div id="cTMail-logo" style="width:92px; height:45px;">
                                        <a href="{{ $systems['system_site_url'] }}">
                                            <img border="0" src="{{ $systems['system_site_url'] }}/Uploads/image/20180723/20180723140554_82948.png" style="width:100px; height:55px;display:block"></a>
                                    </div>
                                    <p style="height:2px;background-color: #00a4ff;border: 0;font-size:0;padding:0;width:100%;margin-top:20px;"></p>
                                    <div id="cTMail-banner" style="text-align: center;width: 100%;overflow:hidden;">
                                        <img border="0" src="http://imgcache.qq.com/open_proj/proj_qcloud_v2/mc_2014/cdn/css/img/mail/recovery.jpg" style="width:100%;margin:0 auto;overflow:hidden;"></div>
                                    <div id="cTMail-inner" style="margin-top:-4px;background-color:#fff; padding:23px 0 20px;box-shadow: 0px 1px 1px 0px rgba(122, 55, 55, 0.2);text-align:left;">
                                        <table style="width:100%;font-weight:300;margin-bottom:10px;border-collapse:collapse;text-align:left;">
                                            <tbody>
                                                <tr style="font-weight:300">
                                                    <td style="width:3.2%;max-width:30px;"></td>
                                                    <td style="max-width:480px;text-align:left;">
                                                        <h1 id="cTMail-title" style="font-weight:bold;font-size:20px; line-height:36px; margin:0 0 16px;">注册验证</h1>
                                                        <p id="cTMail-userName" style="font-size:14px;color:#333; line-height:24px; margin:0;">尊敬的严选用户，您好！</p>
                                                        <p class="cTMail-content" style="font-size:14px;color:#333; line-height:24px; margin:6px 0 0 0;word-wrap:break-word; word-break:break-all;">恭喜用户：{!! $user !!}注册成功，IP为：{{ $Get_ip }}，请尽快点击下方激活！</p>
                                                        <a href="{{ $systems['system_site_url'] }}/reg/create/jihuo?id={{ $id }}&token={{ $token }}" targer="_blank" id="cTMail-btn" style="font-size:16px; line-height:45px;  display:block; background-color:#00a4ff; color:#fff; text-align:center; text-decoration:none;margin-top:28px;margin-bottom:36px;border-radius:3px;">点击验证</a>
                                                        <p id="cTMail-sender" style="color:#333;font-size:14px; line-height:26px; word-wrap:break-word; word-break:break-all;margin-top:32px;">此致！
                                                            <br>
                                                            <strong>严选团队</strong></p>
                                                    </td>
                                                    <td style="width:3.2%;max-width:30px;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="cTMail-copy" style="text-align:center; font-size:12px; line-height:18px; color:#999">
                                        <table style="width:100%;font-weight:300;margin-bottom:10px;border-collapse:collapse">
                                            <tbody>
                                                <tr style="font-weight:300">
                                                    <td style="width:3.2%;max-width:30px;"></td>
                                                    <td style="max-width:540px;">
                                                        <p style="text-align:center; margin:20px auto 14px auto;font-size:12px;color:#999;">此为系统邮件，请勿回复。</p>
                                                        <p style="text-align:center;margin:0 auto 4px;">
                                                            <img border="0" src="{{ $systems['system_site_url'] }}/Home/static/images/index/foot/erweima.png" style="width:64px; height:64px; margin:0 auto;"></p>
                                                        <p id="cTMail-rights" style="max-width: 100%; margin:auto;font-size:12px;color:#999;text-align:center;line-height:22px;">关注严选
                                                            <br>Copyright
                                                            <span style="font-size:12px;color:#999;vertical-align:baseline;">©</span>2013 - 2018 Yanxuan.
                                                            <span style="display:inline-block;">All Rights Reserved.</span>
                                                            <span style="display:inline-block;">&nbsp;严选 版权所有</span></p>
                                                    </td>
                                                    <td style="width:3.2%;max-width:30px;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td style="width:3%;max-width:30px;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <span></span>
        <br>
        <span class="genEmailTail"></span>
    </div>
</div>
<div></div>
<style type="text/css">.qmbox style, .qmbox script, .qmbox head, .qmbox link, .qmbox meta {display: none !important;}</style>