<h2>Dear {{ $attributes['first_name'] }},</h2>
<br>
{!! $settings['verify_user_email'] !!}
<br>
<a style=" background-color: #f00c93;
  border: none;
  color: white;
  padding: 10px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"
    href="{{ $confirm_email_url }}" target="_blank">Verify Email</a>
