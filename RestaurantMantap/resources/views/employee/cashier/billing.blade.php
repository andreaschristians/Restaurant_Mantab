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
      .bill-table{
        width: 80%; 
        height: 500px;
        background-color: rgba(0,0,0,0.07); 
        margin: auto; 
        margin-top: 6%;
        padding-top: 1%;
        border-radius: 10px;
        opacity: 90%;
      }
      .bill-table-show{
        width: 80%;
        height: 420px;
        padding-top: 1%;
        padding-right: 3%;
        background-color: white;
        border-radius: 10px;
        margin: auto;
      }
      .table{
        width: 7%;
        height: 70px;
        background-color: red;
        margin-top: 1.5%;
        margin-left: 5%;
        margin-bottom: 3%;
        display: inline-block;
      }
      .sel-table{
        margin: 0;
        margin-left: 10%;
        padding: 0;
        font-style: italic;
        font-weight: bold;
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
            <a href="{{ route('employee.cashier.maincashier') }}">
                <img src="{{ asset('frontend/images/back_arrow.png') }}" style="width: 50px;height: 50px;margin-left: 2200%;">
            </a>
            <form id="logout-form" method="POST" action="{{ route('signout') }}" style="display: none">
                @csrf
            </form>
          </li>
        </ul>
    </nav>
    
    <div class="bill-table" >
      <p class="sel-table">Select Table</p>
      <div class="bill-table-show">
          <a href="{{ route('employee.cashier.closebill') }}">
            <div class="table">
            </div>
          </a>
      </div>
    </div>
</body>
</html>