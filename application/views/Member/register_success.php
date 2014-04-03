<!DOCTYPE html>
<html>
<head>
	<title>我的个人信息</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

    <h1>注册成功</h1>
  <h3><div id="time" style="color:red;"></div>秒后跳转到用户主页</h3>
  <h3><div style="color:green"><a href="../member/index">立即跳转</div></h3>

   <script type="text/javascript">
        var i = 5;
        var intervalid;
        intervalid = setInterval("fun()", 1000);
        function fun() {
            if (i == 0) {
                window.location.href = "../../index.php/member/index";
                clearInterval(intervalid);
            }
            document.getElementById("time").innerHTML = i;
            i--;
        }
  </script>
</body>
</html>