@extends('layouts.app')

@section('title','Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

<style>

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
      width: 80%;
    }

    /* The Close Button */
    span[class*="closeBtn"] {
      color: #e53935;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    a[id*="detailBtn"] {
        cursor: pointer;
    }
    
    span[class*="closeBtn"]:hover,
    span[class*="closeBtn"]:focus {
      color: #0069d9;
      cursor: pointer;
    }
</style>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($favoritemenu as $key)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <img class="img-responsive img-thumbnail" src="{{ asset('uploads/menu/'.$key->image) }}" style="height: 56px; width: 56px" alt="">
                        </div>
                        <div class="card-content">
                            <p class="category">Favorite Menu</p>
                            <h3 class="title">{{ $key->name }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">info_outline</i>
                                <a href="#pablo">Total order this month : {{ $favoritecount }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">chrome_reader_mode</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Reservation</p>
                            <h3 class="title">{{ $reservations->count() }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> <a href="{{ route('reservation.index') }}">Total ongoing reservations</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Reports</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th style="display: none;"></th>
                                </thead>
                                <tbody>
                                @foreach($bills as $key=>$bill)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $bill->order->employee->name }}</td>
                                        <td>{{ $bill->created_at }}</td>
                                        <td>Rp {{ $bill->charge }}</td>
                                        <td><a id="detailBtn-{{$bill->id}}"><i class="material-icons">remove_red_eyes</i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @foreach($bills as $bill)
    <!--PopUp-->
    <!-- The Modal -->
    <div id="myModal-{{$bill->id}}" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="closeBtn-{{$bill->id}}">&times;</span>
            <div class="card-content table-responsive">
                <table id="table" class="table"  cellspacing="0" width="100%">
                    <thead class="text-primary">
                    <th>ID</th>
                    <th>Menu</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    </thead>
                    <tbody>
                        <?php $count=1 ?>
                        @foreach($ordermenus as $ordermenu)
                            @if(($bill->order_id) == ($ordermenu->order_id))
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{ $ordermenu->menu->name }}</td>
                                <td>{{ $ordermenu->quantity }}</td>
                                <td>Rp {{ $ordermenu->menu->price }}</td>
                            </tr>
                            <?php $count++?>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
        
        //PopUp
        var bills = <?php echo json_encode($bills); ?>;
        bills.forEach(function(bill){
            // Get the modal
            var modal = document.getElementById(("myModal-" + bill.id));
            // Get the button that opens the modal
            var btn = document.getElementById(("detailBtn-" + bill.id));
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName(("closeBtn-" + bill.id))[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            // When the user clicks anywhere outside of the modal, close it
//            window.onclick = function(event) {
//              if (event.target == modal) {
//                modal.style.display = "none";
//                console.log("test");
//              }
//            }
        });
    </script>
@endpush