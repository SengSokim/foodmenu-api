<!doctype html>
<html lang="en-US">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>Reset Password Email Template</title>
  <meta name="description" content="Reset Password Email Template.">
  <style type="text/css">
    a:hover {
      text-decoration: underline !important;
    }

    body{
      margin: 0;
      background-color: #f2f3f8
    }

    .credit a{
      color:#00aae5;
      text-decoration: none;
    }
    .credit a:hover{
      color: #008ae3;
    }

    .container{
      width: 100%;
      background-color: #f2f3f8;
      font-family: sans-serif
    }
  </style>
</head>
<body>
  <table class="container">
    <tr>
      <td>
        <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr><td style="height:80px;">&nbsp;</td></tr>
          <tr>
            <td style="text-align:center;">
              <a href="#" target="_blank">
                <img width="150" src="{{config('system.icon_url')}}">
              </a>
            </td>
          </tr>
          <tr><td style="height:20px;">&nbsp;</td></tr>
          <tr>
            <td>
              @yield('content')
            </td>
          </tr>
          <tr>
            <td style="height:20px;">&nbsp;</td>
          </tr>
          <tr>
              <td style="text-align:center;">
                  <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">Powered By <strong class="credit"><a href="https://papadeliver.co/" target="_blank">PAPA DELIVER</a></strong>. All rights reserved.</p>
              </td>
          </tr>
          <tr>
              <td style="height:80px;">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
