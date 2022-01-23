@extends('layouts.app')

@section('title', 'Update Prescription')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Prescription</h1>
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
                        <form action="{{ route('manage-prescription.update', $prescription->prescription_id) }}" method="post" id="create-prescription-form">
                            @csrf
                            <div class="form-group">
                                <label for="patientName">Prescription</label>
                                <textarea name="comment" rows="6" class="form-control">{{ $prescription->comment }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Minimal</label>
                                <select id="select-medication" class="form-control" style="width: 100%;">
                                    <option value="default" selected="selected">-- Choose Medication --</option>
                                    @foreach($medications as $medication)
                                        <option value="{{ $medication->medication_id }}">{{ $medication->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 5%">
                                        Medication name
                                    </th>
                                    <th class="text-center" style="width: 1%">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>

                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <a href="{{ route('manage-prescription.index', $prescription->prescription_id) }}" class="btn btn-secondary">Back</a>
                                <button type="button" onclick="event.preventDefault(); document.getElementById('create-prescription-form').submit()" class="btn btn-success">Submit</button>
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

    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {

            $('#select-medication').select2({
                theme: 'bootstrap4'
            })

            $('#select-medication').change(function () {

                if ($(this).val() !== 'default') {
                    var selected_med = $('#select-medication option:selected');
                    var value = selected_med.val();
                    var text = selected_med.text();

                    appendRow(value, text);
                }
            });
        })

        function appendRow(value,text) {
            $('#tbody').append(`
                <tr>
                    <td>
                        <p>${text}</p>
                        <input type="hidden" name="medication_id[]" value="${value}">
                    </td>
                    <td class="text-center">
                        <button class="btn btn-danger remove"
                        type="button" onclick="this.closest('tr').remove()">Remove</button>
                    </td>
                </tr>
            `);
        }
    </script>
@endsection


