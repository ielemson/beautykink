<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <!-- <link rel="stylesheet" href="style.css" media="all" /> -->
    <style>
      @font-face {
  font-family: SourceSansPro;
  src: url('https://res.cloudinary.com/ielemson/raw/upload/v1673275882/beautykink/SourceSansPro-Regular_hyr3vi.ttf');
  /* font-family: 'Source Sans Pro', sans-serif; */

}

/* @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap'); */

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #cc0066;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #cc0066;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #cc0066;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #cc0066;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #cc0066;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #cc0066;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #cc0066;
  font-size: 1.4em;
  border-top: 1px solid #cc0066; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #cc0066; 
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}


    </style>
  </head>
  <body>
	@php
	$kinky = DB::table('settings')->first();
	@endphp
    <header class="clearfix">
      <div id="logo">
        <img src="https://dev.beautykink.com/uploads/setting/1666611203-slider.png">
      </div>
      <div id="company">
        <h2 class="name">
			<a target="_blank" href="https://{{$kinky->email_host}}">
				{{$kinky->title}}
				</a>
		</h2>
		<div>Lagos Island, Lagos Nigeria</div>
		<div>{{$kinky->whatsapp_phone}}</div>
		{{-- <div>{{$kinky->contact_email}}</div> --}}
        <div><a href="mailto:{{$kinky->contact_email}}">{{$kinky->contact_email}}</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{$shipping_info['ship_first_name'].' '.$shipping_info['ship_last_name']}}</h2>
          <div class="address">{{$shipping_info['ship_address1']}}</div>
          <div class="email"><a href="mailto:{{$shipping_info['ship_email']}}">{{$shipping_info['ship_email']}}</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE {{$invoice['order_id']}}</h1>
		  <div class="date">Date of Invoice: {{date_format($invoice['order_date'],'Y/m/d')}}</div>
		  <div class="date">Payment Type: {{$invoice['payment_method']}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
			<th class="text-left">PRODUCT</th>
			<th class="text-right">PRICE</th>
			<th class="text-right">QTY</th>
			<th class="text-right">TOTAL</th>
          </tr>
        </thead>
        <tbody>
			@php
			$no = 1;
		@endphp
		@foreach ($cart as $item)
		<tr>
			<td class="no">{{$no++}}</td>
			<td class="text-left">
			{{$item['name']}} <br>
			@if($item['attribute_name'])
			{{$item['attribute_name']}}
			@endif
			</td>
			<td class="unit">@money($item['main_price'],'NGN')</td>
			<td class="qty">{{$item['qty']}}</td>
			<td class="total">@money($item['main_price'] * $item['qty'],'NGN')</td>
		</tr>
		@endforeach
        </tbody>
        <tfoot>
			<tr>
				<td colspan="2"></td>
				<td colspan="2">SUB-TOTAL</td>
				<td>@money($grand_total,'NGN')</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="2">{{$shipping['name']}}:</td>
				<td>@money($shipping['price'],'NGN')</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="2">GRAND TOTAL</td>
				<td>
					{{-- @php
						$price = (float)$grand_total
					@endphp --}}
					@money($grand_total + $shipping['price'],'NGN' )
				</td>
			</tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div class="notices">
		<div style="margin-bottom:2px">INSTRUCTIONS:</div>
		<div class="notice">
			<p>
				Bank Transfer Instructions
				<br/>
				Bank: UBA
				<br/>
				ACCT NAME: BK BEAUTY COMPANY
				<br/>
				ACCT NO: 2084216096
				<br/>
				Kindly make sure the name on your payment is the same with the name on your order for instant payment verification. Otherwise, kindly send proof of payment including your order number to contact@beautykink.com .
				<br/>
				Your order will not ship until we receive payment.
			</p>		
	  </div>
	</div>
    </main>
    <footer>
		Please reply to this e-mail if you have any questions.
    </footer>
  </body>
</html>