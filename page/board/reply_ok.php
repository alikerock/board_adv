<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";

    $number = $_GET['idx'];
    $date = date('Y-m-d H:i:s');
    $userpw = password_hash($_POST['reply_pw'],PASSWORD_DEFAULT);

    if($number && $_POST['reply_user'] && $_POST['reply_pw'] && $_POST['reply_content'] ) {
        //$sql 쿼리저장
        //$sql 쿼리 실행
        $sql = "INSERT INTO reply
                (con_num, name, password, content, date) 
                values
                ('{$number}' ,'{$_POST['reply_user']}' ,'{$userpw}' ,'{$_POST['reply_content']}','{$date}')";
        
        if($conn->query($sql) === true){
            echo "<script>
                alert('댓글이 작성되었습니다.');
                location.href = '../../index.php';</script>";
        }else{
            echo "<script>
                alert('글쓰기 실패');
                location.href = '../../index.php';</script>";
        }

    }
    $conn -> close();
?>