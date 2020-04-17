<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order</title>
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
  			width: 150px;
  			height: 120px;
  			margin: auto;
                        margin-top: 10px;
                        display: block;
  			background-color: white;
                        border: 5px solid white;
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

  		.search {
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
		.search:focus {
		  width: 120%;
		}
                .foodqty{
                        background-color: #e0a904;
                        width: 60px;
                        border: 0px solid #ccc;
                        border-radius: 6px;
                        -webkit-transition: width 0.4s ease-in-out;
                        
                        padding: 10px;
                        text-align: center;
                        display: inline-block;
                        margin: 4px 2px;
                        cursor: pointer;
  		}
                .foodqty:focus {
                        width: 50%;
		}
                
                #saveOrderBtn {
                    background-color: #ffc107;
                    margin-left: 85%;
                    margin-top: 10px;
                    border-radius: 10px;
                    border: none;
                    color: black;
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

    <div class="nav-search">
        <ul class="menu-type">
            <li class="menu-type-list"><a href="#">All</a></li>
            @foreach($categories as $category)
                <li class="menu-type-list"><a href="#">{{ $category->name }}</a></li>
            @endforeach
            <li class="menu-type-list"><a href="#">
                    <form action="#" method="#">
                        <input class="search" type="text" name="search" placeholder="  Search . . .">
                    </form>
                </a>
            </li>
        </ul>
    </div>

    <div class="menu-list" style="overflow:auto;">
        @foreach($menus as $menu)
            <div class="menu" >
                <img class="food-image" src="{{ asset('uploads/menu/'.$menu->image) }}">
                <p class="food-info"> {{ $menu->name }} <br>IDR {{ $menu->price }}</br ></p>
                <div class="food-info"><input class="foodqty" type="text" id="menuqtyinput-{{ $menu->id }}" value="0" onChange="changeValue({{ $menu->id }})"></a></div>
            </div>
        @endforeach
    </div>
    
    <form method="POST" action="{{ route('employee.waiter.ordermenu') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order }}">
        @foreach($menus as $menu)
            <input type="hidden" id="menuid-{{ $menu->id }}" name="id[]" value="{{ $menu->id }}">
            <input type="hidden" id="menuqty-{{ $menu->id }}" name="qty[]" value="0">
        @endforeach
        <button type="submit" id="saveOrderBtn" class="btn btn-primary">Save</button>
    </form>
    
    <script>
        var ordermenus = <?php echo json_encode($ordermenus); ?>;
        ordermenus.forEach(function(ordermenu){
            var menuqty = "menuqty-" + ordermenu.menu_id;
            var menuqtyinput = "menuqtyinput-" + ordermenu.menu_id;
            document.getElementById(menuqty).value = ordermenu.quantity;
            document.getElementById(menuqtyinput).value = ordermenu.quantity;
        });
        
        function changeValue(id) {
            var menuqty = "menuqty-" + id;
            var menuqtyinput = "menuqtyinput-" + id;
            
            document.getElementById(menuqty).value = document.getElementById(menuqtyinput).value;
            console.log(document.getElementById(menuqty).value);
        }
    </script>
</body>
</html>