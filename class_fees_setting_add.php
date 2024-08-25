
 
 <?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

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
                            <li class="breadcrumb-item"><a href="class_routine_add.php">Class routine</a></li>
                            <li class="breadcrumb-item active"><a href="class_routine_list.php">Class routine</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
           
            <form method="get" action="">
                 <div class="row">
                    <div class="col-lg-3">
                        <label for="class_id">Class</label>
                        <select class="form-control" id="class_id" name="class_id">
                            <option value="">Select Class</option>
                            <?php 
                                $result=$mysqli->common_select('class');
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= isset($_GET['class_id']) && $_GET['class_id']==$d->id?"selected":"" ?>><?= $d->class ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="group_id">Group</label>
                        <select class="form-control" id="group_id" name="group_id">
                            <option value="">Select Group</option>
                            <?php 
                                $result=$mysqli->common_select('`group`');
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= isset($_GET['group_id']) && $_GET['group_id']==$d->id?"selected":"" ?>><?= $d->group ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-3">
                        <label for="group_id">Session</label>
                        <select class="form-control" id="session_id" name="session_id">
                            <option value="">Select Session </option>
                            <?php 
                                $result=$mysqli->common_select('session');
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= isset($_GET['session_id']) && $_GET['session_id']==$d->id?"selected":"" ?>><?= $d->session ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 justify-content-end mt-2 pt-3 mt-sm-0 d-flex">
                        <button type="submit" class="btn btn-primary">Get Fees</button>
                    </div>
                </div>
            </form>

            <form method="post" action="">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fees</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($_GET['class_id'])){

                                $result=$mysqli->common_select_query("select cfs.*, fees_category.name
                                                                from class_fees_setting as cfs 
                                                                JOIN fees_category on fees_category.id=cfs.fees_category_id
                                                                where 
                                                                cfs.class_id={$_GET['class_id']} and
                                                                cfs.group_id={$_GET['group_id']} and
                                                                cfs.session_id={$_GET['session_id']} and
                                                                cfs.deleted_at is null 
                                                                ");
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $sid=>$data){
                        ?>
                                            <tr>
                                                <td> 
                                                    <?= $data->name ?>
                                                    <input type="hidden" name="fees_id[]" value="<?= $data->fees_category_id ?>" >
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="<?= $data->amount ?>"  name="amount[<?= $data->fees_category_id ?>]">
                                                </td>
                                            </tr>
                        <?php } }else{
                                    $result=$mysqli->common_select("fees_category");
                                    if($result){
                                        if($result['data']){
                                            foreach($result['data'] as $sid=>$data){
                                                
                        ?>
                                            <tr>
                                                <td> 
                                                    <?= $data->name ?>
                                                    <input type="hidden" name="fees_id[]" value="<?= $data->id ?>" >
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"  name="amount[<?= $data->id ?>]">
                                                </td>
                                            </tr>
                        
                        <?php } } } } } ?>
                        <input type="hidden" name="class_id" value="<?= $_GET['class_id'] ?>">
                        <input type="hidden" name="group_id" value="<?= $_GET['group_id'] ?>">
                        <input type="hidden" name="session_id" value="<?= $_GET['session_id'] ?>">
                    
                        <?php }  ?>
                    </tbody>
                </table>
                <div class="col-lg-10 justify-content-end mt-2 pt-3 mt-sm-0 d-flex">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <?php 
        if($_POST){
            /* delete before save if old data found */
            $conD['class_id']=$_POST['class_id'];
            $conD['group_id']=$_POST['group_id'];
            $conD['session_id']=$_POST['session_id'];
            $mysqli->common_delete('class_fees_setting',$conD);

            foreach($_POST['fees_id'] as $i=>$fees_id){
                    $stu['fees_category_id']=$fees_id;
                    $stu['class_id']=$_POST['class_id'];
                    $stu['group_id']=$_POST['group_id'];
                    $stu['session_id']=$_POST['session_id'];
                    $stu['amount']=$_POST['amount'][$fees_id];;
                    $stu['created_at']=date('Y-m-d H:i:s');
                    $stu['created_by']=1;
                    $rs=$mysqli->common_create('class_fees_setting',$stu);
                }
                if($rs){
                    if($rs['data']){
                        echo "<script>window.location='{$baseurl}class_fees_setting_list.php'</script>";
                    }else{
                        echo $rs['error'];
                    }




                    
                     
                }
            }    
        
    ?>  
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

 
<?php include('include/footer.php') ?> 
