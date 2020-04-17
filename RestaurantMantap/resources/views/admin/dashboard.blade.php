@extends('layouts.app')

@section('title','Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($favoritemenu as $key)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <img class="img-responsive img-thumbnail" src="{{ asset('uploads/menu/'.$key->image) }}" style="height: 100px; width: 100px" alt="">
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
                                        <td><a href="" class="btn btn-info btn-sm"><i class="material-icons">remove_red_eye</i></a></td>
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
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush