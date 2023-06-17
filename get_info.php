<?php

   
    $서버이름 = "###############";
    $사용자이름 = "#############";
    $비밀번호 = "###############";
    $데이터베이스="#############";

   if($데이터베이스연결 = mysqli_connect($서버이름, $사용자이름, $비밀번호, $데이터베이스)){
      
      #$sql="INSERT INTO `데이터베이스 이름` (`dev`, `sto`, `ppl`, `time`) VALUES ('" . $_GET['dev'] . "', '" . $_GET['sto'] . "', " . $_GET['ppl']. ", '". date("Y-m-d H:i:s") ."');";
      $sql="SELECT dev,sto,ppl,drc FROM 데이터베이스 이름";
      $결과=$데이터베이스연결->query($sql);
      
      #이 아래는 엘리베이터 설정에 맞게 편집하세요
      if ($결과->num_rows>0){
        $data=array();
        $data['Tamgu']=array();
        $data['Changjo']=array();
        while($row=$결과->fetch_assoc()){
            if((substr($row['dev'],0,2))=='Te'){
                $data['Tamgu']['inElevator']=array();
                $data['Tamgu']['inElevator']['sto']=$row['sto'];
                $data['Tamgu']['inElevator']['ppl']=$row['ppl'];
                $data['Tamgu']['inElevator']['drc']=$row['drc'];
            } elseif((substr($row['dev'],0,2))=='Ce'){
                $data['Changjo']['inElevator']=array();
                $data['Changjo']['inElevator']['sto']=$row['sto'];
                $data['Changjo']['inElevator']['ppl']=$row['ppl'];
                $data['Changjo']['inElevator']['drc']=$row['drc'];
            } elseif((substr($row['dev'],0,1))=='T'){
                $data['Tamgu'][$row['dev']]=$row['ppl'];
            } else{
                $data['Changjo'][$row['dev']]=$row['ppl'];
            }
            
        }
        echo json_encode($data);
      } else{
        echo("데이터가 없습니다");
      }

      
   }else{
      die("DB 접속 에러");
   }
?>