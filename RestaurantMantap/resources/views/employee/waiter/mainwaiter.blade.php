<!DOCTYPE html>
<html lang="en">
<head>
	<title>Waiter</title>
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
  			margin-top: 75px;
  			padding-top: 50px;
  			border-radius: 10px;
  			opacity: 90%;
  		}
  		.choose1{
  			float: left;
  			margin-left: 270px;
          }
  		.choose2{
  			float: left;
  			margin-left: 100px;
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
            <a href="{{ route('signout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <img src="{{ asset('frontend/images/back_arrow.png') }}" style="width: 50px;height: 50px;margin-left: 950px;">
            </a>
            <form id="logout-form" method="POST" action="{{ route('signout') }}" style="display: none">
                @csrf
            </form>
          </li>
        </ul>
    </nav>
    
    <div class="main-choose" >
        <div class="choose1">
            <a href="{{ route('employee.waiter.choosetable') }}">
                <img src="{{ asset('frontend/images/Order.png') }}" style="width: 345px;height: 350px;">
                <p class="text-choose" style="margin-top: 20px; color: black"><font size="5">Order</font></p>
            </a>
        </div>
        <div class="choose2">
            <a href="{{ route('employee.waiter.reserve') }}">
                <img src="{{ asset('frontend/images/Reserve.png') }}" style="width: 340px;height: 345px;">
                <p class="text-choose" style="margin-top: 20px; color: black"><font size="5">Reserve</font></p>
            </a>
        </div>
    </div>
</body>
</html>