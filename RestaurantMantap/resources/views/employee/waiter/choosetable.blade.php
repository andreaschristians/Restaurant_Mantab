<!DOCTYPE html>
<html lang="en">
<head>
    <title>Waiter/Waitress</title>
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
        #box {
          position: relative;
          margin: auto;
          width: 80%;
          top: 80px;
          height: 400px;
          border: 2px solid #ffc107;
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
            <a href="{{ route('employee.waiter.mainwaiter') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <img src="{{ asset('frontend/images/back_arrow.png') }}" style="width: 50px;height: 50px;margin-left: 950px;">
            </a>
            <form id="logout-form" method="POST" action="{{ route('signout') }}" style="display: none">
                @csrf
            </form>
          </li>
        </ul>
    </nav>
    
    <div id="box">
        @foreach($tables as $key=>$table)
        <a id="a-{{ $table->number }}" href ="{{ route('employee.waiter.ordermenu',$table->number) }}"><div id="table-{{ $table->number }}" onclick="selectTable({ $key })"> {{ $table->number }} </div></a>
        @endforeach
    </div>
</body>
</html>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<script src="http://code.jquery.com/jquery-1.5.2rc1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script>

    var tables = <?php echo json_encode($tables); ?>;
    
    tables.forEach(function(table){
        var id = "table-" + table.number;
        var id_a = "a-" + table.number
        //table color
        if (table.status == "empty") {
            document.getElementById(id).style.background = "#2d9e2f";
        } else if (table.status == "reserved") {
            document.getElementById(id).style.background = "#8d8d8d";
            document.getElementById(id_a).removeAttribute("href");
        } else {
            document.getElementById(id).style.background = "#a60b00";
            document.getElementById(id_a).removeAttribute("href");
        }

        position(id, table.position_x, table.position_y);
    });

    //Table Position
    function position(elmnt, pos_x, pos_y){
        document.getElementById(elmnt).style.top = (pos_x+"px"); //y axis
        document.getElementById(elmnt).style.left = (pos_y+"px"); //x axis
    }
    
    var tables = <?php echo json_encode($tables); ?>;
    //Click table
    function selectTable(arrnumber) {
        if (tables[arrnumber].status == "empty") {
            
        } else {
            console.log("test2");
        }
    }
</script>