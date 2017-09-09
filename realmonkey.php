<?php
/* connect */

$link = mysqli_connect(
	'localhost' ,
	'root',
	'toor',
	'mysql');

if(!$link){
	printf("nono man", mysqli_connect_error());
	exit;
}

/* send query */

if($result = mysqli_query($link, 'select name, no from testing')){
	print ("yes\n");

/* get query result */

	while( $row = mysqli_fetch_assoc($result) ){
	printf("%s(%s) \n", $row['name'], $row['no']);
}

/* remove result_set bye bye it's free */
	mysqli_free_result($result);

}
/* close connect */
mysqli_close($link);
?>
