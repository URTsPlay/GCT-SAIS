<div class="modal fade" id="view_subjects_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Subjects for <span id="fullname"></span></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Subjects</th>
            </tr>
          </thead>
          <tbody id="subject_list">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>


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
                <select class="form-control" name="edit_student_isscholar" id="edit_student_isscholar" required>
                  <option value="">Select if scholar</option>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
              </div>
              <div class="d-none">
                <div class="col-md-12">
                  <select select class="form-control" name="edit_student_sholarship_type" id="edit_student_sholarship_type" required>
                    <option value="">Select scholarship type</option>
                    <?php
                      $get_scholarship_type=retrieve("SELECT * FROM scholarship",array());
                      for ($i=0; $i < COUNT($get_scholarship_type); $i++) { 
                        echo "<option value='".$get_scholarship_type[$i]['id']."'>".$get_scholarship_type[$i]['scholarship_name']."</option>";
                      }
                    ?>
                  </select>
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

<!--Edit Courses-->
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
            <button type="submit" class="btn btn-primary btn-sm" name="save_course">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Edit assessment-->
<div class="modal fade" id="edit_assessment_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Edit Assessments</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="edit_assessment_id" id="edit_assessment_id" hidden>
              <div class="col-md-12">

                <small class="grey-text mt-2">Student Name</small>
                <select class="form-control" name="edit_assessment_student_id" id="edit_assessment_student_id">
                  <option value="">Select Student</option>
                  <?php
                    $getStudents = retrieve("SELECT * FROM students",array());
                    for ($i=0; $i < COUNT($getStudents); $i++) { 
                      echo "<option value='".$getStudents[$i]['id']."'>".$getStudents[$i]['lastname'].", ".$getStudents[$i]['firstname']."</option>";
                    }
                  ?>
                </select>

                <small class="grey-text mt-2">Registration/Gen. Fee</small>
                <input class="form-control" type="text" name="edit_assessment_reg_gen_fee" id="edit_assessment_reg_gen_fee">

                <small class="grey-text mt-2">Laboratory Fee</small>
                <input class="form-control" type="text" name="edit_assessment_lab_fee" id="edit_assessment_lab_fee">

                <small class="grey-text mt-2">NSTP Fee</small>
                <input class="form-control" type="text" name="edit_assessment_nstp_fee" id="edit_assessment_nstp_fee">

                <small class="grey-text mt-2">Sub Total</small>
                <input class="up_date_sub_total_div ml-3" type="text" id="update_sub_total" name="update_sub_total" readonly>

                <small class="grey-text mt-2">Tuition Fee</small>
                <input class="form-control" type="text" name="edit_assessment_tuition_fee" id="edit_assessment_tuition_fee">

                <small class="grey-text mt-2">Total</small>
                <input class="update_total_div ml-3" type="text" id="update_total_fee" name="update_total_fee" readonly>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save_assessment">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Proceed to Payment-->
<div class="modal fade" id="payments_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Pay</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="pay_assessment_id" id="pay_assessment_id" hidden>
              <h6 class="ml-auto mr-auto">OR Number: <span id="disp_or_number"></span></h6>
              <div class="col-md-12">
                <small class="grey-text mt-2">Payment Method</small>
                <select class="form-control" name="payment_method" id="payment_method" required>
                  <option value=""></option>
                  <option value="1">Down Payment</option>
                  <option value="2">Full Payment</option>
                </select>
              </div>
              <div class="col-md-12">
                <small class="grey-text mt-2">Amount</small>
                <input class="form-control" type="text" name="payment_amount" id="payment_amount" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save_payment">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Proceed to Payment-->
<div class="modal fade" id="exam_payments_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Pay Examination</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="pay_exam_id" id="pay_exam_id" hidden>
              <h6 class="ml-auto mr-auto">OR Number: <span id="exam_disp_or_number"></span></h6>
              <input type="text" name="exam_tuition_fee" id="exam_tuition_fee" hidden>
              <input type="text" name="exam_balance" id="exam_balance" hidden>
              <input type="text" name="prelim_exam" id="prelim_exam" hidden>
              <div class="col-md-12">
                <small class="grey-text mt-2">Exam Type</small>
                <select class="form-control" name="exam_type" id="exam_type" required>
                  <option value=""></option>
                  <option value="Prelim">Prelim</option>
                  <option value="Midterm">Midterm</option>
                  <option value="Pre-Final">Pre-Final</option>
                  <option value="Final">Final</option>
                </select>
              </div>
              <div class="col-md-12">
                <label for="prelim_exam">Sub Total</label>
                <input class="prelim_exam_div ml-3" type="text" id="prelim_exam" name="prelim_exam" readonly>
              </div>
              <div class="col-md-12">
                <small class="grey-text mt-2">Amount</small>
                <input class="form-control" type="text" name="exam_payment_amount" id="exam_payment_amount" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save_exam_pay">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Show Password-->
<div class="modal fade" id="show_password_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Show Password</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mt-3">
          <input type="text" name="show_pass_id" id="show_pass_id" hidden>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="showPass">
            <label class="form-check-label" for="showPass">Show Password</label>
          </div>
          <div class="col-md-12">
            <input class="form-control" type="password" name="show_password" id="show_password">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="edit_user_control_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header primary-color text-white">
        <h5 class="modal-title w-100 text-white">Edit User Control</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="row mt-3">
              <input type="text" name="edit_user_control_id" id="edit_user_control_id" hidden>
              <input type="text" name="fullname" id="fullname" hidden>
              <h6 class="mr-auto ml-auto">Name: <span id="admin_name"></span></h6>
              <div class="col-md-12">
                 <?php
                    $get_user_control=array("Generate Assessment"=>"generate_assessment","Manage Students"=>"manage_students","Add Personnel"=>"add_personnel");
                    foreach ($get_user_control as $uc_key => $uc_value) {
                        echo "
                          <div class='md-form row'>
                            <label for='".$uc_value."'>".$uc_key."</label>
                            <div class='col-sm-10'>
                              <select class='mdb-select' name='".$uc_value."' id='".$uc_value."'>
                                <option value=''></option>
                                <option value='1'>Yes</option>
                                <option value='0'>No</option>
                              </select>
                            </div>
                          </div>";
                      }
                 ?>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="save_user_control">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal" title="Close">Close</button>
      </div>
    </div>
  </div>
</div>