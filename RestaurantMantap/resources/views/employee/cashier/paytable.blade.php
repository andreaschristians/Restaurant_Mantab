<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  	<style>
  		.table-payment{
  			width: 80%; 
  			height: 500px;
  			background-color: rgba(0,0,0,0.07); 
  			margin: auto; 
  			margin-top: 6%;
  			padding-top: 5%;
        padding-left: 1%;
        padding-right: 5%;
  			border-radius: 10px;
  			opacity: 90%;
        overflow: auto;
        white-space: nowrap;
  		}
      .table-num{
        width: 20%;
        height: 320px;
        background-color: #ffc107;
        margin-left: 9%;
        border-radius: 15px;
        display: inline-block;
        text-align: center;
        padding: 100px 0;
        vertical-align: top;
      }
      .table-num p{
        font-size: 40px;
        font-weight: 400;
        letter-spacing: 4px;
        color: black;
      }
      .table-num:hover{
        background-color: #e0a904;
      }

      a:hover{
        text-decoration: none;
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
    
    <div class="table-payment" >
        @foreach($orders as $key=>$order)
            <a href="{{ route('employee.cashier.payment', $order->id) }}">
                <div class="table-num">
                <p>TABLE<br>{{ $order->table_number }}</p>
                </div>
            </a>
        @endforeach
    </div>
</body>
</html>