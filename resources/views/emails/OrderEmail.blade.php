<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Beuatykink Order Email</title>
    {{-- <link rel="stylesheet" href="https://res.cloudinary.com/ielemson/raw/upload/v1673629984/beautykink/order_email_style_jdnev4.css" media="all" />  --}}

<style>
.clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  
  a {
    color: #5D6975;
    text-decoration: underline;
  }
  
  body {
    position: relative;
    width: 21cm;  
    height: 25.7cm;
    margin: 0 auto; 
    color: #001028;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    font-size: 12px; 
    font-family: Arial;
  }
  
  header {
    padding: 10px 0;
    margin-bottom: 30px;
  }
  
  #logo {
    text-align: center;
    margin-bottom: 10px;
  }
  
  #logo img {
    width: 90px;
  }
  
  h1 {
    border-top: 1px solid  #5D6975;
    border-bottom: 1px solid  #5D6975;
    color: #5D6975;
    font-size: 2.4em;
    line-height: 1.4em;
    font-weight: normal;
    text-align: center;
    margin: 0 0 20px 0;
    background: url(https://res.cloudinary.com/ielemson/image/upload/v1673629075/beautykink/dimension_p3rqkh.png);
  }
  
  #project {
    float: left;
  }
  
  #project span {
    color: #5D6975;
    text-align: right;
    width: 52px;
    margin-right: 10px;
    display: inline-block;
    font-size: 0.8em;
  }
  
  #company {
    float: right;
    text-align: right;
  }
  
  #project div,
  #company div {
    white-space: nowrap;        
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }
  
  table tr:nth-child(2n-1) td {
    background: #F5F5F5;
  }
  
  table th,
  table td {
    text-align: center;
  }
  
  table th {
    padding: 5px 20px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;        
    font-weight: normal;
  }
  
  table .service,
  table .desc {
    text-align: left;
  }
  
  table td {
    padding: 20px;
    text-align: right;
  }
  
  table td.service,
  table td.desc {
    vertical-align: top;
  }
  
  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }
  
  table td.grand {
    border-top: 1px solid #5D6975 !important;
  }
  
  #notices .notice {
    color: #5D6975;
    font-size: 1.2em;
  }
  
  footer {
    color: #5D6975;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #C1CED9;
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
      <h1>Order No: {{$invoice['order_id']}}</h1>
      <div id="company" class="clearfix">
        <div>	{{$kinky->title}}</div>
        <div>Lagos Nigeria,<br /> West Africa</div>
        <div>{{$kinky->whatsapp_phone}}</div>
        <div><a href="mailto:{{$kinky->contact_email}}">{{$kinky->contact_email}}</a></div>
      </div>
      <div id="project">
        @if ($invoice['payment_status'] == "Unpaid")
           <div><span>STATUS</span style="color:red; font-weight:800">{{$invoice['payment_status']}}</div>
        @else
        <div><span>STATUS</span style="color:green; font-weight:800"> {{$invoice['payment_status']}}</div>
        @endif
       
        <div><span>CUSTOMER</span> {{$shipping_info['ship_first_name'].' '.$shipping_info['ship_last_name']}}</div>
        <div><span>ADDRESS</span> {{$shipping_info['ship_address1']}}</div>
        <div><span>EMAIL</span> <a href="mailto:{{$shipping_info['ship_email']}}">{{$shipping_info['ship_email']}}</a></div>
        <div><span>DATE</span> {{date_format($invoice['order_date'],'Y/m/d')}}</div>
        {{-- <div><span>DUE DATE</span> September 17, 2015</div> --}}
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">#</th>
            <th class="desc">Product</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
         
          @php
          $no = 1;
        @endphp
        @foreach ($cart as $item)


        <tr>
          <td class="service">{{$no++}}</td>
          <td class="desc">  {{$item['name']}} 
            <br>
          @if($item['attribute_name'])
          {{$item['attribute_name']}}
          @endif
          </td>
          <td class="unit">@money($item['main_price'],'NGN')</td>
          <td class="qty">{{$item['qty']}}</td>
          <td class="total">@money($item['main_price'] * $item['qty'],'NGN')</td>
        </tr>
        @endforeach
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">@money($grand_total,'NGN')</td>
          </tr>
          <tr>
           
            <td colspan="4">{{$shipping['name']}}:</td>
				<td class="total">@money($shipping['price'],'NGN')</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">@money($grand_total + $shipping['price'],'NGN' )</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">
          <p>
            <h4>Bank Transfer Instructions</h4>
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