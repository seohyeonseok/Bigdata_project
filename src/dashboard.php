<?php


class Local { 

    public $LEnglish = array('ahns','as','ay','bc','ddc','ejb','ew','ggp','gl','gpn','gy','hn','hs','kc','kj',
	'km','kp','lc','nyj','os','pc','pj','pt','sh','sn','sw','yc','yi','yjn','yj','yp');
	public $LKorea = array('안성시','안산시','안양시','부천시','동두천시','의정부시','의왕시',
	'김포시','구리시','가평군','고양시','하남시','화성시','과천시','광주시','광명시','군포시','이천시','남양주시'
	,'오산시','포천시','파주시','평택시','시흥시','성남시','수원시','연천군','용인시','여주군','양주시','양평군');
	public $childNum  = array();
	public $homeNum = array();
	public $MaxNum = array();
} 

$Local = new Local; 
/**
 * mysqli 클래스 방식
 * 샘플예제 입니다. 대충 어떻게 동작되는지 공부하시기에 좋게 정리해놓았습니다.
 * 각각의 값을 변경하고 연결테스트 하기에도 좋습니다.
*/
//0. 설정

$mysql_hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = 'toor';
$mysql_database = 'Bigwave';
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
$query[0] = ' select local from kindergarden';
$query[1] = ' select childNum from kindergarden ';
$query[2] = ' select homeNum from kindergarden';
$query[3] = ' select MaxNum from kindergarden';

//4. 쿼리 실행
for($i=0;$i <= 3;$i++) {
	
	$result[$i] = $connect->query($query[$i]) or die($this->_connect->error);
}

//5. 결과 처리
$j=0;
for($i=0;$i <= 3;$i++) {
	while($row = $result[$i]->fetch_array()) {
		
		$save[$i][$j] = $row[0];			
		$j++;
	}
	$j=0;
}

	for($i=0;$i<=30;$i++) {
		$save[0][$i] = $Local->LKorea[$i];
		$Local->childNum[$i] = $save[1][$i];
		$Local->homeNum[$i] = $save[2][$i];
		$Local->MaxNum[$i]= $save[3][$i];
	}
/*
for($i=0; $i<=30;$i++) {
	
	echo $Local->LKorea[$i];
	echo "  ";
	echo $Local->childNum[$i];
	echo "  ";
	echo $Local->homeNum[$i];
	echo "  ";
	echo $Local->MaxNum[$i];
	echo "<br>";
}*/
?>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agency - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">
  <!-- map -->
  
  
  <style>
  	span { 
    font-weight: bold;
  	 font-size: 30px;
  	 color: 	#000000 ;
  	}
  	
    path:hover
    {
      opacity: 0.5;
      fill: #FFA500;
    }
  </style>  

 
  <script>
    function f(e,child,home,Max,Src) {
	
	  var local,local2,local3;
	  var Path = document.getElementById("path");	
	  var Cid = e;
	  var child = child;
      var Span = document.getElementById("cityName");
	  var childSpan = document.getElementById("childNum");
	  var homeSpan = document.getElementById("homeNum");
	  var maxSpan = document.getElementById("MaxNum");
	  //var newSrc = Src;
	  
	var English = ['ahns','as','ay','bc','ddc','ejb','ew','ggp','gl','gpn','gy','hn','hs','kc','kj',
	'km','kp','lc','nyj','os','pc','pj','pt','sh','sn','sw','yc','yi','yjn','yj','yp'];
	
	var Korea = ['안성시','안산시','안양시','부천시','동두천시','의정부시','의왕시',
	'김포시','구리시','가평군','고양시','하남시','화성시','과천시','광주시','광명시','군포시','이천시','남양주시'
	,'오산시','포천시','파주시','평택시','시흥시','성남시','수원시','연천군','용인시','여주군','양주시','양평군'];
	

	  
	  for(var i=0;i<31;i++) {
		  if(e==Korea[i]) {
			  break;
		  }
	  }
	  local = "chart.php?" + "local=" + English[i] + "&";
	  local2 = "chart4.php?" + "local2=" + English[i] + "&";
	  local3 = "chart3.php?" + "local3=" + English[i] + "&";
	  document.getElementById("chart").src = local;
	  document.getElementById("chart2").src = local2;
	  document.getElementById("chart3").src = local3;
      Span.style.color = "#FFA500";
	  Span.innerHTML = Cid;
	  childSpan.innerHTML = child;
	  homeSpan.innerHTML = home;
	  maxSpan.innerHTML = Max;
	}
	
	function f_over(e){
		/*
	var Path = document.getElementById("path");	
	var Cid = e;
	var Span = document.getElementById("cityName");
	Span.style.color = "#FFA500";
	Span.innerHTML = Cid;
	*/
	}
	
	</script>
	
	
	
 <script>
    function f_init(newSrc){

      var Span = document.getElementById("cityName");
	  var childSpan = document.getElementById("childNum");
	  var homeSpan = document.getElementById("homeNum");
	  var maxSpan = document.getElementById("MaxNum");

      Span.innerHTML = "경기도";
	  childSpan.innerHTML = "&nbsp;";
	  homeSpan.innerHTML = "&nbsp;";
	  maxSpan.innerHTML = "&nbsp;";
      Span.style.color = "#000000";
	  document.getElementById("chart").src = newSrc;
    }
  </script>
  
  


</head>

    
    <div class="row">
    <br>


	  
      <div class="col-md-4" >
    
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="us_map" x="0px" y="0px" width="400" height="800" viewBox="70 50 200 280"  xml:space="preserve" preserveAspectRatio="none" >

 <g id="경기도">
 
	<g id = "김포시" name="p1" 
	onclick="f(id,<?php echo $Local->childNum[7]?>,<?php echo $Local->homeNum[7]?>,<?php echo $Local->MaxNum[7]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=593018270&amp;format=interactive')"
	onmouseover="f_over(id)"
	> 
	 <path id="김포시" d="M131.417,159.105l-16.167-11l2.833-5.5l-1.833-3.833l-0.667-6.333
		l-3.167,0.333l-3.333,4.333l-6.333-0.5l-1.833-2.167l-3.667,0.167l1,2.833l0.333,2.333l-0.5,0.833l1,5.333v2.667l0.833,3.333
		l-0.167,3l2.833,2.833v2.667l0.833,2.5l7.667-3.333l2.5-4.5l10.833,8l6.667,0.667l1.667-3.167L131.417,159.105z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">

 </path>
  </g>
  
  <g id = "고양시"  onclick="f(id,<?php echo $Local->childNum[10]?>,<?php echo $Local->homeNum[10]?>,<?php echo $Local->MaxNum[10]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1336686484&amp;format=interactive')"
	onmouseover="f_over(id)"
   >
  <path  id="고양시" d="M117.083,145.772l2.5,0.333l4.167-1l6.167-0.5l2.333-4.333l2.333,0.833
		l4.5-0.833l3.5,2l3-3.667l2.5,0.333l-0.833,2.5v5.667l-0.833,2.5l3.667-0.5l2-2.5l4,2.333l-0.833,5.333l-0.833,2l-2.333-2
		l-1.667-2.833l-2.667,3l-2,0.667l-0.333,6.5l-2.5,0.667l-2,2l-3.5-0.167l-4.5-3l-1.5-2l-16.167-11L117.083,145.772z" fill="#B9B9B9"stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#ba3a30">
  </path>
   </g>
   
  <g id = "파주시" onclick="f(id,<?php echo $Local->childNum[21]?>,<?php echo $Local->homeNum[21]?>,<?php echo $Local->MaxNum[21]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=642822107&amp;format=interactive')"
	onmouseover="f_over(id)"
  >
  <path id="파주시" d="M116.583,124.439l3.167-1.667l7.333-0.667l-6-9.833l-5.5-0.333l0.167-6.5
		l5.833,3.667l2.833-3l-0.167-1.833l2.5-3.5l1.667,2.333l1.167,5.667l-0.667,3l2.333,0.167l0.833,3.333l2.5-0.833l1.667-10.333
		l2.167-3.167l5.167,2.5l0.5-5l3.5,2.167l3.833-0.167l2.667-2.833l4.5,2.833l-5.333,7.667l-2.667,3.333l-1,9.667l-0.833,2.667
		l-2.333-0.333l-0.667,3.167l0.5,4.5l2.5,1.667l-0.167,6l-3-0.167l-3,3.667l-3.5-2l-4.5,0.833l-2.333-0.833l-2.333,4.333l-6.167,0.5
		l-4.167,1l-3-0.333l1.5-3.167l-1.833-3.833l-0.667-6.333L116.583,124.439z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "양주시" onclick="f(id,<?php echo $Local->childNum[29]?>,<?php echo $Local->homeNum[29]?>,<?php echo $Local->MaxNum[29]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1509383809&amp;format=interactive')"
	onmouseover="f_over(id)"
	>
  <path  id="양주시" d="M158.083,109.272l-4.333-1.333l-3.167,3.5l-1,9.667l-0.833,2.667
		l-2.333-0.333l-0.667,3.167l0.5,4.5l2.5,1.667l-0.167,6l-1.333,2.667v5.667l-0.833,2.5l3.667-0.5l2-2.5l4,2.333l3.333-3.833
		l-1.5-4.833l-1.833-3.333l3-2.333l3.833,0.833l4-1.5l3.667-1.667l1.167-6l-1.5-6l-7.833-1.667l-1.333-3.667l-3.833-1.833
		L158.083,109.272z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "의정부시" onclick="f(id,<?php echo $Local->childNum[5]?>,<?php echo $Local->homeNum[5]?>,<?php echo $Local->MaxNum[5]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=205523089&amp;format=interactive')"
  onmouseover="f_over(id)"
  >
  <path id="의정부시" d="M174.583,136.939l-2,2.833l-0.5,2l-4.167,5.167l-3-0.333l-1.667,1.333
		l-3.833-2.833l-1.5-4.833l-1.833-3.333l3-2.333l3.833,0.833l7.667-3.167l2.667,2.167L174.583,136.939z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "동두천시" onclick="f(id,<?php echo $Local->childNum[4]?>,<?php echo $Local->homeNum[4]?>,<?php echo $Local->MaxNum[4]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1681972848&amp;format=interactive')"
	onmouseover ="f_over(id)"
	>
  <path  id="동두천시" d="M163.917,101.939l-6.167,7.833l-0.5,3.333l3.667,2.333l1.5,3.167
		l7.833,1.667l2.333-2.167h2.167l0.667-3.167l-1.833-3.333l-5.167-5v-3.833L163.917,101.939z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#e3ab32">
  </path>
   </g>
   
  <g id = "연천군" title = "연천군" onclick="f(id,<?php echo $Local->childNum[26]?>,<?php echo $Local->homeNum[26]?>,<?php echo $Local->MaxNum[26]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=327867426&amp;format=interactive')"
  onmouseover="f_over(id)"
  >

  <path id="연천군" d="M144.25,86.439l-1.667,5.833l-0.667,3.667l-5.333-2.667l-1.167,5
		l-2.333,1.5l1,4.5l2.167-0.167l2.167-3.167l5.167,2.5l0.5-4.5l3.5,1.667l3.833-0.167l2.667-2.833l4.5,2.833l-4.833,7.5l3.833,1.167
		l6.333-7.167l4.5,0.833l0.167-2.5h2.167l2.5,0.333l1.667-2l-0.833-6.333l-2.333-0.5l-0.167-2.333l3.667-2.833l4.167,1.333v-6.833
		l0.5-12.167l-2.167-3.5l-2.167-5.333l-3.5,1.833l-1.833-2.333l0.167-6.833l-9.333,4.667l-6.333,4.833l-2.167,4.333l-2.167-1.5
		l-4.167,2l-2.333-0.667l-3-4l-15.667,16l3.833,3.667l1.333,3.167l6.167,0.333l4.333-2.167L144.25,86.439z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#f5ef84">
  </path>
 </g>
  
  <g id = "포천시" onclick="f(id,<?php echo $Local->childNum[20]?>,<?php echo $Local->homeNum[20]?>,<?php echo $Local->MaxNum[20]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=361904221&amp;format=interactive')"
  onmouseover ="f_over(id)"
  >
  <path  id="포천시" d="M174.583,136.939l4.5-0.167l3.667-1l2.5,0.667l5.167-3.333l2.667-14.167
		h3.833l1.167-8.167l5.833-1.833l0.333-6.167l4.667-6.333l1.667-4.167l2.5-0.833l-1.667-10.167l-1.667-1.167l-1.167,1.667l-5.5-2
		l-3.667,2.667l-1.5,1.5l-2-3.5l-4.167-1l1.5-8.5l-2.167-1.333l-7.333,6.333l-4.167-3.833v8l-0.333,7.333l-4-0.833l-3.667,2.833
		l0.167,2.333l2.667,1.833l0.5,5l-1.667,2l-4.667-0.333l-0.167,6.333l4.667,4.333l2,3.167l-0.333,4h-2.167l-2.333,2.167l1.667,6.5
		l-1.333,5.5l3.167,2.833L174.583,136.939z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#e3ab32">
  </path>
   </g>
  
  <g id = "구리시" onclick="f(id,<?php echo $Local->childNum[8]?>,<?php echo $Local->homeNum[8]?>,<?php echo $Local->MaxNum[8]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1503739511&amp;format=interactive')"
  onmouseover= "f_over(id)"
  >
  <path id="구리시" d="M178.417,165.605l1.5-3.5l-4-1.667l-1.167-6.667l-2.167,1.167l-3-0.333
		l1.833,4.167l0.167,3.667l-2,2l1.667,2.833l3.5-2L178.417,165.605z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#e3ab32">
  </path>
   </g>
  
  <g id = "남양주시" onclick="f(id,<?php echo $Local->childNum[18]?>,<?php echo $Local->homeNum[18]?>,<?php echo $Local->MaxNum[18]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1195952429&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="남양주시" d="M193.75,133.939l5,3.667l2.167,4.833l1,4.167l2.167,2.5l-0.667,4.5
		l-3.833,4.667l-0.333,6.833l-4.333,6.167l0.167,3.5l-2.667,0.167l-3.333-4l-3.333-3.5l-4-5l-1.833-0.333l-4-1.667l-1.167-6.667
		l-2.167,1.167l-3-0.333l-1.167-1.833l-0.5-5.833l4.167-5.167l0.5-2l2-2.833l5.167-0.167l3-1l2.5,0.667l5-2.833L193.75,133.939z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#ba3a30">
  </path>
   </g>
  
  <g id = "하남시" onclick="f(id,<?php echo $Local->childNum[11]?>,<?php echo $Local->homeNum[11]?>,<?php echo $Local->MaxNum[11]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=659377301&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path  id="하남시" d="M174.417,180.439l3.167,0.667l2.5-1.5l6,0.333l1.5,1l1.667-2.333
		l-0.5-2.667l3.667-1l-3.333-4l-3-2.833l-4.333-5.667l-1.833-0.333l-1.5,3.5l0.833,1.667l0.333,2.5l-3.833,2.833l-0.333,2l1.167,3
		L174.417,180.439z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#e3ab32">
  </path>
   </g>
  
  <g id = "양평군" onclick="f(id,<?php echo $Local->childNum[30]?>,<?php echo $Local->homeNum[30]?>,<?php echo $Local->MaxNum[30]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1276578897&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path  id="양평군" d="M210.917,150.605l-3.833,2.333l-3.667,0.667l-3.833,4.667l-0.333,6.833
		l-4.333,6.167l0.167,3.5l3.667-3.167l2.667,0.167l2.667,3.333l1.167,4.833l1,1.833l-1.5,1.833l-1.667,0.5l4,5.667l3.167-3.667
		l5.833,2.833l4.5-2.5l4,3.833l5,0.167l3.167-1l4,1.5l4.167-0.5l4,1.333l0.167,3l0.667,2.333h6l5.5-10.667l-1.333-6.333
		l-4.667-3.333l7.333-6.833l4.334-1.167l-6.334-5l-4-1.667h-8l-12.333-8.167l-6.167,3l-0.167,6.5l-4,1h-5.667l-1-6.167l-3.5-4.833
		L210.917,150.605z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#f5ef84">
  </path>
   </g>
  
  <g id = "가평군" onclick="f(id,<?php echo $Local->childNum[9]?>,<?php echo $Local->homeNum[9]?>,<?php echo $Local->MaxNum[9]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1260790547&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="가평군" d="M213.917,95.939l-0.833-4.5l-2.5,0.833l-1.667,4.167l-4.667,6.333
		l-0.333,6.167l-5.833,1.833l-1.167,8.167h-3.833l-2.833,14.667l3.5,0.333l5,3.667l2.167,4.833l1,4.167l2,3.5l-0.5,3.5l3.667-0.667
		l3.833-2.333l0.833,2.833l3.5,4.833l1,6.167h5.667l4-1l0.167-6.5l-2.833-4.333l2.333-1.167l0.5-9.667l-4.833,0.667l0.333-3.833
		l2.833-3.333l-2.5-4.5l1.833-2.833l-0.833-4.667l6.667-6.333h2.833l1-5.667l-2.167-2.833l-0.333-3.667l-8-0.333l0.333-6.333
		l-8.667-0.667L213.917,95.939z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#f5ef84">
  </path>
   </g>
  
  <g id = "여주군" onclick="f(id,<?php echo $Local->childNum[29]?>,<?php echo $Local->homeNum[29]?>,<?php echo $Local->MaxNum[29]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1872039586&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path  id="여주군" d="M212.25,199.605v-5.167l-5.167-4.667l3.167-3.667l5.833,2.833l4.5-2.5
		l4,3.833l5,0.167l3.167-1l3.333,1.667l4.833-0.667l4,1.333l0.167,3l0.667,2.333h6l0.334,8.5l-1.5,10.667l-1.667,8l-5.833,9.5
		l-7.333-3.667l-5.5-4.833l-2.5,2.5l-5.167-0.5l0.333-2.833l-0.167-6.167l1.5-2.167l-0.833-4.333l1.833-3.167l-1.833-2.667
		l-2.833-3.5l-2-0.833l-3-2.333L212.25,199.605z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#f5ef84">
  </path>
   </g>
  
  <g id = "광주시" onclick="f(id,<?php echo $Local->childNum[14]?>,<?php echo $Local->homeNum[14]?>,<?php echo $Local->MaxNum[14]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=853800843&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="광주시" d="M198.917,212.272l4.833-7l2.5-0.333l6-5.333v-5.167l-5.167-4.667l-4-5.667
		l1.667-0.5l1.333-1.167l-0.833-2.5l-1.167-4.833l-2.667-3.333l-2.667-0.167l-3.667,3.167l-3.167,0.333l-3.167,0.833l0.5,2.667
		l-1.667,2.333l-1.5-1l-6-0.333l-1,1.333l1,1.667l2.167,4.333l-1.667,3.5l-2,2.833l-0.667,3.5l-4.5,4v2.333l2.5-0.333l4-2.5
		l1.167,1.833l2.833,0.667l0.5-3.667l5,1.833l3.167,0.833l-0.167,11L198.917,212.272z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "성남시" onclick="f(id,<?php echo $Local->childNum[24]?>,<?php echo $Local->homeNum[24]?>,<?php echo $Local->MaxNum[24]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=445968098&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="성남시" d="M162.583,188.439l-2,8l6.167,3.167l4.333,3.5h2.333v-2.333l4.5-4
		l0.667-3.5l3.667-6.333l-3.5-6.5l-1.167,0.667l-3.167-0.667l-1.667,2l-3,0.167l-4.167,5.833l-2.5-1L162.583,188.439z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#ba3a30">
  </path>
   </g>
  
  <g id = "과천시" onclick="f(id,<?php echo $Local->childNum[13]?>,<?php echo $Local->homeNum[13]?>,<?php echo $Local->MaxNum[13]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1203625308&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path  id="과천시" d="M154.917,191.605l7.167-2.5l1-1.667l-1.667-4l-6.167-0.5l-2.833,3.833
		v2.333L154.917,191.605z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#f5ef84">
  </path>
   </g>
  
  <g id = "의왕시" onclick="f(id,<?php echo $Local->childNum[6]?>,<?php echo $Local->homeNum[6]?>,<?php echo $Local->MaxNum[6]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=717798665&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="의왕시" d="M153.583,194.272l-1.333,5.333l-2.5,5.667l-1,2.167l3.5,0.5l1-3.167
		l3.167-1.833l2.833-2.833l1.333-3.667l1.5-7.333l-6.667,2.5l-1.333,0.833L153.583,194.272z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#e3ab32">
  </path>
   </g>
  
  <g id = "용인시" onclick="f(id,<?php echo $Local->childNum[28]?>,<?php echo $Local->homeNum[28]?>,<?php echo $Local->MaxNum[28]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1455482859&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path  id="용인시" d="M161.417,201.939l-2.167-1.833l1.333-3.667l6.167,3.167l4.333,3.5
		l4.833-0.333l4-2.5l1.167,1.833l2.833,0.667l0.5-3.667l8.167,2.667l-0.167,11l6.5-0.5l-0.167,6.833l1.333,3.5l4.333,1.667
		l0.167,2.833l3.833,0.167l1.333,3.5l1.833,1.667l-1.667,3.833l-0.833,3.833l-3.833-1l-5-0.333l-2.833-2.333l-2.167,1.667l-4.333-4
		l-1.667-2.167l-1.167,3.5l-4.667,3l-2.833,3.5l-5.167-1.333l-4.333-2.167l0.5-4.5l2.5-4.667l2.833-2l-1.5-5.667l-8.167-0.667
		l-1.833-2.333l2.667-4.833l-2.5-1.667l2.333-2.667l-3.167-0.667l-0.667-2.167l-2.167-0.667L161.417,201.939z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#ba3a30">
  </path>
   </g>
  
  <g id = "안양시" onclick="f(id,<?php echo $Local->childNum[2]?>,<?php echo $Local->homeNum[2]?>,<?php echo $Local->MaxNum[2]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1269312899&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="안양시" d="M149.25,195.939h-2.5l-2.333,2.667l-3-4.667l1-3.667l2.167-3.5l3.167-2
		l2.5,2.167l2.167-0.167v2.333l2.5,2.5l-0.833,0.833l-1.667,5.667L149.25,195.939z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#ba3a30">
  </path>
   </g>
  
  <g id = "부천시" onclick="f(id,<?php echo $Local->childNum[3]?>,<?php echo $Local->homeNum[3]?>,<?php echo $Local->MaxNum[3]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1872905587&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path  id="부천시" d="M134.917,181.105l-0.5,1.833l-5.167,0.167l-3.833-3.833l-0.333-4
		l2.167-1.5l0.667-5.333l6.333,2.5l1.5,4.833l-2,1.667L134.917,181.105z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#ba3a30">
  </path>
   </g>
  
  <g id = "광명시" onclick="f(id,<?php echo $Local->childNum[15]?>,<?php echo $Local->homeNum[15]?>,<?php echo $Local->MaxNum[15]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=542208310&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="광명시" d="M136.583,183.605l-2.167-0.667l0.5-1.833l3-1.167l2.5-1.667l1.333,1.833
		l2.833,6.667l-2.167,3.5l-0.667,1.667l-3.667-0.5l-0.833-6.833L136.583,183.605z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "시흥시" onclick="f(id,<?php echo $Local->childNum[23]?>,<?php echo $Local->homeNum[23]?>,<?php echo $Local->MaxNum[23]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=410904631&amp;format=interactive')"
  onmouseover ="f_over(id)">
  <path id="시흥시" d="M121.583,197.439l-4,4.5l4.667,3.5l4.333-3.5l5-0.5l3.5-2.833l5.667-1.333
		l1-2.167l-0.333-1.167l0.333-2l-3.667-0.5l-1-6.333l-0.5-1.5l-2.167-0.667l-5.167,0.833l-5.667,10.833L121.583,197.439z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "이천시" onclick="f(id,<?php echo $Local->childNum[17]?>,<?php echo $Local->homeNum[17]?>,<?php echo $Local->MaxNum[17]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1105525657&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="이천시" d="M221.25,245.605l1-5.167l-2.833-4.833l-4-0.833l-1.667-2.5l-2.167,0.167
		l-1.833-1.667l-1.333-3.5l-3.833-0.167l-0.333-2.333l-4.167-2.167l-1.333-3.5l0.167-6.833l4.833-7l2.5-0.333l6-5.333l3.333-0.333
		l2.333,2.167l2.667,1l4.667,6.167l-1.833,3.167l0.833,4.333l-1.5,2.167v6.833l-0.167,2.167l5.167,0.5l2.5-2.5l5.5,4.833l0.333,9.5
		l-3.5,1.167l0.167,2.667l-2.167-0.833l-2.167,0.5l-0.833,4.833l-2.5-1.333L221.25,245.605z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#e3ab32">
  </path>
   </g>
  
  <g id = "수원시" onclick="f(id,<?php echo $Local->childNum[25]?>,<?php echo $Local->homeNum[25]?>,<?php echo $Local->MaxNum[25]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=806540306&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="수원시" d="M149.375,209.355l-1.5,2.625l0.5,2.5c0,0,2.5,0.375,2.5,0.75
		s3.25,4.625,3.25,4.625l6-0.25l2-1.875l3.292,0.875l2.667-4.833l-2.5-1.667l2.333-2.667l-3.167-0.667l-0.667-2.167l-2.167-0.667
		l-0.5-4l-2.042-1.333l-2.625,2.125l-3.75,2.375l-0.75,2.833l-2.75-0.333L149.375,209.355z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#6e3122">
  </path>
   </g>
  
  <g id = "군포시" onclick="f(id,<?php echo $Local->childNum[16]?>,<?php echo $Local->homeNum[16]?>,<?php echo $Local->MaxNum[16]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1638717964&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="군포시" d="M148.75,207.439L145,205.73l-3.375-1.25l1.5-5.875l1.25-0.375l2.125-2
		l2.75-0.292l3.167,2.167l-0.167,1.5L148.75,207.439z" fill="#B9B9B9" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "안산시" onclick="f(id,<?php echo $Local->childNum[1]?>,<?php echo $Local->homeNum[1]?>,<?php echo $Local->MaxNum[1]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1304724392&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="안산시" d="M122.25,205.439l5.625,3.042l5.875,0.375l1.5-0.125l2.75,3.875l5.625-2
		l4.25,1.375l1.5-2.625l0.125-1.75l-7.5-3.125l1.125-5.875l1.25-0.375l-2.625-3.125l-1,2.167l-5.667,1.333L132,201.48l-5.417,0.458
		L122.25,205.439z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#ba3a30">
  </path>
   </g>
  
  <g id = "오산시" onclick="f(id,<?php echo $Local->childNum[19]?>,<?php echo $Local->homeNum[19]?>,<?php echo $Local->MaxNum[19]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1499940924&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="오산시" d="M163,234.98l5.5-0.5l1.375-1.75l-0.5-2.125l-2.5-0.375l-1.5-3.625
		l-1.25-2.375h-4.875l-2.375,4.125l3.625,2.375l0.25,3L163,234.98z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "평택시" onclick="f(id,<?php echo $Local->childNum[22]?>,<?php echo $Local->homeNum[22]?>,<?php echo $Local->MaxNum[22]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1815902579&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="평택시" d="M146.625,269.48l10.125-5.125l4.875,1.625l6.5-2.875l3.25-4.25h2.75
		L175,255.23l1-1.125l-0.25-2.125l0.25-1.5l-5.5-1.375l3.125-3.625l-2.375-1.375l0.75-5.125l-0.75-0.875v-4.25l-1.375-1.125
		l-1.375,1.75l-5.125,0.375l-2.625-1.125l-3.75,1.875l-1.625,7.75l-6.125,1.375l-6.125-0.625l-5.5,7.875l-5.375,0.75l-1.75,1.875
		l5.375,1.625l1.375,5.5l6.75,4l1.5,3.75H146.625L146.625,269.48z" fill="#B9B9B9"  stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "안성시" onclick="f(id,<?php echo $Local->childNum[0]?>,<?php echo $Local->homeNum[0]?>,<?php echo $Local->MaxNum[0]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=1170828320&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="안성시" d="M193.375,270.48l-4.75-4.125l-4.25-0.375l-3.25-4.25l-7-2.875L175,255.23
		l1-1.125l-0.5-2.625l0.5-1l-5.5-1.375l3.125-3.625l-2.375-1.75l0.75-4.75l3.417,1.625l5.167,1.333l2.542-3.583l4.958-2.917
		l1.167-3.5l2,2.417l4,3.75l2.167-1.667l3.208,2.667h4.625l3.833,1l0.833-3.833l1.708-3.417l2.125-0.583l1.667,2.5l4.333,1.083
		l2.5,4.583l-1,5.167l-7,1.375v3.75l-3.75,3l-4.75,0.75l-0.25,3.875l1.5,1.875l-3.75,3.375h-5.875l-2.625,4.875L193.375,270.48z" fill="#B9B9B9" id="ahns" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#bd502f">
  </path>
   </g>
  
  <g id = "화성시" onclick="f(id,<?php echo $Local->childNum[12]?>,<?php echo $Local->homeNum[12]?>,<?php echo $Local->MaxNum[12]?>,'https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=298120061&amp;format=interactive')"
  onmouseover = "f_over(id)"
  >
  <path id="화성시" d="M135.375,211.98l-4.125,0.125l-1.125,3.125l-0.875,2.5l-3-2.75l-1.625,0.375L121,214.98
			l-1.75-0.875l-2.375,0.75l-2.25,2.875l1.75,2.75l-2,4.875l-0.375,3l0.125,2.625l4-0.375l-1.375,3.375l1.875,3.125l4-3.125
			l3.125-4.125h4.5l1.75-2.375l-0.125,4.125l1.75,1L132,234.98l-5.25,0.5l0.25,2.875v2.625l-0.125,4.125l-2.625,2.5v2.25
			l6.875,1.125l1.125,1.75l5.375-0.75l5.5-7.875l6.125,0.625l6.5-1.25l1.25-7.875l3.75-1.875l-0.25-3l-3.625-2.375l2.375-4.125
			h4.875l1.25,2.375l1.5,3.625h2.625l0.375,2.5l1.708,1.208l2.5-4.667l2.833-2l-1.5-5.667l-8.167-0.667l-1.833-2.333l-3.292-0.5
			l-2,1.5l-6,0.25l-3.25-4.625l-2.5-0.75l-0.5-2.5l-4.25-1.375l-5.625,2L135.375,211.98z" fill="#B9B9B9" id="hs" stroke="#FFFFFF" style="font-size:12px;fill-rule:nonzero;stroke:#FFFFFF;stroke-opacity:1;stroke-width:0.1;stroke-miterlimit:4;stroke-dasharry:none;stroke-linecap:butt;marker-start:none;stroke-linejoin:bevel;fill:#6e3122">
  </path>
 </g>
          </svg>
        </div>
	
		 <div class="col-md-8">
        <div class="row">
          <div class="col-xs-6 col-sm-3">
		  <span onclick="f_init('https://docs.google.com/spreadsheets/d/e/2PACX-1vT1n7y-lTyrxBSirvILhDqaxKMLzUO1xj5TTrvFjmqyD56eJ7kIQO0iQVBKCOutHwLouuQUTd_Rb_6z/pubchart?oid=692651724&amp;format=interactive')">
		  <img src="../img/logo.gif" width="50"></span>
					
          <span id = "cityName">경기도</span>
          </div>
          
          <div class="col-xs-6 col-sm-3">
         <img src="../img/baby.svg" width="50"> <span id = "childNum" style = "font-size:20;">아동인구수<br></span>
		 
          </div>
		  
          <div class="col-xs-6 col-sm-3 ">
           <img src="../img/teacher.svg" width="50"> <span id = "homeNum" style = "font-size:20;">보육시설수<br></span>
          </div>
		  
          <div class="col-xs-6 col-sm-3">
  			<img src="../img/house.svg" width="50"><span id = "MaxNum" style = "font-size:20;">정원수<br></span>		            
          </div>
         </div>
		
		    <div class="row">
			<div class = "col-md-1">
			</div>
			 <iframe align="center" id = "chart" width="600" height="300" seamless frameborder="0" scrolling="no" src="그래프1.html"></iframe>
		 
		  <div class = "row">
		  <div class = "col-md-1">
			</div>
			<div class = "col-md-3">
		  <iframe  id = "chart2" width="260" height="371" align=left seamless frameborder="0" scrolling="no" src="그래프2.html"></iframe>
		  </div>
		  	  <div class = "col-md-3">
			</div>
		  <div class = "col-md-5">
		  <iframe  id = "chart3" width="260" height="371" align=right seamless frameborder="0" scrolling="no" src="그래프3.html"></iframe>
		  </div>
			</div>
			</div>
		 </div>
      
    </div>
    
	</div>
     
 
</html>
