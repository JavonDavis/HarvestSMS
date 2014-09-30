<?php
  $conn = pg_pconnect("dbname=postgres");
  if (!$conn){
  	echo "An error occured. \n";
  	exit;
  }

  $result = pg_query($conn, "select * from crops");
  while ($row = pg_fetch_row($result)) {
  	$output[]=$row;
  }
  $jsonx = json_encode($output);

  
?>	