<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>superior Spa Alert</title>
    <link href="styles.css" media="all" rel="stylesheet" type="text/css" />
	<style>
		* {
    margin: 0;
    padding: 0;
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    box-sizing: border-box;
    font-size: 14px;
}

img {
    max-width: 100%;
}

body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100% !important;
    height: 100%;
    line-height: 1.6;
}

/* Let's make sure all tables have defaults */
table td {
    vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
body {
    background-color: #f6f6f6;
}

.body-wrap {
    background-color: #f6f6f6;
    width: 100%;
}

.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
    padding: 20px;
}

.content-block {
    padding: 0 0 20px;
}

.header {
    width: 100%;
    margin-bottom: 20px;
}

.footer {
    width: 100%;
    clear: both;
    color: #999;
    padding: 20px;
}
.footer a {
    color: #999;
}
.footer p, .footer a, .footer unsubscribe, .footer td {
    font-size: 12px;
}

/* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 40px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    font-size: 32px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
}

h3 {
    font-size: 18px;
}

h4 {
    font-size: 14px;
    font-weight: 600;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
    color: #1ab394;
    text-decoration: underline;
}

.btn-primary {
    text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 5px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 5px;
    text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 5px 0;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
    h1, h2, h3, h4 {
        font-weight: 600 !important;
        margin: 20px 0 5px !important;
    }

    h1 {
        font-size: 22px !important;
    }

    h2 {
        font-size: 18px !important;
    }

    h3 {
        font-size: 16px !important;
    }

    .container {
        width: 100% !important;
    }

    .content, .content-wrap {
        padding: 10px !important;
    }

    .invoice {
        width: 100% !important;
    }
}
.orderdata > tbody > tr > th {   border-bottom: 1px solid #ccc;}
.orderdata > tbody > tr > td {   border-bottom: 1px solid #ccc;}

	</style>
</head>

<body>

<table class="body-wrap" style="    background-color: #f6f6f6;
    width: 100%;">
    <tr>
        <td></td>
        <td class="container" width="600" style="display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    clear: both !important;">
            <div class="content" style="    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" style="    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;">
                     <tr>
                        <td  style="text-align:center;"><img src="{{ asset('assets/img/superiorspas.png') }}" class="img-responsive"/></td>
                    </tr>
                    <tr>
                        <td style="background: #1ab394;font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;">
                           Order Alert!
                        </td>
                    </tr>
                    <tr>
                        <td class="content-wrap" style="padding: 20px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
								 
                                    <td class="content-block" style="padding: 0 0 20px;">
                                         <h4  style="text-align: center; font-size: 24px;color: inherit; font-family: Arial,sans-serif;font-weight: 400; margin-bottom: 10px;word-wrap: normal;margin: 0;">
Hello,{{$invoice_ar['dealername']}}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
									<h4>
									  <?php if(isset($invoice_ar['orderStatus']) && !empty($invoice_ar['orderStatus'])){
		?>
									Your order is  <label style="text-transform:capitalize;    background-color: #f8ac59;
    color: #FFFFFF;padding:5px;border-radius:5px;"> 
										 
											<?php	
											echo $invoice_ar['orderStatus'];
												
										
										?></label>
										
										<?php 
									  }
										if(isset($invoice_ar['invoiceNumber']) && !empty($invoice_ar['invoiceNumber'])){
											?>
										<br/><br/>
Your invoice Number is  <label style="background-color: #029dff;color:#fff;padding:5px;border-radius:5px;"><?php 
												echo $invoice_ar['invoiceNumber'];
												
										
										?></label>  
										
										<?php
										}
										?>
									 <?php if(isset($invoice_ar['delivery_date']) && !empty($invoice_ar['delivery_date'])){
										?>
									<br/><br/>
We will deliver your order by  <label style="background-color: #029dff;color:#fff;padding:5px;border-radius:5px;"><?php 
											echo $invoice_ar['delivery_date'];
											
									
									?></label>
										
									<?php
										}
									  ?>
										</h4>
									<h3>Order Details</h3>
										<table class="invoice orderdata" style="width: 100%;text-align:left;">
											<thead>
												<tr>
													<th>Accessory Name</th>
													<th>Qty</th>
													<th>Price</th>
													<th>order Date</th>
													 
												</tr>
											</thead>
<?php
												$num=1;
												foreach($main_mail as $main_k=>$main_v)
												{
													foreach($main_v as $child_k=>$child_v)
													{
														?>
														<tr>
														 <td>{{ $child_v['accessoryName'] }}</td>
														 <td>{{ $child_v['order_qty'] }}</td>
														 <td>{{ $child_v['price'] }}</td>
														 <td>{{ $invoice_ar['orderDate'] }}</td>
														 
														</tr> 
														<?php
													}
													$num++;
												}
											 ?>
										
										</table>
									
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" style="padding: 0 0 20px;">
                                        <a href="{{ URL::to('/')}}" class="btn-primary" style="text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 5px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 5px;
    text-transform: capitalize;">Visit Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block" style="padding: 0 0 20px;">
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block" style="padding: 0 0 20px;text-align: center;"><a href="#">&copy;</a> 2016 All Right reserved </td>
                        </tr> 
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>

</body>

</html>
