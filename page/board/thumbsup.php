<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";

    $bno = $_GET['idx'];

    $sql = "SELECT thumbsup from board where idx='{$bno}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $newthumbsup = $row['thumbsup']+1;

    $sql = "UPDATE board set thumbsup='{$newthumbsup}' where idx='{$bno}'";
    $result = $conn->query($sql);
    echo "<script>
        alert('추천되었습니다');
        location.href='../../index.php';
    </script>";   
    $conn -> close();
?>