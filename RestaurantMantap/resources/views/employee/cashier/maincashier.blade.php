<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kasir</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  	<style>
  		.main-choose{
  			width: 80%; 
  			height: 500px;
  			background-color: rgba(0,0,0,0.07); 
  			margin: auto; 
  			margin-top: 6%;
  			padding-top: 3%;
  			border-radius: 10px;
  			opacity: 90%;
  		}
  		.choose1{
  			float: left;
  			margin-left: 18%;
          }
  		.choose2{
  			float: left;
  			margin-left: 10%;
  		}
  		.text-choose{
  			text-align: center;
  		}
  		a:hover{
  			text-decoration: none;
  			color: red;
  		}
  	</style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-warning navbar-dark" style="height: 100px; width: 100%; padding-top: 5%" >
        <ul class="navbar-nav" style="margin-left: 10%;margin-top: 0.5%">
            <li class="nav-item">
                <img src="{{ asset('frontend/images/avatar.png') }}"class="mr-3 mt-3 rounded-circle" style="width:100px;position: relative;">
            </li>
            <li class="nav-item">
                <ul class="nav flex-column" style="margin-top: 50%">
                    <li class="nav-item">
                        <p class="font-weight-regular"><font size="4">
                          nama
                        </p>
                    </li>
                    <li class="nav-item">
                        <p class="font-weight-regular"><font size="4">
                          cashier
                        </p>
                    </li>
                </ul>
            </li>
          <li class="nav-item">
<!--             <a href="{{ route('signout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> -->
            <a href="#">
                <img src="{{ asset('frontend/images/back_arrow.png') }}" style="width: 50px;height: 50px;margin-left: 2200%;">
            </a>
            <form id="logout-form" method="POST" action="{{ route('signout') }}" style="display: none">
                @csrf
            </form>
          </li>
        </ul>
    </nav>
    
    <div class="main-choose" >
        <div class="choose1">
            <a href="{{ route('employee.cashier.billing') }}">
                <img src="{{ asset('frontend/images/billing.png') }}" style="width: 345px;height: 350px;">
                <p class="text-choose" style="margin-top: 20px; color: black"><font size="5">Billing</font></p>
            </a>
        </div>
        <div class="choose2">
            <a href="{{ route('employee.cashier.paytable') }}">
                <img src="{{ asset('frontend/images/payment.png') }}" style="width: 340px;height: 345px;">
                <p class="text-choose" style="margin-top: 20px; color: black"><font size="5">Payment</font></p>
            </a>
        </div>
    </div>
</body>
</html>