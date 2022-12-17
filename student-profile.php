<?php  include("includes/header.php");  ?>
<?php include('includes/navigation.php'); ?>
<?php $page_title="GCT SAIS"; ?>
<?php
    $get_profile=retrieve("SELECT * FROM students WHERE schoolid=?",array($_GET['user']));
    $get_mi=substr($get_profile[0]['middlename'],0,1);
    $name=strtoupper($get_profile[0]['lastname'].", ".$get_profile[0]['firstname']." ".$get_mi.".");
    $get_courses=retrieve("SELECT * FROM courses WHERE course_code=?",array($get_profile[0]['course']));

    if (isset($_POST['save_profile'])) {
        manage("UPDATE students 
            SET lastname=?, firstname=?, middlename=?,
            email=?, contact_number=?, course=?, year=? WHERE id=?",
        array($_POST['edit_lastname'],$_POST['edit_firstname'],$_POST['edit_middlename'],
            $_POST['edit_email'],$_POST['edit_contact_number'],$_POST['edit_course'],
            $_POST['edit_year'],$_POST['edit_id']));
        
        echo "<script type='module'>
                Swal.fire('Success','Profile updated successfully','success');
            </script>";
    }

    if (isset($_POST['save_password'])) {
        $get_curr_pass=retrieve("SELECT * FROM login_credentials WHERE username=?",array($_GET['user']));
    
        if ($get_curr_pass[0]['password'] == $_POST['current_password']) {
            if ($_POST['new_password'] == $_POST['confirm_new_password']) {
                manage("UPDATE login_credentials SET password=? WHERE username=?",array($_POST['new_password'],$_GET['user']));
                manage("INSERT INTO system_logs(user_id,type,page,action,details,date) VALUES(?,?,?,?,?,?)",
                array($student_username,"Student","Profile","Change Password",
                    "<details>
                        <p>Change Password</p>
                        <p>
                            Username: ".$_GET['user']."
                        </p>
                    </details>",date("Y-m-d h:i:s a")));
                echo "<script type='module'>
                Swal.fire('Success','Password changes successfully','success');
            </script>";
            } else {
                echo "<script type='module'>
                Swal.fire('Error','Passwords do not match','error');
            </script>";
            }
        } else {
            echo "<script type='module'>
                Swal.fire('Error','Current Password do not match','error');
            </script>";
        }
    }
?>
<div class="card card-intro bg-primary p-1 d-none">
    <div class="card-body white-text text-center">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <h1 class="font-weight-bold h2">Student Information</h1>
            </div>
        </div>
    </div>
</div>

<!--Main Layout-->
<main class="pt-4">
    <div class="container">
        <h1 class="font-weight-bold h2">Student Information</h1>
        <div class="row mb-4">
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header">Personal Information</div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <?php
                                $profile_info=array(
                                    "Name"=>$name,
                                    "Birthdate"=>date("l, d F Y",strtotime($get_profile[0]['birthdate'])),
                                    "Home Address"=>$get_profile[0]['address'],
                                    "Mobile Number"=>$get_profile[0]['contact_number'],
                                    "E-Mail Address"=>$get_profile[0]['email']
                                );
                                foreach ($profile_info as $prof_key => $prof_value) {
                                    echo "
                                        <tr>
                                            <td>".$prof_key."</td>
                                            <td class='font-weight-bold'>".$prof_value."</td>
                                        </tr>
                                    ";
                                }
                           ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">STUDENT IDENTIFICATION AND COURSE RECORD</div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <tbody>
                            <?php
                                $student_iden=array(
                                    "Student ID"=>$student_schoolid,
                                    "Course"=>$get_profile[0]['course'],
                                    "Year Level"=>$get_profile[0]['year'],
                                );
                                foreach ($student_iden as $stud_key => $stud_value) {
                                    echo "
                                        <tr>
                                            <td>".$stud_key."</td>
                                            <td class='font-weight-bold'>".$stud_value."</td>
                                        </tr>
                                    ";
                                }
                           ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">Update Student Information</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <label class="form-label" for="edit_year">Email</label>
                                    <input class="form-control" type="email" name="edit_email" id="edit_email" value="<?php echo $get_profile[0]['email'] ?>">
                                    
                                    <label class="form-label" for="edit_year">Contact Number</label>
                                    <input class="form-control" type="text" name="edit_contact_number" id="edit_contact_number" value="<?php echo $get_profile[0]['contact_number']; ?>">    

                                    <label class="form-label" for="edit_course">Course</label>
                                    <select class="form-control" name="edit_course" id="edit_course" value="<?php echo $get_profile[0]['course']; ?>">
                                    </select>
                                    
                                    <label class="form-label" for="edit_year">Year</label>
                                    <input class="form-control" type="number" name="edit_year" id="edit_year" value="<?php echo $get_profile[0]['year'] ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card mb-4">
                    <div class="card-header">Password Change</div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="password" id="current_password" class="form-control mb-3" placeholder="Current password">
                            <input type="password" id="new_password" class="form-control mb-3" placeholder="New password">
                            <input type="password" id="confirm_new_password" class="form-control mb-3" placeholder="Confirm new password">
                            <div class="text-center">
                                <button type="submit" id="save_password" name="save_password" class="btn btn-info btn-md">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function(){
    var url = "data/courses.json";
    $.getJSON(url, function (data) {
        $.each(data, function (index, value) {
            $('#edit_course').append('<option value="' + value.course_code + '">' + value.course_name + '</option>');
        });
    });
})
</script>
