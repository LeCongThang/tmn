<!DOCTYPE html>
<html lang="vi">
<head></head>
<body style="text-align: center; position: relative;background-color: #f5f8fa;">
<div style="margin: 50px auto;width: 80%; position: absolute;margin: auto; left: 0;right: 0;font-family: sans-serif;border-radius: 4px;background: #fff;border: 1px solid #e1e8ed;padding: 10px;">
    <div style="text-align: center; margin-bottom: 20px">
        <a href="#" style="text-decoration:none"
           target="_blank"><img src="{{asset('img/logo.png')}}"
                                style="max-width: 145px;">
        </a>
    </div>
    <div style="text-align: justify;margin-bottom: 22px;border: 1px solid beige;padding: 5px;border-radius: 5px;">
        <p>&nbsp;&nbsp;&nbsp;Chào bạn<b style="font-size: 1.1em"></b>, gần đây chúng tôi nhận được yêu cầu lấy lại mật khẩu
        của bạn từ tài khoản: <span style="color:blue">{{$name or 'example@gmail.com'}}</span>,
            nếu đúng là bạn thì vui lòng click vào liên kết sau để đặt lại mật khẩu mới cho tài khoản <i>(liên kết này chỉ khả dụng đến <span style="color:#cc783b;">23:59:59 {{date('d/m/Y')}}</span> và chỉ sử dụng được 1 lần duy nhất)</i></p>
        <div style="text-align: center">
            <p style="margin: 2px auto 2px auto;padding-bottom: 10px;padding-top: 10px;padding-left: 25px;padding-right: 25px;display: inline-block;background-color: #007b70;border-radius: 18px; text-align: center" >
                <a target="_blank" style="color: white;font-weight: bold;text-decoration:none " href="{{$link}}">Đặt Lại Mật Khẩu</a>
            </p>
        </div>
        <p>hoặc bỏ qua email này nếu đó không phải là bạn!</p>
    </div>
    <span> <a href="#" style="text-decoration:none;font-family: 'Helvetica Neue Light',Helvetica,Arial,sans-serif;color:#8899a6;font-size:12px;font-weight:normal;">Copyright © GD. 2017 • All rights reserved.</a> </span>
</div>

</body>
</html>