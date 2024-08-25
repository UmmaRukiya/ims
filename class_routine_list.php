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
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <label class="form-label" for="session_id">Session</label>
                                        <select class="form-control form-select" required name="session_id" id="session_id">
                                            <option value="">Select Section</option>
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
    $period=$day_name=$class_routine=[];
    $result=$mysqli->common_select('period');
    if($result){
        if($result['data']){
            foreach($result['data'] as $d){
                $period[$d->sl]=$d;
            }

            
        }
    }
    $result=$mysqli->common_select('day_name');
    if($result){
        if($result['data']){
            foreach($result['data'] as $d){
                $day_name[$d->sl]=$d;
            }
        }
    }
    if(isset($_GET['class_id']) && $_GET['section_id'] && $_GET['session_id']){
        $result=$mysqli->common_select_query("SELECT class_routine.*, teacher.name as teacher_name, subject.subject_name as sub_name FROM `class_routine` 
                                        JOIN subject on subject.id=class_routine.subject_name
                                        JOIN teacher on teacher.id=class_routine.teacher_id
                                        where class_routine.class_id={$_GET['class_id']} and class_routine.section_id={$_GET['section_id']} and class_routine.session_id={$_GET['session_id']}");
        if($result){
            if($result['data']){
                foreach($result['data'] as $d){
                    $class_routine[$d->day_name][$d->period]=$d;
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
                                            <th scope="col">Day</th>
                                            <?php if($period){
                                                    foreach($period as $p){
                                            ?>
                                            <th scope="col"><?= $p->period_name?><br><?= $p->period_time?></th>
                                            <?php } } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($day_name){
                                                foreach($day_name as $d){
                                        ?>
                                            <tr>
                                                <th><?= $d->day_name?></th>
                                                
                                                <?php if($period){
                                                        foreach($period as $p){
                                                ?>
                                                    <td>
                                                        <?php 
                                                            if(isset($class_routine[$d->sl][$p->sl])){
                                                                echo $class_routine[$d->sl][$p->sl]->sub_name;
                                                                echo "<br/>".$class_routine[$d->sl][$p->sl]->teacher_name;
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
