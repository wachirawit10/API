<?php
    include("config.db.php");
    $dataJSON = json_decode(file_get_contents('php://input'), true );
    $message = array();

    // ประกาศตัวแปรสำหรับเพิ่มข้อมูล
    $id_stu = $dataJSON ['id_stu'];
    $name = $dataJSON ['name'];
    $nname = $dataJSON ['nname'];
    $age = $dataJSON ['age'];
    $phone = $dataJSON ['phone'];
    $address = $dataJSON ['address'];
    $status = $dataJSON ['status'];

    //เขียนโค้ดเพิ่มข้อมูล
    $sql = "INSERT INTO members (id_stu, name, nname, age, phone, address, status)
    VALUES('$id_stu' , '$name' , '$nname' , '$age' , '$phone' , '$address' , '$status')";

    //run code
    $qr_insert = mysqli_query($conn, $sql);

    if($qr_insert){
        //เพิ่มข้อมูลได้
        http_response_code(201);
        $message["status"] = "เพิ่มข้อมูลได้";
    }else{
        //เพิ่มข้อมูลไม่ได้
        http_response_code(422);
        $message["status"] = "เพิ่มข้อมูลไม่ได้";
    }

    //ส่งข้อมูลการดำเนินการกลับไป
    echo json_encode($message);
    echo mysqli_error($conn);
?>