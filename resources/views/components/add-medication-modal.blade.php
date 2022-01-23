<div class="modal fade" id="add-medication-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Medication</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('manage-medication.store') }}" method="post" id="add-medication-form">
                    @csrf
                    <div class="form-group">
                        <label for="patientName">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="patientName">Brand</label>
                        <input type="text" name="brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="patientName">Type</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="patientName">Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('add-medication-form').submit()">Submit</button>
            </div>
        </div>
    </div>
</div>
