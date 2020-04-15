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
  		.table-list{
  			width: 80%; 
  			height: 500px;
  			background-color: #ffc107; 
  			margin: auto; 
  			margin-top: 5px;
  			border-radius: 10px;
  			opacity: 90%;
  		}
  		.table-sec-1{
  			width: 100%;
  			height: 155px;
  			border-top-right-radius: 10px;
  			border-top-left-radius: 10px;
  			padding-top: 25px;
  		}
  		.table-sec-2{
			width: 100%;
  			height: 190px;
  			padding-top: 45px;
  			padding-left: 220px;
  		}
  		.table-sec-3{
			width: 100%;
  			height: 155px;
  			padding-top: 25px;
  			border-bottom-right-radius: 10px;
  			border-bottom-left-radius: 10px;
  		}
  		.table1{
  			width: 100px;
  			height: 100px;
  			margin-left: 85px;
  			border-radius: 40%;
  			display: inline-block;

  		}
  		.table2{
			width: 170px;
  			height: 100px;
  			margin-right: 130px;
  			border-radius: 10%;
  			display: inline-block;
  		}
  		.table3{
			width: 100px;
  			height: 100px;
  			margin-left: 85px;
  			border-radius: 40%;
  			display: inline-block;
  		}
  		.table1, .table2, .table3{
  			background-color: white;
  		}
  		.aval, .used, .rsvd{
  			width: 20px;
  			height: 20px;
  			margin-right: : 20px;
  			border-radius: 40%;
  			display: inline-block;
  		}
  		.legend{
  			margin-left: 1120px;
  			margin-top: 69px;
  		}
  		.info-legend{
  			margin: 0;
  			display: inline-block;
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
			   	<a href="/waiter">
			      	<img src="{{ asset('frontend/images/back_arrow.png') }}"
			      	style="width: 50px;height: 50px;margin-left: 850px;">
			    </a>
		   </li>
		 </ul>
		</nav>

		<div class="legend">
			<p class="info-legend">Available</p>
			<div class="aval" style="background-color: green;"></div>
			<p class="info-legend">Used</p>
			<div class="used" style="background-color: red;"></div>
			<p class="info-legend">Reserved</p>
			<div class="rsvd" style="background-color: grey;"></div>
		</div>
		<div class="table-list" >
			<div class="table-sec-1">
				<div class="table1">
					
				</div>
			</div>

			<div class="table-sec-2">
				<div class="table2">
					
				</div>
			</div>

			<div class="table-sec-3">
				<div class="table3">
					
				</div>
			</div>
		</div>


	</body>
</html>