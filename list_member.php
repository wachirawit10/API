    <?php
    require "config.db.php";

    $data = [];
    $sql_read = "SELECT * FROM members";
    $qr_read = mysqli_query ($conn, $sql_read);

    //การทำ loop
    while($read = mysqli_fetch_object($qr_read)){
    $data[]=$read;
}

    echo json_encode($data);
    echo mysqli_error($conn);


?>