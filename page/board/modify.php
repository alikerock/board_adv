
<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";

    $bno = $_GET['idx'];
    $sql = "SELECT * from board where idx='{$bno}'";
    $result = $conn->query($sql);
    $row = $result ->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글수정</title>
</head>
<body>
    <div class="board_area">
        <h1>글수정</h1>
        <form action="modify_ok.php?idx=<?php echo $bno;?>" method="post">
            <div class="field">
                <label for="username">이름:</label>
                <input type="text" id="username" name="name" value="<?php echo $row['name']; ?>" required placeholder="이름">
            </div>
            <div class="field">
                <label for="userpw">비밀번호:</label>
                <input type="password" id="userpw" name="pw" required placeholder="비밀번호">
            </div>
            <div class="field">
                <label for="subject">제목:</label>
                <input type="text" id="subject" name="title" value="<?php echo $row['title']; ?>" required placeholder="제목">
            </div>
            <div class="field">
                <label for="usermsg">내용:</label>
                <textarea name="content" id="usermsg" cols="30" rows="10"><?php echo $row['content']; ?></textarea>
            </div>
            <button type="submit">전송</button>
        </form>
    </div>
</body>
</html>