@extends('layouts.app')

@section('title', 'Patient Details')

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
                    <h1>Patient Details</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label>Name</label>
                            <p>{{ $patient->name }}</p>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <p>{{ $patient->email }}</p>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <p>{{ $patient->address }}</p>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <p>{{ $patient->age }}</p>
                        </div>
                        <div class="form-group">
                            <label>Complication</label>
                            <p>{{ $patient->complication }}</p>
                        </div>
                        <div class="form-group">
                            <label>Allergy</label>
                            <p>{{ $patient->allergy }}</p>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <a href="{{ route('manage-patient.edit', $patient->patient_id) }}" class="btn btn-warning">Edit Patient</a>
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


