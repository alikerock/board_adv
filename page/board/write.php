<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
</head>
<body>
    <div class="board_area">
        <h1>글쓰기</h1>
        <form action="write_ok.php" method="post" enctype="multipart/form-data">
            <div class="field">
                <label for="username">이름:</label>
                <input type="text" id="username" name="name" required placeholder="이름">
            </div>
            <div class="field">
                <label for="userpw">비밀번호:</label>
                <input type="password" id="userpw" name="pw" required placeholder="비밀번호">
            </div>
            <div class="field">
                <label for="subject">제목:</label>
                <input type="text" id="subject" name="title" required placeholder="제목">
            </div>
            <div class="field">
                <label for="usermsg">내용:</label>
                <textarea name="content" id="usermsg" cols="30" rows="10"></textarea>
            </div>
            <div class="field">
                <label for="file">첨부파일:</label>
                <input type="file" name="b_file" id="file" >
            </div>            
            <div class="field">
                <input type="checkbox" id="lock_post" name="lock_post">
                <label for="lock_post">잠금</label>
            </div>
            <button type="submit">전송</button>
        </form>
    </div>
</body>
</html>