<?php

echo "<h1>output</h1>";
/**
 * mysqli 클래스 방식
 * 샘플예제 입니다. 대충 어떻게 동작되는지 공부하시기에 좋게 정리해놓았습니다.
 * 각각의 값을 변경하고 연결테스트 하기에도 좋습니다.
*/
//0. 설정

$mysql_hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = '1234';
$mysql_database = 'exam';
$mysql_port = '3307';
$mysql_charset = 'utf-8';


//1. DB 연결
$connect = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port);

if($connect->connect_errno){
	echo '[fail] : '.$connect->connect_error.'<br>'; 
} else {
	echo '[sucess]<br>';
}

//2. 문자셋 지정

 

if(! $connect->set_charset($mysql_charset))// (php >= 5.0.5)
{
	echo '[fail to change charset] : '.$connect->connect_error;
	echo "<br>";
}


//3. 쿼리 생성
$query[0] = ' select province from data ';
$query[1] = ' select district from data ';
$query[2] = ' select age from data ';
$query[3] = ' select Y2015 from data ';
$query[4] = ' select Y2016 from data ';
$query[5] = ' select Y2017 from data ';
$query[6] = ' select Y2018 from data ';
$query[7] = ' select Y2019 from data ';
$query[8] = ' select Y2020 from data ';
$query[9] = ' select Y2021 from data ';
$query[10] = ' select Y2022 from data ';
$query[11] = ' select Y2023 from data ';
$query[12] = ' select Y2024 from data ';
$query[13] = ' select Y2025 from data ';
$query[14] = ' select Y2026 from data ';


//4. 쿼리 실행
for($i=0;$i <= 14;$i++) {
	$result[$i] = $connect->query($query[$i]) or die($this->_connect->error);
}


//5. 결과 처리
$j=0;
for($i=0;$i <= 14;$i++) {
	while($row = $result[$i]->fetch_array()) {
		$save[$i][$j] = $row[0];			
		$j++;
	}
	$j=0;
}
for($i=0;$i <= 255;$i++) {
	for($j=0;$j<=14;$j++) {
	echo $save[$j][$i];
	echo "  ";
	}
	echo "<br>";
}


//6. 연결 종료
$connect->close();
?>