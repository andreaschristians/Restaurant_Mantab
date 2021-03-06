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
        padding-right: 20px;
        padding-left: 20px;
        background-color: white;
        border-radius: 10px;
        margin: auto;
        margin-left: 80px;
        display: inline-block;
      }
      .input-cash{
        width: 20%;
        height: 420px;
        background-color: white;
        display: inline-block;
        border-radius: 10px;
        margin-left: 20px;
        vertical-align: top;
        text-align: center;
      }
      .close-bill{
        margin: 0;
        margin-left: 7%;
        padding: 0;
        font-style: italic;
        font-weight: bold;
      }
      .list-table{
        height: 408px;
        overflow: auto;
      }
      .total{
        width: 100%;
        height: 60px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
      }
      table{
        border-collapse: collapse;
        margin-top: 10px;
      }
      td{
        border-bottom: 2px solid #ddd;
        padding: 3px;
      }
      th{
        padding-bottom: 5px;
      }
      #number{
        border-right: 2px solid #ddd;
      }
      #food{
        padding-left: 10px;
        padding-right: 275px;
        padding-bottom: 10px;
        border-right: 2px solid #ddd;
      }
      #qty{
        padding-right: 20px;
        padding-left: 10px;
        border-right: 2px solid #ddd;
      }
      #price{
        padding-right: 80px;
        padding-left: 10px;
        border-right: 2px solid #ddd;
      }
      #total{
        padding-right: 80px;
        padding-left: 10px;

      }
      #pay{
        margin: 0;
        margin-top: 15px;
      }
      #total-pay{
        margin: 0;
        margin-top: 5px;
      }
      #payment input{
        border-radius: 5px;
        border: 1.5px solid #ddd;
      }
      button{
        background-color: #08b0bd; 
        width: 30%;
        height: 32px;
        border: none;
        color: white;
        margin-left: 1%;
        margin-top: 4%;
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
      button:hover{
        background-color: #0374a8;
      }
      input{
        text-align: center;
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
      
    /* The Modal (background) */
    div[id*="myModal"] {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }

    /* The Close Button */
    span[class*="closeBtn"] {
        color: #e53935;
        float: right;
        font-size: 28px;
        font-weight: bold;
        margin-left: auto;
        line-height: 21px;
    }
    a[id*="detailBtn"] {
        cursor: pointer;
    }
    
    span[class*="closeBtn"]:hover,
    span[class*="closeBtn"]:focus {
        color: #0069d9;
        cursor: pointer;
    }
    #boxhasil {
        font-size: 28px;
        text-align: center;
    }
    </style>
</head>
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
                            <td id="price">IDR&nbsp&nbsp{{ $ordermenu->menu->price }}</td>
                            <td id="total">IDR&nbsp&nbsp{{ ($ordermenu->quantity) * ($ordermenu->menu->price) }}</td>
                            <?php $total += ($ordermenu->quantity) * ($ordermenu->menu->price) ?>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    
        <div class="input-cash">
            <p id="pay">Amount</p>
                @csrf
                <input value=0 id="myInput" type="number" name="inputamount">
                <br>
                <p id="total-pay">Total</p>
                <input type="text" value="{{ $total }}" name="total"readonly>
                <br><br>
                <button id="detailBtn"><b>Pay</b></button>
                <!-- <button type="submit">Print</button> -->
        </div>
    </div>

    <!--PopUp-->
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="closeBtn">&times;</span>
            <div class="card-content table-responsive">
                <p id="boxhasil"></p>
                <form id="payment" method="POST" action="{{ route('employee.cashier.paymentstore') }}">
                    @csrf
                    <input type="hidden" id="amount" name="amount" readonly>
                    <br>
                    <input id="total" type="hidden" value="{{ $total }}" name="total" readonly>
                    <input type="hidden" value="{{ $bill_id }}" name="bill_id">
                    <input type="hidden" value="{{ $order_id }}" name="order_id">
                    <br><br>
                    <button id="submitbutton" type="submit">Print</button>
                </form>
            </div>
        </div>
    </div>

<script>
    
    //PopUp
    // Get the modal
    var modal = document.getElementById(("myModal"));
    // Get the button that opens the modal
    var btn = document.getElementById(("detailBtn"));
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closeBtn")[0];
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        var amountvalue = $("#myInput").val();
        document.getElementById("amount").value = amountvalue;
        if(amountvalue<{{ $total }}){
            document.getElementById("boxhasil").innerHTML = "Uang Kurang "+({{$total}}-amountvalue);
            document.getElementById(("submitbutton")).style.display="none"
        }else{
            document.getElementById("boxhasil").innerHTML = "Kembalian "+(amountvalue-{{$total}});
            document.getElementById(("submitbutton")).style.display="block"
            document.getElementById("submitbutton").innerHTML = "Print";
        }
        modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
//    When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        console.log("test");
      }
    }
    </script>
</html>