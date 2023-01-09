<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
</head>
<body>

	
	<!--Author      : IELEMSON-->
	<div id="invoice" class="container">
	
		<div class="toolbar hidden-print">
			<div class="text-right">
				<button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print Invoice</button>
				<!-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
			</div>
			<hr>
		</div>
		<div class="invoice overflow-auto">
			<div style="min-width: 600px">
				<header>
					<div class="row">
						<div class="col">
							  @php
								$kinky = DB::table('settings')->first();
								@endphp
							<a target="_blank" href="https://{{$kinky->email_host}}">
								<img src="https://dev.beautykink.com/uploads/setting/1666611203-slider.png" data-holder-rendered="true" />
								</a>
						</div>
						<div class="col company-details">
							<h2 class="name">
								
								<a target="_blank" href="https://{{$kinky->email_host}}">
								{{$kinky->title}}
								</a>
							</h2>
							<div>Lagos Island, Lagos Nigeria</div>
							<div>{{$kinky->whatsapp_phone}}</div>
							<div>{{$kinky->contact_email}}</div>
						</div>
					</div>
				</header>
				<main>
					<div class="row contacts">
						<div class="col invoice-to">
							<div class="text-gray-light">INVOICE TO:</div>
							<h2 class="to">{{$shipping_info['ship_first_name'].' '.$shipping_info['ship_last_name']}}</h2>
							<div class="address">{{$shipping_info['ship_address1']}}</div>
							<div class="email"><a href="mailto:{{$shipping_info['ship_email']}}">{{$shipping_info['ship_email']}}</a></div>
						</div>
						<div class="col invoice-details">
							<h1 class="invoice-id">INVOICE {{$invoice['order_id']}}</h1>
							<div class="date">Date of Invoice: {{date_format($invoice['order_date'],'Y/m/d')}}</div>
							<div class="date">Payment Type: {{$invoice['payment_method']}}</div>
						</div>

						<div class="notices" style="margin-top: 5px">
							{{-- <div>NOTICE:</div> --}}
							<div class="notice">{!!$msgBody!!}</div>
						</div>
					</div>
					<table border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
								<th>#</th>
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
					<div class="thanks">Thank you!</div>
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
			</div>
			<!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
			<div></div>
		</div>
	</div>

<style type="text/css">
body
{
margin-top:20px;
background-color: #f7f7ff;
}
#invoice {
    padding: 0px;
}
a{
	color: #cc0066 !important;
}
.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #cc0066
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #cc0066
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #cc0066;
    background: #e7f2ff;
    padding: 10px;
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,
.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #cc0066;
    font-size: 1.2em
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #cc0066
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #cc0066;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

.invoice table tfoot tr:last-child td {
    color: #cc0066;
    font-size: 1.4em;
    border-top: 1px solid #cc0066
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px !important;
        overflow: hidden !important
    }
    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }
    .invoice>div:last-child {
        page-break-before: always
    }
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #cc0066;
    background: #e7f2ff;
    padding: 10px;
}
</style>

<script type="text/javascript">
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>
</body>
</html>