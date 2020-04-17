<!DOCTYPE html>
<html lang="en">
<head>
  <title>Billing</title>
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
      #box {
          position: relative;
          margin: auto;
          width: 80%;
          height: 400px;
/*          border: 2px solid #ffc107;*/
        }

      #box div[id*="table"] {
          position : absolute;
          width : 130px;
          height : 80px;
          z-index: 9;
          background-color: #f1f1f1;
          vertical-align: middle;
          text-align: center;
          line-height: 53px;  
          font-size: 30;
          border: 1px solid #d3d3d3;
          padding: 10px;
          z-index: 10;
          color: #fff;
          border-radius: 10px;
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-warning navbar-dark" style="height: 100px; width: 100%; padding-top: 5.5%" >
        <ul class="navbar-nav" style="margin-left: 16.2%;margin-top: 0.5%">
            <li class="nav-item">
                <img src="{{ asset('frontend/images/avatar.png') }}"class="mr-3 mt-3 rounded-circle" style="width:100px;position: relative;">
            </li>
            <li class="nav-item">
                <ul class="nav flex-column" style="margin-top: 50%">
                    <li class="nav-item">
                        <p class="font-weight-regular"><font size="4">
                          {{ Auth::guard('employee')->user()->name }}
                        </p>
                    </li>
                    <li class="nav-item">
                        <p class="font-weight-regular"><font size="4">
                          {{ Auth::guard('employee')->user()->job }}
                        </p>
                    </li>
                </ul>
            </li>
          <li class="nav-item">
            <a href="{{ route('employee.cashier.maincashier') }}">
                <img src="{{ asset('frontend/images/back_arrow.png') }}" style="width: 50px;height: 50px;margin-left: 1700%;">
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
          <div id="box">
            @foreach($orders as $key=>$order)
               @foreach($tables as $key=>$table)
                  <a id="a-{{ $table->number }}" href ="{{ route('employee.cashier.closebill', [$table->number])}}">
                    <div id="table-{{ $table->number }}" onclick="selectTable({ $key })"> {{ $table->number }} </div>
                  </a>
               @endforeach
            @endforeach
          </div>
      </div>
    </div>


 <script>

    var tables = <?php echo json_encode($tables); ?>;
    
    tables.forEach(function(table){
        var id = "table-" + table.number;
        var id_a = "a-" + table.number
        //table color
        if (table.status == "Empty") {
            document.getElementById(id).style.background = "#2d9e2f";
        } else if (table.status == "Reserved") {
            document.getElementById(id).style.background = "#8d8d8d";
        } else {
            document.getElementById(id).style.background = "#a60b00";
        }

        position(id, table.position_x, table.position_y);
    });

    //Table Position
    function position(elmnt, pos_x, pos_y){
        document.getElementById(elmnt).style.top = (pos_x+"px"); //y axis
        document.getElementById(elmnt).style.left = (pos_y+"px"); //x axis
    }
    
    // Click table
    // function selectTable(arrnumber) {
    //     if (tables[arrnumber].status == "Empty") {
            
    //     } else {
            
    //     }
    // }

  </script>
</body>
</html>