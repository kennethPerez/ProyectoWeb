<?php

$strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
$conn=pg_connect($strconn);

$keyword = $_REQUEST['keyword'];
$query="SELECT nombre FROM empresas WHERE nombre LIKE '%$keyword%' ORDER BY nombre ASC LIMIT 5";
$result = pg_query($conn,$query);

if($result)
{
    while($row = pg_fetch_array($result))
    {
        echo "<li onclick=\"set_item_company('$row[0]')\"> $row[0] </li>";
    }
 }




?>