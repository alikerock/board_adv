<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";

    $bno = $_GET['idx'];
    $sql = "DELETE from board where idx='{$bno}'";
    // $conn -> query($sql);

    if($conn -> query($sql) === TRUE){
        echo "<script>
            alert('삭제되었습니다');
            location.href='../../index.php';
        </script>";
    }

     $conn->close();
?>