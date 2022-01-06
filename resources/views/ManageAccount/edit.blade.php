@extends('layouts.app')

@section('title', 'Update Account')

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
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manage-account.update', $user->user_id) }}" method="post" id="update-account-form">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Staff ID</label>
                                <input type="text" name="staff_id" value="{{ $user_type->staff_id }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="6">{{ $user->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Telephone No</label>
                                <input type="text" name="tel_no" value="{{ $user->tel_no }}" class="form-control">
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <a href="{{ route('manage-account.view') }}" class="btn btn-secondary">Back</a>
                                <button type="button" onclick="event.preventDefault(); document.getElementById('update-account-form').submit()" class="btn btn-warning">Submit</button>
                            </div>
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


