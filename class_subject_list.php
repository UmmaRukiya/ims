<?php include('include/header.php') ?>
<?php include('include/sidebar.php')?>

<!--**********************************
    Content body start
***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Class's Subject</h4>
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
                                    <div class="col-md-3">
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
                                    
                                    <div class="col-md-3">
                                        <label for="subject_id">Subject</label>
                                        <select class="form-control" id="subject" name="subject_id">
                                            <option value="">Select Class</option>
                                            <?php 
                                                $result=$mysqli->common_select('subject');
                                                if($result){
                                                    if($result['data']){
                                                        foreach($result['data'] as $d){
                                            ?>
                                                <option value="<?= $d->id ?>" <?= isset($_GET['subject_id']) && $_GET['subject_id']==$d->id?"selected":"" ?>><?= $d->subject_name ?> </option>
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
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary mt-4">Get Marks</button>
                                </div>
                        </div>
                        </form>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Student</th>
                                                <th scope="col">Subjective</th>
                                                <th scope="col">Objective</th>
                                                <th scope="col">Practical</th>
                                                <th scope="col">Pass Marks</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                    <?php 
                                        if(isset($_GET['class_id']) && isset($_GET['subject_id'])){

                                            $result=$mysqli->common_select_query("select  class_subject.*,student.name from class_subject
                                                     join student on class_subject.student_id= student.id
                                                             where 
                                                            class_subject.class_id={$_GET['class_id']} and
                                                            class_subject.session_id={$_GET['session_id']} and
                                                            class_subject.subject_id={$_GET['subject_id']} and
                                                            class_subject.term_id={$_GET['term_id']} and
                                                            class_subject.deleted_at is null ");
                                        if($result){
                                            if($result['data']){
                                                $i=1;
                                                foreach($result['data'] as  $sid=>$data){
                             ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data-> name ?></td>
                                            <td><?= $data-> sub ?></td>
                                            <td><?= $data-> obj ?></td>
                                            <td><?= $data-> prac ?></td>
                                            <td><?= $data-> pass_marks ?></td>
                                            <td>
                                            <span>
                                                    <a href="<?= $baseurl ?>class_subject_edit.php?id=<?= $data ->id ?>" class="mr-4" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                    <a href="<?= $baseurl ?>class_subject_delete.php?id=<?= $data ->id ?>" data-toggle="tooltip"
                                                        data-placement="top" title="Close"><i
                                                            class="fa fa-close color-danger"></i></a>
                                                </span>
                                            </td>
                                        </tr>
 
                                          
                                       
 
                                            <?php } } } } ?>
 
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
