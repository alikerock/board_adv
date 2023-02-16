<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글읽기</title>
    <link rel="stylesheet" href="../../css/bbs_style.css">
</head>
<body>
    <?php
        $bno = $_GET['idx'];
        $sql = "SELECT hit from board where idx='{$bno}'";
        $result = $conn->query($sql);
        $row = $result ->fetch_assoc();
        $newhit = $row['hit'] + 1;
       

        $sql2 = "UPDATE board set hit = '{$newhit}' where idx='{$bno}'";
        $result2 = $conn->query($sql2);         
        
         $sql3 = "SELECT * from board where idx='{$bno}'";
         $result3 = $conn->query($sql3); 
         $row2 = $result3 ->fetch_assoc();
    ?>
    <div class="board_area">
        <h2><?php echo $row2['title']; ?></h2><!--글제목-->
        <div id="user_info">
            <p><span>이름:</span> <?php echo $row2['name']; ?> </p>
            <p><span>날짜:</span>   <?php echo $row2['date']; ?></p>
            <p><span>조회수:</span>  <?php echo $row2['hit']; ?> </p>
            <p><span>추천수:</span>   <?php echo $row2['thumbsup']; ?></p>
        </div>
        <hr>
        <div class="uploaded_file">
            <?php
                if($row2['is_img'] == 1){
            ?>
            <img src="../../upload/<?php echo $row2['file']?>">
            <?php        
                }else{
            ?>
            첨부파일: <a href="../../upload/<?php echo $row2['file']?>" target="_blank"><?php echo $row2['file']?></a>
            <?php
                }
            ?>
            
        </div>
        <hr>
        <div class="content">
            <!-- 본문-->
            <?php 
            echo nl2br($row2['content']); 
            // var_dump($row2['content']);
            
            ?>
        </div>
        <div class="board_btns">
            <ul class="flex">
                <li><a href="../../index.php">목록</a></li>
                <li><a href="thumbsup.php?idx=<?php echo $row2['idx']?>">추천하기</a></li>
                <li><a href="modify.php?idx=<?php echo $row2['idx']?>">수정</a></li>
                <li><a href="delete.php?idx=<?php echo $row2['idx']?>">삭제</a></li>
            </ul>
            

        </div>
        <hr>
        <h3>댓글 목록</h3>
        <?php
            $reply_sql = "SELECT * from reply where con_num='{$bno}' order by idx desc";
            $reply_result = $conn -> query($reply_sql);



            while($reply_row = $reply_result -> fetch_assoc()){
            ?>
            <article>
                <div class="reply_item">
                    <h4><?php echo $reply_row['name'];?></h4>
                    <div class="content">
                        <?php echo nl2br($reply_row['content']);?>
                    </div>
                    <p><?php echo $reply_row['date'];?></p>
                    <p class="btns">
                        <button type="button" class="reply_edit_btn">수정</button>
                        <button type="button" class="reply_del_btn">삭제</button>
                    </p>
                </div>
                <dialog class="reply_edit">
                    <form action="reply_modify_ok.php" method="POST">
                        <input type="hidden" name="rno" value="<?php echo $reply_row['idx'];?>">
                        <input type="hidden" name="bno" value="<?php echo $bno;?>">
                        <input type="password" name="pw" placeholder="비밀번호" required>
                        <textarea name="content" cols="30" rows="10"><?php echo $reply_row['content'];?></textarea>
                        <p>
                            <input type="submit" value="수정하기">
                            <button type="button" class="btn">취소</button>
                        </p>
                    </form>
                </dialog>
                <dialog class="reply_delete" >
                    <form action="reply_delete.php"  method="POST">
                        <input type="hidden" name="rno" value="<?php echo $reply_row['idx'];?>">
                        <input type="hidden" name="bno" value="<?php echo $bno;?>">
                        <input type="password" name="pw" placeholder="비밀번호">                    
                        <p>
                            <input type="submit" value="삭제하기">
                            <button type="button" class="btn">취소</button>
                        </p>
                    </form>
                </dialog>
            </article>
            <?php
            }
            ?>
        <!-- 댓글 입력 양식 -->
        <hr>
        <h4>댓글 달기</h4>
        <div class="reply_form">
            <form action="reply_ok.php?idx=<?php echo $bno;?>" method="post">
                <div>
                    <label for="reply_user">이름:</label>
                    <input type="text" name="reply_user" id="reply_user" placeholder="이름">
                </div>
                <div>
                    <label for="reply_pw">비밀번호:</label>
                    <input type="password" name="reply_pw" id="reply_pw" placeholder="비밀번호">
                </div>
                <div>
                    <textarea name="reply_content" id="" cols="30" rows="10"></textarea>
                </div>
                <button>댓글 달기</button>
            </form>
        </div>    

            
    
    </div>
    <script>
        let reply_modify_btns = document.querySelectorAll('.reply_edit_btn');
        let reply_del_btns = document.querySelectorAll('.reply_del_btn');
        let dialog_close_btns = document.querySelectorAll('dialog .btn');

        for(let reply_m_btn of reply_modify_btns){
            reply_m_btn.addEventListener('click',(e)=>{
                let target = e.target.closest('article').querySelector('.reply_edit');
                target.setAttribute('open','open');
            });
        }
        for(let del_btn of reply_del_btns){
            del_btn.addEventListener('click',(e)=>{
                let target = e.target.closest('article').querySelector('.reply_delete');
                target.setAttribute('open','open');
            });
        }

        for(let reply_c_btn of dialog_close_btns){
            reply_c_btn.addEventListener('click',(e)=>{
                let target = e.target.closest('dialog');
                target.removeAttribute('open');
            });
        }





    </script>
</body>
</html>