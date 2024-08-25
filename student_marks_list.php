<?php include('include/header.php') ?>
<?php include('include/sidebar.php')?>

<!--**********************************
    Content body start
***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">Your school dashboard</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student_marks_add.php">Student Marks</a></li>
                        <li class="breadcrumb-item active"><a href="student_marks_list.php">Student Marks List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Marks</h4>
                        </div>
                        <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="class_id">class</label>
                                        <select class="form-control form-select" required name="class_id" id="class_id">
                                            <option value="">Select Class</option>
                                            <?php 
                                                $result=$mysqli->common_select('class');
                                                if($result){
                                                    if($result['data']){
                                                        foreach($result['data'] as $d){
                                            ?>
                                                <option <?= isset($_GET['class_id']) && $_GET['class_id']==$d->id?"selected":"" ?> value="<?= $d->id ?>" > <?= $d->class ?></option>
                                            <?php } } } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="section_id">Section</label>
                                        <select class="form-control form-select" required name="section_id" id="section_id">
                                            <option value="">Select Section</option>
                                            <?php 
                                                $result=$mysqli->common_select('section');
                                                if($result){
                                                    if($result['data']){
                                                        foreach($result['data'] as $d){
                                            ?>
                                                <option value="<?= $d->id ?>" <?= isset($_GET['section_id']) && $_GET['section_id']==$d->id?"selected":"" ?>> <?= $d->section ?></option>
                                            <?php } } } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 pt-2">
                                        <label for="session_id">Session</label>
                                        <select class="form-control" id="session_id" name="session_id" onchange="getStudent()">
                                            <option value="">Select Session </option>
                                            <?php 
                                                $result=$mysqli->common_select('session');
                                                if($result){
                                                    if($result['data']){
                                                        foreach($result['data'] as $d){
                                            ?>
                                            <option value="<?= $d->id ?>" <?= isset($_GET['session_id']) && $_GET['session_id']==$d->id?"selected":"" ?>><?= $d->session ?> </option>
                                            <?php } } } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="term">Exam Term</label>
                                        <select class="form-control" id="term_id" name="term_id">
                                            <option value="">Select Term</option>
                                            <?php 
                                            $result=$mysqli->common_select('exam_term');
                                            if($result){
                                                if($result['data']){
                                                        foreach($result['data'] as $d){
                                            ?>
                                            <option value="<?= $d->id ?>" <?= isset($_GET['term_id']) && $_GET['term_id']==$d->id?"selected":"" ?>><?= $d->term ?> </option>
                                            <?php } } } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="term">Student</label>
                                        <select class="form-control form-select" required name="student_id" id="student_id">
                                    
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary mt-4">Get Marks</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        
    <?php 
    $class_subject=$subject=$marks=[];
    
    $result=$mysqli->common_select('subject');
    if($result){
        if($result['data']){
            foreach($result['data'] as $s){
                $subject[$s->id]=$s;
            }
        }
    }
    if(isset($_GET['class_id']) && $_GET['student_id']){
        $rsc['student_id']=$_GET['student_id'];
        $rsc['session_id']=$_GET['session_id'];
        $rsc['class_id']=$_GET['class_id'];
        $rsc['term_id']=$_GET['term_id'];
        $rs=$mysqli->common_select('class_subject','*',$rsc); 
        if($rs){
            if($rs['data']){
                foreach($rs['data'] as $d){
                   $marks[$d->subject_id]=$d;
                }
            }
        }
    }
    $gplarray=array('5'=>'A+','4'=>'A','3.5'=>'A-','3'=>'B','2'=>'C','1'=>'D','0'=>'F');
    function gpaCount($m,$gplarray){
        $gp='';
        if($m>79){
            $gp=5;
        }else if($m>69){
            $gp=4;
        }else if($m>59){
            $gp=3.5;
        }else if($m>49){
            $gp=3;
        }else if($m>39){
            $gp=2;
        }else if($m>32){
            $gp=1;
        }else{
            $gp=0;
        }

        return array($gp,$gplarray["$gp"]);
    }
    function gplCount($m,$gplarray){
        if($m>5){
            $gp=5;
        }else if($m>4){
            $gp=4;
        }else if($m>3.5){
            $gp=3.5;
        }else if($m>3){
            $gp=3;
        }else if($m>2){
            $gp=2;
        }else if($m>1){
            $gp=1;
        }else{
            $gp=0;
        }

        return $gplarray[$gp];
    }


    $totalmarks=$totalgpa=$checkfail=0;
?>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr> 
                                                <th scope="col">Subject </th>  
                                                <th scope="col">Subjective</th>
                                                <th scope="col">Objective</th>
                                                <th scope="col">Practical</th>
                                                <th scope="col">Pass Marks</th>
                                                <th scope="col">Total Marks</th>
                                                <th scope="col">GP</th>
                                                <th scope="col">GPL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                             if($subject){
                                                foreach($subject as $s){
                                                    $sub_total=($marks[$s->id]->sub ?? 0) + ($marks[$s->id]->obj ?? 0) + ($marks[$s->id]->prac ?? 0);
                                                    $totalmarks+=$sub_total;
                                                    $totalgpa+=gpaCount($sub_total,$gplarray)[0];
                                                    if(gpaCount($sub_total,$gplarray)[0] <= 0){
                                                        $checkfail=1;
                                                    }
                                        ?>
                                            <tr>
                                                <th><?= $s->subject_name?></th>
                                                <td><?= $marks[$s->id]->sub ?? '' ?></td>
                                                <td><?= $marks[$s->id]->obj ?? '' ?></td>
                                                <td><?= $marks[$s->id]->prac ?? '' ?></td>
                                                <td><?= $marks[$s->id]->pass_marks ?? '' ?></td>
                                                <td><?= $sub_total  ?></td>
                                                <td><?= gpaCount($sub_total,$gplarray)[0]  ?></td>
                                                <td><?= gpaCount($sub_total,$gplarray)[1]  ?></td>
                                            </tr>
                                        <?php } } ?>
                                    </tbody> 
                                </table>
<hr>
                                <div class="mt-3 w-25">
                                    <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <tr>
                                            <th>Total Marks</th>
                                            <td><?= $totalmarks ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total GP</th>
                                            <td><?= $totalgpa ?></td>
                                        </tr>
                                        <tr>
                                            <th>GPA </th>
                                            <td><?= $checkfail ? 0 : round($totalgpa / count($subject),2)  ?></td>
                                        </tr>
                                        <tr>
                                            <th>GLA</th>
                                            <td><?= $checkfail ? "F" : gplCount(round($totalgpa / count($subject),2),$gplarray) ?></td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--**********************************
    Content body end
***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= $baseurl ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= $baseurl ?>assets/js/quixnav-init.js"></script>
    <script src="<?= $baseurl ?>assets/js/custom.min.js"></script>
    
</body>
<?php include('include/footer.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    getStudent()
    function getStudent(){
        let class_id=$('#class_id').val();
        let section_id=$('#section_id').val();
        let session_id=$('#session_id').val();
        let student_id= <?= $_GET['student_id'] ?? "" ?>

        $.getJSON( "<?= $baseurl ?>json_student.php", { class_id:class_id,section_id:section_id,session_id:session_id } )
        .done(function( data ) {
            let opt="<option value=''>No Data Found</option>";
            if(data){
                opt="<option value=''>Select student</option>";
                for(i=0; i < data.length; i++){
                    if(student_id==data[i].student_id)
                        opt += "<option selected value='" + data[i].student_id +"'>" + data[i].name + "</option>";
                    else
                        opt += "<option value='" + data[i].student_id +"'>" + data[i].name + "</option>";
                }
            }
            $('#student_id').html(opt);
        })
        .fail(function( jqxhr, textStatus, error ) {
            console.log( error );
        });
    }
</script>
