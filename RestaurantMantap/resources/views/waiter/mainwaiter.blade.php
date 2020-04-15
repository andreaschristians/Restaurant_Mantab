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
  			background-color: #ffc107; 
  			margin: auto; 
  			margin-top: 100px;
  			padding-top: 20px;
  			border-radius: 10px;
  			opacity: 90%;
  		}
  		.choose1{
  			float: left;
  			margin-left: 100px;
  		}
  		.choose2{
  			float: left;
  			margin-left: 100px;
  			margin-top: 25px;
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
				      <p class="font-weight-regular"><font size="4">Waiter
				      </font></p>
				    </li>
				    <li class="nav-item">
				      <p class="font-weight-regular"><font size="4">Waiter
				      </font></p>
				    </li>
		    	</ul>
		   </li>
		   <li class="nav-item">
			   	<a href="#">
			      	<img src="{{ asset('frontend/images/back_arrow.png') }}"
			      	style="width: 50px;height: 50px;margin-left: 850px;">
			    </a>
		   </li>
		 </ul>
		</nav>


		<div class="main-choose" >
			<div class="choose1">
				<a href="/order">
					<img src="{{ asset('frontend/images/Order.png') }}"
			      	style="width: 470px;height: 400px;">
			      	<p class="text-choose" style="color: black;"><font size="5">Order</font></p>
			    </a>
			</div>
			<div class="choose2">
				<a href="/reserve">
					<img src="{{ asset('frontend/images/Reserve.png') }}"
			      	style="width: 350px;height: 350px;">
			      	<p class="text-choose" style="margin-top: 20px; color: black"><font size="5">
			      		Reserve</font></p>
			    </a>
			</div>
		</div>
	</body>
</html>