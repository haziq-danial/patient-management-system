<div class="modal fade" id="add-patient-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Patient</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('manage-patient.store') }}" method="post" id="add-patient-form">
                    @csrf
                    <div class="form-group">
                        <label for="patientName">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="patientEmail">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="patientAddress">Address</label>
                        <textarea name="address" rows="6" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="patientAge">Age</label>
                        <input type="number" name="age" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="patientComplication">Complication</label>
                        <textarea name="complication" rows="6" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="patientLabel">Allergy</label>
                        <textarea name="allergy" rows="6" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('add-patient-form').submit()">Submit</button>
            </div>
        </div>
    </div>
</div>
