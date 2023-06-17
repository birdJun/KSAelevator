<?php

    $서버이름 = "##########";
    $사용자이름 = "########";
    $비밀번호 = "##########";
    $데이터베이스="########";

   if($데이터베이스연결 = mysqli_connect($서버이름, $사용자이름, $비밀번호, $데이터베이스)){
      
      $sql="UPDATE `데이터베이스이름` SET  `sto`='". $_GET['sto'] ."' , `ppl`='". $_GET['ppl'] ."', `drc`='". $_GET['drc'] ."' , `time`='". date("Y-m-d H:i:s") ."' WHERE `dev`='". $_GET['dev'] ."';";
      
      $결과=$데이터베이스연결->query($sql);
      
   }else{
      die("DB 접속 에러");
   }
   echo($_GET['dev'])
?>