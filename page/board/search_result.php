<?php 
    include $_SERVER['DOCUMENT_ROOT']."/bbs/inc/db.php";

    $category = $_GET['search_cat'];
    $keyword = $_GET['search'];
    if($category == "title"){
        $catname = "제목";
    }
    if($category == "name"){
        $catname = "글쓴이";
    }
    if($category == "content"){
        $catname = "내용";
    }

    $page = $_GET['page'] ?? 1;
    $pagesql = "SELECT COUNT(*) AS cnt FROM board WHERE $category LIKE '%$keyword%' order by idx desc";
    $page_result = $conn->query($pagesql);
    $page_row = $page_result->fetch_assoc();
    print_r($page_row['cnt']);
    $row_num = $page_row['cnt']; //전체 게시물 수
    

    $list = 10; //페이지당 출력할 게시물 수
    $block_ct = 5;
    $block_num = ceil($page/$block_ct);//page9,  9/5 1.2 2
    $block_start = (($block_num -1)*$block_ct) + 1;//page6 start 6
    $block_end = $block_start + $block_ct -1; //start 1, end 5

    $total_page = ceil($row_num/$list); //총42, 42/5
    if($block_end > $total_page) $block_end = $total_page;
    $total_block = ceil($total_page/$block_ct);//총32, 2

    $start_num = ($page -1) * $list;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../css/bbs_style.css">
</head>
<body>
<div class="container">
        <h1><a href="../../index.php">자유게시판</a></h1>
        <h2><?php echo $catname; ?>: <?php echo $keyword; ?>검색 결과<?php echo $row_num; ?></h2>
        <table class="table table-hover">
            <colgroup>
                <col class="col1">
                <col class="col2">
                <col class="col3">
                <col class="col4">
                <col class="col4">
                <col class="col4">
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>작성일</th>
                    <th>조회수</th>
                    <th>추천수</th>
                </tr>
            </thead>
            <tbody>
                <?php                    


                    $sql = "SELECT * from board where $category like '%$keyword%' order by idx desc limit $start_num,$list";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){   
                    $title = $row['title'];
                    
                    //댓글 수 확인
                    $bno = $row['idx'];

                    $rc_sql = "SELECT COUNT(*) as cnt FROM reply where con_num=$bno";
                    $rc_sql_result = $conn->query($rc_sql);
                    $rc_row = $rc_sql_result->fetch_assoc();


                    if($rc_row['cnt'] > 0){
                        $rc = " [".$rc_row['cnt']."]";
                    }else{
                        $rc ='';
                    }

                    if(mb_strlen($title) > 10){
                        $title = str_replace($row['title'],mb_substr($row['title'], 0, 10)."...",$row['title']);
                    } 
                ?>
                <tr>
                    <td><?php echo $row['idx']; ?></td>
                    <td>
                        <?php    
                            $post_time = $row['date'];
                            $now = date('Y-m-d');
                            if($post_time == $now){
                                $icon = '<i class="fa-solid fa-pizza-slice"></i>';
                            } else{
                                $icon='';
                            }

                            if($row['lock_post'] == 1){
                        ?>
                         <a href="page/board/lock_read.php?idx=<?php echo $row['idx']; ?>">
                            <?php echo $title.$rc; ?><i class="fa-solid fa-lock"></i><?php echo $icon; ?>
                        </a>

                        <?php } else { ?>
                        <a href="page/board/read.php?idx=<?php echo $row['idx']; ?>">
                            <?php echo $title.$rc; ?><?php echo $icon; ?>
                        </a>
                        <?php }  ?>
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['hit']; ?></td>
                    <td><?php echo $row['thumbsup']; ?></td>
                </tr>
                <?php } ?>
            </tbody>            
        </table>
        <div class="pagination">
            <ul>
                <?php
                    if($page>1){                   
                        echo '<li><a href="?search_cat='.urlencode($category).'&search='.urlencode($keyword).'&page=1" class="button">이전</a></li>';
                        if($block_num > 1){
                            $prev = ($block_num-2)*$list + 1;
                            echo '<li><a href="?search_cat='.urlencode($category).'&search='.urlencode($keyword).'&page='.$prev.'" class="button">이전</a></li>';
                        }
                    }

                    for($i=$block_start;$i<=$block_end;$i++){
                        if($page == $i){
                            echo '<li><a href="?search_cat='.urlencode($category).'&search='.urlencode($keyword).'&page='.$i.'" class="active">'.$i.'</a></li>';
                        }else{
                            echo '<li><a href="?search_cat='.urlencode($category).'&search='.urlencode($keyword).'&page='.$i.'">'.$i.'</a></li>';
                        }
                    }

                if($page<$total_page){
                    if($total_block > $block_num){
                        $next = $block_num*$list + 1;
                        echo '<li><a href="?search_cat='.urlencode($category).'&search='.urlencode($keyword).'&page='.$next.'" class="button">다음</a></li>';
                    }
                    echo '<li><a href="?search_cat='.urlencode($category).'&search='.urlencode($keyword).'&page='.$total_page.'" class="button">마지막</a></li>';
                }
                ?>
            </ul>
        </div>
        <div class="search_form">
            <form action="search_result.php" method="get">
                <select name="search_cat" id="">
                    <option value="title">제목</option>
                    <option value="name">글쓴이</option>
                    <option value="content">내용</option>
                </select>
                <input type="search" name="search" required>
                <button>검색</button>
            </form>
        </div>
        <div class="board_btns">
            <a href="./page/board/write.php">글쓰기</a>
        </div>
    </div>
    <?php
        $conn->close();
    ?>
</body>
</html>
