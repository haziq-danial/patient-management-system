@extends('layouts.app')

@section('title', 'All Prescriptions')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Prescriptions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('manage-prescription.create', $patient_id) }}" class="btn btn-block btn-success">
                                <i class="fa fa-plus"></i>
                                Add Prescription
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Prescription</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 5%">
                            Name
                        </th>
                        <th class="text-center" style="width: 1%">
                            Prescribe by :
                        </th>
                        <th class="text-center" style="width: 1%">
                            Comment
                        </th>
                        <th style="width: 2%" class="text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prescriptions as $prescription)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $prescription->patient->name }}</td>
                            <td class="text-center">{{ $prescription->assignee->name }}</td>
                            <td class="text-center">{{ $prescription->comment }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Action</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('manage-prescription.show', $prescription->prescription_id) }}">View</a>
                                        <a class="dropdown-item" href="{{ route('manage-prescription.edit', $prescription->prescription_id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('manage-prescription.destroy', $prescription->prescription_id) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection


