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
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="edit_student_isscholar"  id="edit_student_isscholar">
                  <label class="custom-control-label" for="edit_student_isscholar">Is Scholar?</label>
                </div>
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