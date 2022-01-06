@extends('layouts.app')

@section('title', 'Account Profile')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Profile</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Profile details</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Account Type</label>
                            <p>{{ class_basename(get_class($user_type)) }}</p>
                        </div>
                        <div class="form-group">
                            <label>Staff ID</label>
                            <p>{{ $user_type->staff_id }}</p>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <p>{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <a href="{{ route('manage-account.edit') }}" class="btn btn-warning">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection


