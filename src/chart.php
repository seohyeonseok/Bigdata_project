<?php

$local = $_GET['local'];

$mysql_hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = 'toor';
$mysql_database = 'Bigwave';
$mysql_port = '3306';
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
for($age = 0; $age<=5; $age++) { 
$query[$age][0] = ' select Y2015 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][1] = ' select Y2016 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][2] = ' select Y2017 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][3] = ' select Y2018 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][4] = ' select Y2019 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][5] = ' select Y2020 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][6] = ' select Y2021 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][7] = ' select Y2022 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][8] = ' select Y2023 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][9] = ' select Y2024 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][10] = ' select Y2025 from child where age='.$age.' and district=\''.$local.'\'';
$query[$age][11] = ' select Y2026 from child where age='.$age.' and district=\''.$local.'\'';
}
//4. 쿼리 실행
for($age=0;$age <= 5;$age++) {
	for($j=0;$j<=11;$j++) {
		$result[$age][$j] = $connect->query($query[$age][$j]) or die($this->_connect->error);	
	}
}

//5. 결과 처리
for($age=0;$age<=5;$age++) {
	for($j=0;$j<=11;$j++) {
		$k=0;
		while($array = $result[$age][$j]->fetch_array()) {
			$save[$age][$j] = $array[0];
			$k++;
		}
		$k=0;
	}
	
}

?>

<!doctype html>
<html>

<head>
    <title>Line Chart</title>
    <script src="../chart/dist/Chart.bundle.js"></script>
    <script src="../chart/dist/utils.js"></script>
    <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
    <div style="width:100%;">
        <canvas id="canvas"></canvas>
    </div>
    <script>
        var MONTHS = ["2015년","2016년","2017년","2018년","2019년","2020년","2021년","2022년","2023년","2024년","2025년","2026년"];
        var config = {
            type: 'line',
            data: {
                labels: ["2015년","2016년","2017년","2018년","2019년","2020년","2021년","2022년","2023년","2024년","2025년","2026년"],
                datasets: [{
                    label: "0세",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        <?=$save[0][0]?>,
						<?=$save[0][1]?>,
						<?=$save[0][2]?>,
						<?=$save[0][3]?>,
						<?=$save[0][4]?>,
						<?=$save[0][5]?>,
						<?=$save[0][6]?>,
						<?=$save[0][7]?>,
						<?=$save[0][8]?>,
						<?=$save[0][9]?>,
						<?=$save[0][10]?>,
						<?=$save[0][11]?>
                    ],
                    fill: false,
                }, {
                    label: "1세",
                    fill: false,
                    backgroundColor: window.chartColors.orange,
                    borderColor: window.chartColors.orange,
                    data: [
                        <?=$save[1][0]?>,
						<?=$save[1][1]?>,
						<?=$save[1][2]?>,
						<?=$save[1][3]?>,
						<?=$save[1][4]?>,
						<?=$save[1][5]?>,
						<?=$save[1][6]?>,
						<?=$save[1][7]?>,
						<?=$save[1][8]?>,
						<?=$save[1][9]?>,
						<?=$save[1][10]?>,
						<?=$save[1][11]?>
                    ],
                }, {
                    label: "2세",
                    fill: false,
                    backgroundColor: window.chartColors.yellow,
                    borderColor: window.chartColors.yellow,
                    data: [
                        <?=$save[2][0]?>,
						<?=$save[2][1]?>,
						<?=$save[2][2]?>,
						<?=$save[2][3]?>,
						<?=$save[2][4]?>,
						<?=$save[2][5]?>,
						<?=$save[2][6]?>,
						<?=$save[2][7]?>,
						<?=$save[2][8]?>,
						<?=$save[2][9]?>,
						<?=$save[2][10]?>,
						<?=$save[2][11]?>
                    ],
                }, {
                    label: "3세",
                    fill: false,
                    backgroundColor: window.chartColors.green,
                    borderColor: window.chartColors.green,
                    data: [
                        <?=$save[3][0]?>,
						<?=$save[3][1]?>,
						<?=$save[3][2]?>,
						<?=$save[3][3]?>,
						<?=$save[3][4]?>,
						<?=$save[3][5]?>,
						<?=$save[3][6]?>,
						<?=$save[3][7]?>,
						<?=$save[3][8]?>,
						<?=$save[3][9]?>,
						<?=$save[3][10]?>,
						<?=$save[3][11]?>
                    ],
                }, {
                    label: "4세",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
                        <?=$save[4][0]?>,
						<?=$save[4][1]?>,
						<?=$save[4][2]?>,
						<?=$save[4][3]?>,
						<?=$save[4][4]?>,
						<?=$save[4][5]?>,
						<?=$save[4][6]?>,
						<?=$save[4][7]?>,
						<?=$save[4][8]?>,
						<?=$save[4][9]?>,
						<?=$save[4][10]?>,
						<?=$save[4][11]?>
                    ],
                }, {
                    label: "5세",
                    fill: false,
                    backgroundColor: window.chartColors.purple,
                    borderColor: window.chartColors.purple,
                    data: [
                        <?=$save[5][0]?>,
						<?=$save[5][1]?>,
						<?=$save[5][2]?>,
						<?=$save[5][3]?>,
						<?=$save[5][4]?>,
						<?=$save[5][5]?>,
						<?=$save[5][6]?>,
						<?=$save[5][7]?>,
						<?=$save[5][8]?>,
						<?=$save[5][9]?>,
						<?=$save[5][10]?>,
						<?=$save[5][11]?>
                    ],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                    text:'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Year'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });

            });

            window.myLine.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[config.data.datasets.length % colorNames.length];
            var newColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + config.data.datasets.length,
                backgroundColor: newColor,
                borderColor: newColor,
                data: [],
                fill: false
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            config.data.datasets.push(newDataset);
            window.myLine.update();
        });

        document.getElementById('addData').addEventListener('click', function() {
            if (config.data.datasets.length > 0) {
                var month = MONTHS[config.data.labels.length % MONTHS.length];
                config.data.labels.push(month);

                config.data.datasets.forEach(function(dataset) {
                    dataset.data.push(randomScalingFactor());
                });

                window.myLine.update();
            }
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            config.data.datasets.splice(0, 1);
            window.myLine.update();
        });

        document.getElementById('removeData').addEventListener('click', function() {
            config.data.labels.splice(-1, 1); // remove the label first

            config.data.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myLine.update();
        });
    </script>
</body>

</html>