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
                        <li class="breadcrumb-item"><a href=" ">Class Period</a></li>
                        <li class="breadcrumb-item active"><a href=" ">Class Period</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="get" action="">
                                <div class="row">
                                   
                                    <div class="col-md-8">
                                        <label class="form-label" for="session_id">Session</label>
                                        <select class="form-control form-select" required name="session_id" id="session_id">
                                            <option value="">Select Session</option>
                                            <?php 
                                                $result=$mysqli->common_select('session');
                                                if($result){
                                                    if($result['data']){
                                                        foreach($result['data'] as $d){
                                            ?>
                                                <option value="<?= $d->id ?>" <?= isset($_GET['session_id']) && $_GET['session_id']==$d->id?"selected":"" ?>> <?= $d->session ?></option>
                                            <?php } } } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary mt-4">Get Routine</button>
                                    </div>
                                </div>
                            </form>
                        </div>
<?php 
    $period=$name=$teacher_routine=[];
    $result=$mysqli->common_select('period');
    if($result){
        if($result['data']){
            foreach($result['data'] as $d){
                $period[$d->sl]=$d;
            }
        }
    }
    $result=$mysqli->common_select('teacher');
    if($result){
        if($result['data']){
            foreach($result['data'] as $d){
                $name[$d->id]=$d;
            }
        }
    }
    if(isset($_GET['session_id'])){
        $result=$mysqli->common_select_query("SELECT teacher_routine.*, teacher.name , subject.subject_name as sub_name , class.class, section.section FROM `teacher_routine` 
                                        JOIN subject on subject.id=teacher_routine.subject_name
                                        JOIN teacher on teacher.id=teacher_routine.teacher_id
                                        JOIN class on class.id=teacher_routine.class_id
                                        JOIN section on section.id=teacher_routine.section_id
                                        where teacher_routine.session_id={$_GET['session_id']}");
        if($result){
            if($result['data']){
                foreach($result['data'] as $d){
                    $teacher_routine[$d->teacher][$d->period]=$d;
                }
            }
        }
    }
?>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr> 
                                            <th scope="col">Teacher</th>
                                            <?php if($period){
                                                    foreach($period as $p){
                                            ?>
                                            <th scope="col"><?= $p->period_name?><br><?= $p->period_time?></th>
                                            <?php } } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($name){
                                                foreach($name as $d){
                                        ?>
                                            <tr>
                                                <th><?= $d->name?></th>
                                                <?php if($period){
                                                        foreach($period as $p){
                                                ?>
                                                    <td>
                                                        <?php 
                                                            if(isset($teacher_routine[$d->name][$p->sl])){
                                                                echo $teacher_routine[$d->sl][$p->sl]->class;
                                                                echo "<br/>".$teacher_routine[$d->sl][$p->sl]->section;
                                                                echo "<br/>".$teacher_routine[$d->sl][$p->sl]->sub_name;
                                                                echo "<br/>".$teacher_routine[$d->sl][$p->sl]->day_name;
                                                            }
                                                        ?>
                                                    </th>
                                                <?php } } ?>
                                            </tr>
                                        <?php } } ?>
                                    </tbody> 
                                </table>
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
