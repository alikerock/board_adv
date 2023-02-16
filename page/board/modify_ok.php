<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";
$bno = $_GET['idx'];
$username = $_POST['name'];
$userpw = password_hash($_POST['pw'],PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

$sql = "UPDATE board set 
name='{$username}',pw='{$userpw }',title='{$title}',content='{$content}',date='{$date}'
where idx='{$bno}'";

if($conn->query($sql) === true){
    echo "<script>
        alert('글수정이 완료되었습니다.');
        location.href = '../../index.php';</script>";
}else{
    echo "<script>
        alert('글수정 실패');
        location.href = '../../index.php';</script>";
}
$conn->close();
?>