<?php
$message = '<!DOCTYPE html>
<html>
<body style="color: #0a0a0a;font-family:Arial,sans-serif;font-weight: 400;text-align: center;margin: 0;padding: 0;box-sizing: border-box;width: 100% !important;height: 100vh">
<table  data-made-with-foundation="" style="background: #f3f3f3 none repeat scroll 0 0; height: 100%; width: 100%;text-align: center;border-collapse: collapse;border-spacing: 0;">
<tr>
<td  align="center" valign="top">
<center data-parsed="" style="min-width: 580px; width: 100%;">
<table style="text-align: center;background: #fefefe none repeat scroll 0 0;width: 560px;height: 100%;border-collapse: collapse;border-spacing: 0;">
<tbody>
<tr>
<td  style="text-align:center;">
<br>
<span style="float:left;width:100%;background-color:#1AB394;padding:5% 0;">
<center data-parsed="" style="min-width: 580px; width: 100%;color:#fff;font-size: 24px;">
<img src="'.asset('assets/img/superiorspas.png').'" class="img-responsive"/>
</center>
</span>
<table class="rowA" style="display: table;padding: 0;position: relative; width: 100%;text-align: center;border-collapse: collapse;border-spacing: 0;">
<tbody>
<tr>
<th class="small-12 large-12 columns first last" style="padding: 16px;width: 564px;text-align: center">
<table style="text-align: center;position: relative;width: 100%;">
<tr>
<th>
<br />
<h4  style="text-align: center; font-size: 24px;color: inherit; font-family: Arial,sans-serif;font-weight: 400; margin-bottom: 10px;word-wrap: normal;margin: 0;">
Hello, <strong>'.$data_info["to_name"].'</strong><br/><br/> '.$data_info["title_message"].'</h4>
</th>
<th class="expander" style="padding: 0 !important; visibility: hidden; width: 0;"></th>
</tr>
</table>
</th>
</tr>
</tbody>
</table>
<hr>
<table class="rowA" style="display: table;padding: 0;position: relative; width: 100%;text-align: center;">
<tbody>
<tr>
<th class="small-12 large-12 columns first last" style="padding: 16px;width: 564px;text-align: center">
<table style="position: relative;width: 100%;text-align: center;">
<tr>
<th>
<p  style="text-align: left;font-size: 14px;line-height: 19px;font-weight: normal; ">
<b>Name : </b> '.$data_info["name"].'
</p>
<p  style="text-align: left;font-size: 14px;line-height: 19px;font-weight: normal; ">
<b>Email ID : </b> '.$data_info["emailID"].'
</p>
<p  style="text-align: left;font-size: 14px;line-height: 19px;font-weight: normal; ">
<b>Status : </b> <span style="color:#fff;background-color:'.$data_info["warranty_status_color"].';">'.$data_info["warranty_status"].'</span>
</p>
<p  style="text-align: left;font-size: 14px;line-height: 19px;font-weight: normal; ">
<b>Product Brand : </b> '.$data_info["product_model"].'
</p>
<p  style="text-align: left;font-size: 14px;line-height: 19px;font-weight: normal; ">
<b>Product Serial Number : </b> '.$data_info["product_serial_number"].'
</p>
<p  style="text-align: left;font-size: 14px;line-height: 19px;font-weight: normal; ">
<b>Additional Comment : </b> '.$data_info["note"].'
</p>
<p  style="text-align: left;font-size: 14px;line-height: 19px;font-weight: normal; ">
<b>Address : </b> '.$data_info["address"].'
</p>
<p  style="text-align: left;font-size: 14px;line-height: 19px;font-weight: normal; ">
<b>Phone : </b> '.$data_info["phone"].'
</p>

<p  style="text-align: center;font-size: 14px;line-height: 19px;font-weight: normal; ">
<a href="'.$data_info["loginUrl"].'"><b>Login</b></a>
</p>
<hr />
<br />

</th>
<th style="padding: 0 !important; visibility: hidden; width: 0;"></th>
</tr>
</table>
</th>
</tr>
</tbody>
</table>
<table style="position: relative;width: 100%;text-align: center;border-collapse: collapse;border-spacing: 0;background-color: #212121;color: #ffffff;">
<tbody>
<tr>
<th>
<table style="position: relative;width: 100%;text-align: center;border-collapse: collapse;border-spacing: 0;">
<tr>
<th>
<br>
<p style="position: relative;width: 100%;text-align: center;color: #ffffff;">CRM Management System.</p>
</th>
<th  style="padding: 0 !important; visibility: hidden; width: 0;"></th>
</tr>
</table>
</th>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center>
</td>
</tr>
</table>
</body>
</html>';

echo $message;
