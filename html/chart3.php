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
$query[$grade][0] = ' select Y2015 from data where district=\''.$local.'\'';

//4. 쿼리 실행
$result[$area][$j] = $connect->query($query[$grade][0]) or die($this->_connect->error);	

//5. 결과 처리
$array = $result[$area][$j]->fetch_array();
$save[$grade][0] = $array[0];
?>

<html>

<head>
    <title>Bar Chart</title>
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
    <div id="container" style="width: 200%;">
        <canvas id="canvas"></canvas>
    </div>
    <script>
	   var avg = 6.11585194;
       var color = Chart.helpers.color;
        var barChartData = {
            datasets: [{
                label: '경기도평균',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
					avg
                ]
            }, {
                label: '<?=$local?>',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
					<?=$save[0][0]?>
                ]
            }]

        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            });

        };

    </script>
</body>

</html>
