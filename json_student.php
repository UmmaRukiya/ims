<?php include('include/connection.php') ; ?>
<?php 
    $return_data=array();
    $rs=$mysqli->common_select_query("select student.name,student_details.student_id
                                    from student_details
                                    JOIN student on student.id=student_details.student_id
                                    where 
                                    student_details.class_id={$_GET['class_id']} and
                                    student_details.section_id={$_GET['section_id']} and
                                    student_details.session_id={$_GET['session_id']} and
                                    student_details.deleted_at is null 
                                    ");
    if($rs){
        if($rs['data']){
            $return_data=$rs['data'];
        }
    }

    echo json_encode($return_data);
    
?>
   