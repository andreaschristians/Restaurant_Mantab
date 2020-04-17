<!DOCTYPE html>
<html lang="en">
<head>
  <title>Close Bill</title>
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
        width: 90%;
        height: 420px;
        padding-top: 1%;
        background-color: white;
        border-radius: 10px;
        margin: auto;
      }
      .close-bill{
        margin: 0;
        margin-left: 7%;
        padding: 0;
        font-style: italic;
        font-weight: bold;
      }

      .list-table{
        height: 330px;
        overflow: auto;
      }
      .total-bill{
        width: 100%;
        height: 30px;
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
        padding-left: 20px;
        padding-right: 500px;
        border-right: 2px solid #ddd;
      }
      #qty{
        padding-right: 20px;
        padding-left: 10px;
        border-right: 2px solid #ddd;
      }
      #price{
        padding-right: 30px;
        padding-left: 10px;
        border-right: 2px solid #ddd;
      }
      #total{
        padding-right: 120px;
        padding-left: 10px;

      }
      #total-num{
        margin-left: 885px;
      }
      button{
        background-color: red; 
        width: 11%;
        height: 32px;
        border: none;
        color: white;
        margin-left: 87%;
        margin-top: 6px;
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
      a:hover{
        text-decoration: none;
        color: red;
      }
      button:hover{
        background-color: #b81d1d;
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
                            <?php $total += ($ordermenu->quantity) * ($ordermenu->menu->price)?>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="total-bill">
                <p id="total-num">IDR  <?php echo $total ?><p>
            </div>
              <a href="{{ route('employee.cashier.billstore', [$order_id, $total]) }}" class="total">
                  <button>Close Bill</button>
              </a>
        </div>
    </div>
</body>   
</html>