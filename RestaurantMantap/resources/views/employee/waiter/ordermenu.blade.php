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
  		.menu-list{
  			width: 80%; 
  			height: 500px;
  			background-color: #ffc107; 
  			margin: auto; 
  			margin-top: 10px;
  			padding-top: 20px;
  			padding-left: 25px;
  			border-radius: 10px;
  			opacity: 90%;
  		}
  		.menu{
  			width: 200px;
  			height: 200px;
  			float: left;
  			margin-left: 30px;
  			margin-top: 20px;
  			background-color: #e0a904;
  			border-radius: 10px;
  		}
  		.food-image{
  			width: 180px;
  			height: 120px;
  			margin: auto;
  			margin-top: 10px;
  			background-color: white;
  			border-radius: 10px;
  		}
  		.food-info{
  			text-align: center;
  			margin-top: 7px;
  		}
  		.nav-search{
  			width: 850px;
  			height: 50px;
  			margin-left: 531px;
  			margin-top: 40px;
  			border-radius: 10px;
  			background-color: #333333;
  		}
  		.menu-type{
  			list-style-type: none;
  			padding-top: 12px;
  		}
  		.menu-type-list{
  			float: left;
  		}
  		.menu-type-list a{
  			display: inline-block;
  			margin-right: 30px;
  			color: white;
  		}
  		.menu-type-list a:hover{
  			color: #e0a904;
  			text-decoration: none;
  		}

  		input[type=text] {
		  width: 150px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  font-size: 16px;
		  padding-left: 10px;
		  color: white;
		  background-color: transparent;
		  -webkit-transition: width 0.4s ease-in-out;
		  transition: width 0.4s ease-in-out;
		}
		input[type=text]:focus {
		  width: 120%;
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

		<div class="nav-search">
			<ul class="menu-type">
		      <li class="menu-type-list"><a href="#">Appetizer</a></li>
		      <li class="menu-type-list"><a href="#">Main Course</a></li>
		      <li class="menu-type-list"><a href="#">Dessert</a></li>
		      <li class="menu-type-list"><a href="#">Snack</a></li>
		      <li class="menu-type-list"><a href="#">Beverage</a></li>
		      <li class="menu-type-list"><a href="#">
				<form action="#" method="#">
		    		<input type="text" name="search" placeholder="  Search . . .">
		   		</form>
		      </a></li>
		    </ul>
		    
		</div>

		<div class="menu-list">
			<div class="menu">
				<div class="food-image">
				</div>
					<p class="food-info"> Nasi <br>2000</br ></p>
			</div>
		</div>
	</body>
</html>