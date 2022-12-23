<div class="container">
    <div class="row" style="margin-top: 64px !important;">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
            <img style="margin-right:auto;margin-left:auto;display:block;" src="./assets/img/gct_logo.png" height="200" alt="GCT Logo">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="card rounded-0" style="background-color: #39445f;" style="max-width: 60%;">
                <div class="card-header indigo darken-4">
                    <h3 class="text-center text-white">GCT SAIS</h3>
                </div>
                <div class="card-body">
                    <div class="col-sm-12 col-md-6 col-lg-12 col-xl-12 col-12">
                        <form class="form" method="post" action="processes/login.php" role="form" autocomplete="off" id="formLogin">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                                        <div class="md-form">
                                            <i class="fas fa-user white-text prefix"></i>
                                            <input class="form-control form-control-lg rounded-0 text-white" type="text" name="schoolid" id="schoolid" required>
                                            <label class="text-white" for="password">School ID</label>
                                        </div>
                                        <div class="md-form">
                                            <i class="fas fa-lock white-text prefix"></i>
                                            <input class="form-control form-control-lg rounded-0 text-white" type="password" name="password" id="admin_pass" required autocomplete="new-password">
                                            <label class="text-white" for="password">Password</label>
                                        </div>
                                        <button class="btn btn-success btn-lg float-right" type="submit" name="login" id="btnLogin"><i class="fa fa-sign-in"></i> Login</button>	
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5 mt-5">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="card rounded-0" style="background-color: #39445f;">
                        <div class="card-body">
                            <h3 class="text-center text-white">GCT SAIS</h3>
                            <form class="form" method="post" action="processes/login.php" role="form" autocomplete="off" id="formLogin">
                                <div class="md-form">
                                    <input class="form-control form-control-lg rounded-0 text-white" type="text" name="schoolid" id="schoolid" required>
                                    <label class="text-white" for="password">School ID</label>
                                </div>
                                <div class="md-form">
                                    <input class="form-control form-control-lg rounded-0 text-white" type="password" name="password" id="admin_pass" required autocomplete="new-password">
                                    <label class="text-white" for="password">Password</label>
                                </div>				
                                <button class="btn btn-success btn-lg float-right" type="submit" name="login" id="btnLogin"><i class="fa fa-sign-in"></i> Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<td class='d-none'>
    <span class='m-1 pay_examination' title='Pay Exam'
            pay_exam_id='".$disp_examination[$i]['assessment_id']."'
            exam_disp_or_number='".$disp_examination[$i]['or_number']."'
            exam_tuition_fee='".$disp_examination[$i]['tuition_fee']."'
            exam_balance='".$disp_examination[$i]['balance']."'
            prelim_exam='".intval($disp_examination[$i]['prelim_exam'])."'
            data-toggle='modal' data-target='#exam_payments_modal'>
        <i class='fas fa-credit-card hvr-pop'></i>
    </span>
</td>

<span class='m-1 pay_examination' title='Pay Exam'
    pay_exam_id='".$disp_assessment[$i]['assessment_id']."'
    exam_disp_or_number='".$disp_assessment[$i]['or_number']."'
    exam_tuition_fee='".$disp_assessment[$i]['tuition_fee']."'
    exam_balance='".$disp_assessment[$i]['balance']."'
    prelim_exam='".intval($disp_assessment[$i]['prelim_exam'])."'
    data-toggle='modal' data-target='#exam_payments_modal'>
    <i class='fas fa-credit-card hvr-pop'></i>
</span>