<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>
<?php
    session_start();
    $baseurl="http://localhost/ims/";
    include_once('class/crud.php');
?>

<body>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <form action="" method="post" class="was-validated">
                    <div class="mb-3">
                        <select class="form-select" required aria-label="select example">
                        <option value="">Open this select menu</option>
                        <option value="1">Five</option>
                        <option value="2">Six</option>
                        <option value="3">Seven</option>
                        <option value="3">Eight</option>
                        <option value="3">Nine</option>
                        <option value="3">Ten</option>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            <?php 
                if($_POST){
                    $_POST['created_at']=date('Y-m-d H:i:s');
                    $_POST['created_by']=1;
                    $rs=$mysqli->common_create('class',$_POST);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}.table-bootstrap-basic.php'</script>";
                        }else{
                            echo $rs['error'];
                        }
                    }
                }
            ?>
                <!-- <div class="row"> 
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Class</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Class</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Air Conditioner</td>
                                                
                                                <td>Apr 20,2018</td>
                                                <td>
                                                    <span>
                                                        <a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fa fa-pencil color-muted"></i> </a>
                                                        <a href="javascript:void()" data-toggle="tooltip"
                                                            data-placement="top" title="Close"><i
                                                                class="fa fa-close color-danger"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
