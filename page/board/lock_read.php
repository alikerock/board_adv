<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";

    $bno = $_GET['idx'];
    $sql = "SELECT pw from board where idx='{$bno}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀글 확인</title>
    <style>
        #modal{
            position:fixed;
            width: 400px;
            left: 50%;
            top: 50%;
            transform:translate(-50%, -50%);
            box-shadow:0 0 5px rgba(0,0,0,0.4);
            padding: 50px;
        }
    </style>
</head>
<body>
    <div id="modal">
        <form action="" method="POST">
            <label for="pwd">비밀번호 :</label>
            <input type="password" id="pwd" name="pw_chk">
            <input type="submit" value="확인">
        </form>
    </div>
    <?php
        $bpw = $row['pw'];//글작성시 입력했던 비번 asdfljasdf7sdq8
        if(isset($_POST['pw_chk'])){
            $pwk = $_POST['pw_chk'];//입력한 비번  1234
            if(password_verify($pwk,$bpw)){
        ?>
        <script>location.replace("read.php?idx=<?php echo $bno; ?>");</script>
        <?php
            } else{
        ?>
        <script>
            alert('비밀번호가 맞지 않습니다.');
            location.replace("../../index.php");
        </script>
        <?php
            }
        }
    ?>
</body>
</html>