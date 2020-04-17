<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
      .list-bill{
        width: 80%; 
        height: 500px;
        background-color: rgba(0,0,0,0.07); 
        margin: auto; 
        margin-top: 6%;
        padding-top: 1%;
        border-radius: 10px;
        opacity: 90%;
      }
      .list-bill-show{
        width: 70%;
        height: 420px;
        padding-top: 1%;
        background-color: white;
        border-radius: 10px;
        margin: auto;
        margin-left: 80px;
        display: inline-block;
      }
      .input-cash{
        width: 20%;
        height: 420px;
        background-color: white;
        display: inline-block;
        border-radius: 10px;
        margin-left: 20px;
        vertical-align: top;
      }
      .close-bill{
        margin: 0;
        margin-left: 7%;
        padding: 0;
        font-style: italic;
        font-weight: bold;
      }
      .list-table{
        height: 350px;
        overflow: auto;
      }
      .total{
        width: 100%;
        height: 60px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
      }
      table{
        border-collapse: collapse;
        margin-left: 30px;
        margin-top: 10px;
      }
      td{
        border-bottom: 2px solid #ddd;
        padding-top: 10px;
      }
      #number{
        border-right: 2px solid #ddd;
      }
      #food{
        padding-left: 10px;
        padding-right: 400px;
        border-right: 2px solid #ddd;
      }
      #qty{
        padding-right: 20px;
        padding-left: 10px;
        border-right: 2px solid #ddd;
      }
      #price{
        padding-right: 80px;
        padding-left: 10px;
        border-right: 2px solid #ddd;
      }
      #total{
        padding-right: 80px;
        padding-left: 10px;

      }
      #pay{
        text-align: center;
        margin-top: 10px;
      }
      #payment{
        text-align: center;
      }
      #payment input{
        border: 0;
        border-bottom: 1px solid #ddd;
      }
      button{
        background-color: #08b0bd; 
        width: 11%;
        height: 32px;
        border: none;
        color: white;
        margin-left: 87%;
        margin-top: 1.3%;
        text-align: center;
        text-decoration: none;
        text-decoration-color: white;
        font-style: italic;
        font-weight: 400;
        border-radius: 10px;
        font-size: 16px;
        letter-spacing: 1px;
      }
      tr:hover{
        background-color: rgba(0,0,0,0.07);
      }
      button:hover{
        background-color: #0374a8;
      }
      ::-webkit-scrollbar {
        width: 10px;
      }
      ::-webkit-scrollbar-track {
        background: #f1f1f1; 
      }
      ::-webkit-scrollbar-thumb {
        background: #888; 
      }
      ::-webkit-scrollbar-thumb:hover {
        background: #555; 
      }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-warning navbar-dark" style="height: 100px; width: 100%; padding-top: 80px" >
        <ul class="navbar-nav" style="margin-left: 245px;margin-top: 10px">
            <li class="nav-item">
                <img src="{{ asset('frontend/images/avatar.png') }}"class="mr-3 mt-3 rounded-circle" style="width:100px;position: relative;">
            </li>
            <li class="nav-item">
                <ul class="nav flex-column" style="margin-top: 33px">
                    <li class="nav-item">
                        <p class="font-weight-regular"><font size="4">{{ Auth::guard('employee')->user()->name }}</font></p>
                    </li>
                    <li class="nav-item">
                        <p class="font-weight-regular"><font size="4">{{ Auth::guard('employee')->user()->job }}</font></p>
                    </li>
                </ul>
            </li>
          <li class="nav-item">
            <a href="javascript:history.back()">
                <img src="{{ asset('frontend/images/back_arrow.png') }}" style="width: 50px;height: 50px;margin-left: 1600%;">
            </a>
            <form id="logout-form" method="POST" action="{{ route('signout') }}" style="display: none">
                @csrf
            </form>
          </li>
        </ul>
    </nav>
    
    <div class="list-bill" >
      <p class="close-bill">Payment</p>
      <div class="list-bill-show">

        <div class="list-table">
            <table>
                <th>No.</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                @foreach($ordermenus as $key=>$ordermenu)
                    <tr>
                        <td id="number">{{ $key+1 }}. </td>
                        <td id="food">{{ $ordermenu->menu->name }}</td>
                        <td id="qty">{{ $ordermenu->quantity }}</td>
                        <td id="price">IDR {{ $ordermenu->menu->price }}</td>
                        <td id="total">IDR {{ ($ordermenu->quantity) * ($ordermenu->menu->price) }}</td>
                        <?php $total += ($ordermenu->quantity) * ($ordermenu->menu->price) ?>
                    </tr>
                @endforeach
            </table>
        </div>

      </div>
    
      <div class="input-cash">
        <p id="pay">Input Cash</p>
        <form id="payment" method="POST" action="{{ route('employee.cashier.paymentstore') }}">
            <input type="number" name="amount">
            <br>
            <p>Total</p>
            <input type="text" value="{{ $total }}" name="total">
            <input type="hidden" value="{{ $bill_id }}" name="bill_id">
            <input type="hidden" value="{{ $order_id }}" name="order_id">
            <button type="submit">Print</button>
            
        </form>
      </div>
    </div>
</body>
</html>