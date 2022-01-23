@extends('layouts.app')

@section('title', 'Update Medication')

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
                    <h1>Edit Medication</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Medication Details</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manage-medication.update', $medication->medication_id) }}" method="post" id="update-medication-form">
                            @csrf
                            <div class="form-group">
                                <label for="patientName">Name</label>
                                <input type="text" name="name" value="{{ $medication->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="patientName">Brand</label>
                                <input type="text" name="brand" value="{{ $medication->brand }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="patientName">Type</label>
                                <input type="text" name="type" value="{{ $medication->type }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="patientName">Price</label>
                                <input type="number" name="price" value="{{ $medication->price }}" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <a href="{{ route('manage-medication.view', $medication->medication_id) }}" class="btn btn-secondary">Back</a>
                                <button type="button" onclick="event.preventDefault(); document.getElementById('update-medication-form').submit()" class="btn btn-warning">Submit</button>
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


