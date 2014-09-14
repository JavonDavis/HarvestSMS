<?php
  mysql_connect("localhost","422892","Basketball14");
  mysql_select_db("422892");

  $sql=mysql_query("select * from crops");
  while($row=mysql_fetch_assoc($sql)) $output[]=$row;

  $jsonx = json_encode($output);
  mysql_close();
?>	