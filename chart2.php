<?php

$local2 = $_GET['local2'];

//1. DB 연결
$connect= mysqli_connect("localhost", "root", "toor","Bigwave");


//2. 문자셋 지정
if(! $connect->set_charset($mysql_charset))// (php >= 5.0.5)
{

}


$query0 = ' select center_point  from point where district=\''.$local2.'\'';

$result0 = $connect->query($query0);

$array0 = $result0->fetch_array();


$query1 = ' select hos_point  from point where district=\''.$local2.'\'';

$result1 = $connect->query($query1);

$array1 = $result1->fetch_array();


$query2 = ' select pub_point  from point where district=\''.$local2.'\'';

$result2 = $connect->query($query2);

$array2 = $result2->fetch_array();


$query3 = ' select park_point  from point where district=\''.$local2.'\'';

$result3 = $connect->query($query3);

$array3 = $result3->fetch_array();


$query4 = ' select network_point  from point where district=\''.$local2.'\'';

$result4 = $connect->query($query4);

$array4 = $result4->fetch_array();



/*
echo $array[0];

$select_query = 'select center_point from point where district=\''.$local2.'\'';
   $result_set = mysqli_query($connect, $select_query);

   $row = mysqli_fetch_array($result_set);
   echo $row;
  */ 
/*
//3. 쿼리 생성

$query[0] = ' select center_point  from point where district=\''.$local2.'\'';
$query[1] = ' select hos_point     from point where district=\''.$local2.'\'';
$query[2] = ' select pub_point     from point where district=\''.$local2.'\'';
$query[3] = ' select park_point    from point where district=\''.$local2.'\'';
$query[4] = ' select network_point from point where district=\''.$local2.'\'';

echo $query[0];
//4. 쿼리 실행

	$result[0] = $connect->query($query[0]); 
	$result[1] = $connect->query($query[1]);
	$result[2] = $connect->query($query[2]);
	$result[3] = $connect->query($query[3]);
	$result[4] = $connect->query($query[4]);

//5. 결과 처리

	$array[0] = $result[0]->fetch_row();
echo $array[0];

 $save[0] = $array[0];
 echo $save[0];
	
	 $save[0]=$array[0];
	 $save[1]=$array[1];
	 $save[2]=$array[2];
	 $save[3]=$array[3];
	 $save[4]=$array[4];
echo $save[0];
*/
?>

<!doctype html>
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
				
					<?=$array0[0]?>,
					<?=$array1[0]?>,
					<?=$array2[0]?>,
					<?=$array3[0]?>,
					<?=$array4[0]?>,
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

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(piece, i) {
            piece.data.forEach(function(value, j) {
                config.data.datasets[i].data[j] = randomScalingFactor();
            });
        });
        window.myPolarArea.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addData').addEventListener('click', function() {
        if (config.data.datasets.length > 0) {
            config.data.labels.push('data #' + config.data.labels.length);
            config.data.datasets.forEach(function(dataset) {
                var colorName = colorNames[config.data.labels.length % colorNames.length];
                dataset.backgroundColor.push(window.chartColors[colorName]);
                dataset.data.push(randomScalingFactor());
            });
            window.myPolarArea.update();
        }
    });
    document.getElementById('removeData').addEventListener('click', function() {
        config.data.labels.pop(); // remove the label first
        config.data.datasets.forEach(function(dataset) {
            dataset.backgroundColor.pop();
            dataset.data.pop();
        });
        window.myPolarArea.update();
    });
	
   </script>
	
</body>

</html>