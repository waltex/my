<?php
//$db1 = 'mysql:dbname=atk4;host=localhost';
$db1 = new \atk4\data\Persistence_SQL('mysql:dbname=atk4;host=localhost', 'root', '');

//$db_oci_t = new \atk4\data\Persistence_SQL('oci:dbname=192.168.20.42/GOLDTEST;charset=UTF8', 'centest', 'centest');


$tns = '
  (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.20.42)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SID = GOLDTEST)
      (SERVER = DEDICATED)
    )
  )';

