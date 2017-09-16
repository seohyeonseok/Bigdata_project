<?php

$local = $_GET['local'];

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
}

//2. 문자셋 지정
if(! $connect->set_charset($mysql_charset))// (php >= 5.0.5)
{

}


//3. 쿼리 생성


$query[$area][0] = ' select Y2015 from data where district=\''.$local.'\'';
$query[$area][1] = ' select Y2015 from data where district=\''.$local.'\'';
$query[$area][2] = ' select Y2015 from data where district=\''.$local.'\'';
$query[$area][3] = ' select Y2015 from data where district=\''.$local.'\'';
$query[$area][4] = ' select Y2015 from data where district=\''.$local.'\'';


//4. 쿼리 실행
for($j=0;$j<=5;$j++) {
		$result[$area][$j] = $connect->query($query[$area][$j]) or die($this->_connect->error);	
	}


//5. 결과 처리
for($j=0;$j<=5;$j++) {
	$k=0;
	while($array = $result[$area][$j]->fetch_array()) {
		$save[$area][$j] = $array[0];
		$k++;
	}
	$k=0;
}
	


?>


<html>

<head>
    <title>Polar Area Chart</title>
    <script src="chart/dist/Chart.bundle.js"></script>
    <script src="chart/dist/utils.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
    <div id="canvas-holder" style="width:100%">
        <canvas id="chart-area"></canvas>
    </div>
    <script>


    var chartColors = window.chartColors;
    var color = Chart.helpers.color;
    var config = {
        data: {
            datasets: [{
                data: [
					
					<?=$save[0][0]?>,
					<?=$save[0][0]?>,
					<?=$save[0][0]?>,
					<?=$save[0][0]?>,
					<?=$save[0][0]?>,
                ],
                backgroundColor: [
                    color(chartColors.red).alpha(0.5).rgbString(),
                    color(chartColors.orange).alpha(0.5).rgbString(),
                    color(chartColors.yellow).alpha(0.5).rgbString(),
                    color(chartColors.green).alpha(0.5).rgbString(),
                    color(chartColors.blue).alpha(0.5).rgbString(),
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "어린이집 점수",
                "병원 점수",
                "보건소 점수",
                "공원 점수",
                "돌봄네트워크 점수"
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Chart.js Polar Area Chart'
            },
            scale: {
              ticks: {
                beginAtZero: true
              },
              reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area");
        window.myPolarArea = Chart.PolarArea(ctx, config);
    };
	
   </script>
	
</body>

</html>
