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
      .input-cash{
        width: 10%;
        height: 400px;
        background-color: white;
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
      #food{
        padding-right: 400px;
        border-right: 2px solid #ddd;
      }
      #qty{
        padding-right: 20px;
        padding-left: 10px;
        border-right: 2px solid #ddd;
      }
      #price{
        padding-right: 100px;
        padding-left: 10px;
        border-right: 2px solid #ddd;
      }
      #total{
        padding-right: 100px;
        padding-left: 10px;

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
            <a href="{{ route('employee.cashier.paytable') }}">
                <img src="{{ asset('frontend/images/back_arrow.png') }}" style="width: 50px;height: 50px;margin-left: 2200%;">
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

            <?php
              for ($i = 1; $i <= 10; $i++) {
                echo '
                <tr>
                  <td id="food">1. Asparagus</td>
                  <td id="qty">1x</td>
                  <td id="price">$100</td>
                  <td id="total">$100</td>
                </tr>
                ';
              }
            ?>

          </table>
          </div>

          <div class="total">
            <button>Print</button>
          </div>

      </div>
    
      <div class="input-cash">
        

      </div>
    </div>
</body>
</html>