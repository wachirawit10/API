<?php

    require_once "config.db.php";
    $dataJSON = json_decode(file_get_contents('php://input'), true);
    $message = array();

    $id =$_GET['id'];

    $delete = "DELETE FROM `members` WHERE `members` . `id` = '$id' ";
    $qr_delete = mysqli_query($conn, $delete);

    if($qr_delete){
        //แก้ไขข้อมูลสำเร็จ
 http_response_code(201);
 $message['status'] = "ลบข้อมูลสำเร็จ" ;

    }else{
        //แก้ไขข้อมูลไม่ได้
http_response_code(422);
$message['status'] = "ลบข้อมูลไม่ได้";

//ส่งข้อมูลการดำเนินการกลับไป
echo json_encode($message);
echo mysqli_error($conn);
    }



?>