@extends('layouts.app')

@section('title', 'Add Prescription')

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
                    <h1>Add Prescription</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Prescription Details for {{ $prescription->patient->name }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="patientName">Prescription</label>
                            <p>{{ $prescription->comment }}</p>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 2%">
                                    Medication name
                                </th>
                                <th class="text-center" style="width: 2%">
                                    Type
                                </th>
                                <th class="text-center" style="width: 1%">
                                    Price
                                </th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach($medications as $med)
                                    <tr>
                                        <td>
                                            <p>{{ $med->name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p>{{ $med->type }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p>{{ $med->price }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <a href="{{ route('manage-prescription.index', $prescription->patient_id) }}" class="btn btn-secondary">Back</a>
                                <a href="{{ route('manage-prescription.edit', $prescription->prescription_id) }}" class="btn btn-warning">Edit</a>
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


