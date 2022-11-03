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

<div class="modal fade" id="edit_subjects_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Edit Subject</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="edit_subjects_id" id="edit_subjects_id" hidden>
              <div class="col-md-12">
                <small class="grey-text mt-2">Subject</small>
                <input class="form-control" type="text" name="edit_subjects_sub_name" id="edit_subjects_sub_name">

                <small class="grey-text mt-2">Units</small>
                <input class="form-control" type="number" name="edit_subjects_sub_units" id="edit_subjects_sub_units">

                <small class="grey-text mt-2">Lecture Hours</small>
                <input class="form-control" type="number" name="edit_subjects_sub_lec_hours" id="edit_subjects_sub_lec_hours">

                <small class="grey-text mt-2">Laboratory Hours</small>
                <input class="form-control" type="number" name="edit_subjects_sub_lab_hours" id="edit_subjects_sub_lab_hours">
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save_subject">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_courses_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Edit Subject</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="edit_courses_id" id="edit_courses_id" hidden>
              <div class="col-md-12">
                <small class="grey-text mt-2">Course Code</small>
                <input class="form-control" type="text" name="edit_courses_code" id="edit_courses_code">

                <small class="grey-text mt-2">Course Name</small>
                <input class="form-control" type="text" name="edit_courses_name" id="edit_courses_name">

              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save_subject">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>