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
    <title>Radar Chart</title>
    <script src="chart/dist/Chart.bundle.js"></script>
    <script src="chart/utils.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
    <div style="width:100%">
        <canvas id="canvas" height = "100%" width = "100%"></canvas>
    </div>
    <button id="randomizeData">Randomize Data</button>
    <script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: ["어린이집", "병원","보건소","공원", ["돌봄","네트워크"]],
            datasets: [{
                label: "My First dataset",
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                pointBackgroundColor: window.chartColors.red,
                data: [
                    100,100,100,100,100
					
                ]
            }, {
                label: "My Second dataset",
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                borderColor: window.chartColors.blue,
                pointBackgroundColor: window.chartColors.blue,
                data: [
                   	<?=$array0[0]?>,
					<?=$array1[0]?>,
					<?=$array2[0]?>,
					<?=$array3[0]?>,
					<?=$array4[0]?>,
                ]
            },]
        },
        options: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
            },
            scale: {
              ticks: {
                beginAtZero: true
              }
            }
        }
    };

    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });
        });

        window.myRadar.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
        var colorName = colorNames[config.data.datasets.length % colorNames.length];;
        var newColor = window.chartColors[colorName];

        var newDataset = {
            label: 'Dataset ' + config.data.datasets.length,
            borderColor: newColor,
            backgroundColor: color(newColor).alpha(0.2).rgbString(),
            pointBorderColor: newColor,
            data: [],
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
        }

        config.data.datasets.push(newDataset);
        window.myRadar.update();
    });

    document.getElementById('addData').addEventListener('click', function() {
        if (config.data.datasets.length > 0) {
            config.data.labels.push('dataset #' + config.data.labels.length);

            config.data.datasets.forEach(function (dataset) {
                dataset.data.push(randomScalingFactor());
            });

            window.myRadar.update();
        }
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
        config.data.datasets.splice(0, 1);
        window.myRadar.update();
    });

    document.getElementById('removeData').addEventListener('click', function() {
        config.data.labels.pop(); // remove the label first

        config.data.datasets.forEach(function(dataset) {
            dataset.data.pop();
        });

        window.myRadar.update();
    });
    </script>
</body>

</html>
