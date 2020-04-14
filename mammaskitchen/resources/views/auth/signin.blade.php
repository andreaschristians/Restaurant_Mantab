@extends('layouts.app')

@section('title','Signin')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Sign In</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{ route('signin') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn.btn-primary,
        .navbar .navbar-nav>li>a.btn.btn-primary {
            box-shadow: 0 2px 2px 0 rgba(255, 152, 56, 0.14), 0 3px 1px -2px rgba(255, 152, 56, 0.2), 0 1px 5px 0 rgba(255, 152, 56, 0.12);
        }

        .btn.btn-primary,
        .btn.btn-primary:hover,
        .btn.btn-primary:focus,
        .btn.btn-primary:active,
        .btn.btn-primary.active,
        .btn.btn-primary:active:focus,
        .btn.btn-primary:active:hover,
        .btn.btn-primary.active:focus,
        .btn.btn-primary.active:hover,
        .open>.btn.btn-primary.dropdown-toggle,
        .open>.btn.btn-primary.dropdown-toggle:focus,
        .open>.btn.btn-primary.dropdown-toggle:hover,
        .navbar .navbar-nav>li>a.btn.btn-primary,
        .navbar .navbar-nav>li>a.btn.btn-primary:hover,
        .navbar .navbar-nav>li>a.btn.btn-primary:focus,
        .navbar .navbar-nav>li>a.btn.btn-primary:active,
        .navbar .navbar-nav>li>a.btn.btn-primary.active,
        .navbar .navbar-nav>li>a.btn.btn-primary:active:focus,
        .navbar .navbar-nav>li>a.btn.btn-primary:active:hover,
        .navbar .navbar-nav>li>a.btn.btn-primary.active:focus,
        .navbar .navbar-nav>li>a.btn.btn-primary.active:hover,
        .open>.navbar .navbar-nav>li>a.btn.btn-primary.dropdown-toggle,
        .open>.navbar .navbar-nav>li>a.btn.btn-primary.dropdown-toggle:focus,
        .open>.navbar .navbar-nav>li>a.btn.btn-primary.dropdown-toggle:hover {
            background-color: #ff9838;
            color: #FFFFFF;
        }

        .card .card-header .title {
            color: #FFFFFF;
        }

        .btn.btn-primary:focus,
        .btn.btn-primary:active,
        .btn.btn-primary:hover,
        .navbar .navbar-nav>li>a.btn.btn-primary:focus,
        .navbar .navbar-nav>li>a.btn.btn-primary:active,
        .navbar .navbar-nav>li>a.btn.btn-primary:hover {
            box-shadow: 0 14px 26px -12px rgba(255, 152, 56, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(255, 152, 56, 0.2);
        }

        .btn.btn-primary.btn-simple,
        .navbar .navbar-nav>li>a.btn.btn-primary.btn-simple {
            background-color: transparent;
            color: #ff9838;
            box-shadow: none;
        }

        .btn.btn-primary.btn-simple:hover,
        .btn.btn-primary.btn-simple:focus,
        .btn.btn-primary.btn-simple:active,
        .navbar .navbar-nav>li>a.btn.btn-primary.btn-simple:hover,
        .navbar .navbar-nav>li>a.btn.btn-primary.btn-simple:focus,
        .navbar .navbar-nav>li>a.btn.btn-primary.btn-simple:active {
            background-color: transparent;
            color: #ff9838;
        }

        .form-group.is-focused .form-control {
            outline: none;
            background-image: linear-gradient(#ff9838, #ff9838), linear-gradient(#D2D2D2, #D2D2D2);
            background-size: 100% 2px, 100% 1px;
            box-shadow: none;
            transition-duration: 0.3s;
        }

        .form-group.is-focused .form-control .material-input:after {
            background-color: #ff9838;
        }
    </style>
@endsection

@push('scripts')

@endpush