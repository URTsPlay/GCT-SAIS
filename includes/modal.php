<div class="modal fade" id="edit_student_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Edit Student</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="edit_student_id" id="edit_student_id" hidden>
              <div class="col-md-12">
                <small class="form-text text-black mb-2 mt-0">School ID</small>
                <input type="text" name="edit_student_schoolid" id="edit_student_schoolid" class="form-control">
              </div>
              <div class="col-md-12">
                <small class="form-text text-black mb-2 mt-0">Last Name</small>
                <input type="text" name="edit_student_lastname" id="edit_student_lastname" class="form-control">
              </div>
              <div class="col-md-12">
                <small class="form-text text-black mb-2 mt-0">Middle Name</small>
                <input type="text" name="edit_student_middlename" id="edit_student_middlename" class="form-control">
              </div>
              <div class="col-md-12">
                <small class="form-text text-black mb-2 mt-0">First Name</small>
                <input type="text" name="edit_student_firstname" id="edit_student_firstname" class="form-control">
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save_student">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>