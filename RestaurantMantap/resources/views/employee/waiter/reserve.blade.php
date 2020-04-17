<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reserve</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <style>
        .table-list{
            width: 80%; 
            height: 500px;
            background-color: rgba(0,0,0,0.07); 
            margin: auto; 
            margin-top: 5px;
            padding-top: 45px;
            border-radius: 10px;
            opacity: 90%;
            overflow: hidden;
        }
        #box {
            position : relative;
            width: 850px;
            height: 400px;
            border: 1px solid #636363;
            border-radius: 10px;
            background-color: #ffc107;
            margin-left: 45px;
            overflow: auto;
            display: inline-block;
        } 
        #box div[id*="table"] {
            position : absolute;
            width : 130px;
            height : 80px;
            z-index: 9;
            vertical-align: middle;
            text-align: center;
            line-height: 53px;  
            font-size: 30;
            border: 1px solid #636363;
            padding: 10px;
            z-index: 10;
            color: #fff;
            border-radius: 10px;
        }
        #form-info{
            width: 280px;
            height: 400px;
            background-color: #ffc107;
            border: 1px solid #636363;
            display: inline-block;
            margin-left: 15px;
            border-radius: 10px;
            vertical-align: top;
            padding-top: 20px;
            padding-left: 10px;
        }
        #side-form{
            vertical-align: top;
            display: inline-block;
        }
        .aval, .used, .rsvd{
            width: 20px;
            height: 20px;
            margin-right: 20px;
            border-radius: 40%;
            display: inline-block;
        }
        .legend{
            margin-left: 1090px;
            margin-top: 40px;
        }
        .info-legend{
            margin: 0;
            display: inline-block;
        }
        #form-input-info{
            border: 1px solid #636363;
            border-radius: 3px;
            margin-bottom: 5px;
            padding: 2px;
            color: black;
            background-color: #e6e6e6;
        }
        #form-input-title{
            padding: 0;
            margin: 0;
            margin-bottom: 5px;
        }
        #submit-info{
            width: 100px;
            margin-top: 210px;
            border-radius: 5px;
            border: 1px solid #636363;
        }
        input{
            width: 250px;
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
        ::placeholder {
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
                <a href="/employee/waiter/mainwaiter">
                    <img src="{{ asset('frontend/images/back_arrow.png') }}" style="width: 50px;height: 50px;margin-left: 1600%;">
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
        <div id="box">
            @foreach($tables as $key=>$table)
                <a id="a-{{ $table->number }}"><div id="table-{{ $table->number }}" onclick="selectTable({{ $table->number }})" style="opacity: 0.5"> {{ $table->number }} </div></a>
            @endforeach
        </div>

        <form id="side-form" method="post" action="{{ route('employee.waiter.reservestore') }}">
            @csrf
            <div id="form-info">
                <p id="form-input-title">Input Name</p>
                <input type="text" id="form-input-info" name="name" placeholder="Name">
                
                <p id="form-input-title">Input Date</p>
                <input type="datetime-local" id="form-input-info" name="date_and_time">
                <input type="hidden" id="tablenumber" name="table_number">
                
                <button type="submit" id="submit-info" class="btn btn-primary">Reserve</button>
            </div>
        </form>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.5.2rc1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
        
        var tables = <?php echo json_encode($tables); ?>;
        
        tables.forEach(function(table){
            var id = "table-" + table.number;
            var id_a = "a-" + table.number
            //table color
            if (table.status == "Empty") {
                document.getElementById(id).style.background = "#2d9e2f";
            } else if (table.status == "Reserved") {
                document.getElementById(id).style.background = "#8d8d8d";
                document.getElementById(id_a).removeAttribute("href");
                document.getElementById(id).removeAttribute("onclick");
            } else {
                document.getElementById(id).style.background = "#a60b00";
                document.getElementById(id_a).removeAttribute("href");
                document.getElementById(id).removeAttribute("onclick");
            }

            position(id, table.position_x, table.position_y);
        });
        
        //Table Position
        function position(elmnt, pos_x, pos_y){
            document.getElementById(elmnt).style.top = (pos_x+"px"); //y axis
            document.getElementById(elmnt).style.left = (pos_y+"px"); //x axis
        }
        
        function selectTable(number) {
            document.getElementById("tablenumber").value = number;
            var id = document.getElementById("table-" + number);
            
            if (id.style.opacity == 0.5) {
                id.style.opacity=1;
                
                tables.forEach(function(table){
                    if (table.number != number) {
                        document.getElementById("table-" + table.number).style.pointerEvents = 'none';
                    }
                });
            } else if (id.style.opacity == 1){
                id.style.opacity=0.5;
                
                tables.forEach(function(table){
                    if (table.number != number) {
                        document.getElementById("table-" + table.number).style.pointerEvents = 'auto';
                    }
                });
            }
        }
    </script>
</body>
</html>