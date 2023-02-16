<?php
    $hostname = "localhost";
    $dbuserid = "bbs";
    $dbpasswrd = "1111";
    $dbname = "bbs";

    $conn= new mysqli($hostname,$dbuserid,$dbpasswrd,$dbname);
    
    //연결 체크
    if($conn -> connect_errno){
       //die("Connection Fail!".$conn->connect_errno);
       echo "Connection Fail!".$conn->connect_errno;
       exit();
    }
    //echo "Connection Success";

?>