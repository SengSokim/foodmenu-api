@extends('mail.layout')
@section('content')
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
    <tr>
        <td style="height:40px;">&nbsp;</td>
    </tr>
    <tr>
        <td style="padding:0 35px;">
            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
              You have requested to reset your password</h1>
            <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                We've received a request to reset your password.
                If you didn't make the request, just ignore this email.
                Otherwise, you can reset your password using this verify code:
            </p>

            <h1>{{ $code }}</h1>
        </td>
    </tr>
    <tr><td style="height:40px;">&nbsp;</td></tr>

</table>
@endsection
