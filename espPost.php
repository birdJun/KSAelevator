<?php

    $서버이름 = "###############";
    $사용자이름 = "#############";
    $비밀번호 = "###############";
    $데이터베이스="#############";

   if($데이터베이스연결 = mysqli_connect($서버이름, $사용자이름, $비밀번호, $데이터베이스)){
      
      #$sql="INSERT INTO `데이터 베이스 이름` (`dev`, `sto`, `ppl`, `time`) VALUES ('" . $_GET['dev'] . "', '" . $_GET['sto'] . "', " . $_GET['ppl']. ", '". date("Y-m-d H:i:s") ."');";
      $sql="UPDATE `데이터베이스 이름` SET  `sto`='". $_GET['sto'] ."' WHERE `dev`='". $_GET['dev'] ."';";
      $결과=$데이터베이스연결->query($sql);
      
   }else{
      die("DB 접속 에러");
   }
   echo($_GET['dev'])
?>
