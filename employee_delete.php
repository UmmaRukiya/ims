<?php include_once('include/header.php') ; ?>
<?php 
    $olddata=array();
    $con['id']=$_GET['id'];
    $data['deleted_at']=date('Y-m-d H:i:s');
    $data['updated_by']=1;
    $rs=$mysqli->common_update('employee',$data,$con);
    if($rs){
        if($rs['data']){
            echo "<script>window.location='{$baseurl}employee_list.php'</script>";
        }else{
            echo $rs['error'];
        }
    }
    
?>
     