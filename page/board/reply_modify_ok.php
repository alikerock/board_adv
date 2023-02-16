<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";

    $rno = $_POST['rno']; 
    $bno = $_POST['bno'];

    //댓글(reply 테이블)의 기존 비번과 수정할 때 입력한 비번을 비교
    //reply테이블에서 rno번호에 해당하는 값에서 비번 조회,조회쿼리 실행, 실행결과 연관배열로 출력
    //연관배열에서 비번 출력후 입력한 비번과 비교

    //password_verify(암호화전 비번, 암호화된비번)

    $sql2 = "SELECT password from reply where idx = '{$rno}'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $org_pw = $row2['password'];
    $input_pw = $_POST['pw'];

    if(password_verify($input_pw, $org_pw)){

        $sql = "UPDATE reply set content='{$_POST['content']}' where idx = '{$rno}'";
    
        if($conn->query($sql) === true){
            echo "<script>
                alert('댓글 수정되었습니다.');
                location.replace('read.php?idx={$bno}');</script>";
        }else{
            echo "<script>
                alert('글수정 실패');
                location.replace('read.php?idx={$bno}');</script>";
        }
    }else{
        echo "<script>
            alert('비밀번호가 틀립니다');
            history.back();
        </script>";
    }

    $conn->close();
    ?>