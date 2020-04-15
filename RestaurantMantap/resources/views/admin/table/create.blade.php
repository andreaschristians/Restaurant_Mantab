@extends('layouts.app')

@section('title','Create')

@push('css')

@endpush

@section('content')
    <div class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Add New Table</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{ route('table.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <input type="text" class="form-control" name="status">
                                            <input type="hidden" class="form-control" name="position_x" value="0">
                                            <input type="hidden" class="form-control" name="position_y" value="0">
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('table.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush