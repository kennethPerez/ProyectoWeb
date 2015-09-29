<?php

$strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
$conn=pg_connect($strconn);

$keyword = $_REQUEST['keyword'];

$query = "SELECT (nombre||' '||apellidos) as dato,'p' as type, usuario, idPersona FROM personas WHERE nombre LIKE '%$keyword%' or apellidos LIKE '%$keyword%'
union
SELECT ingreso as dato,'g' as type, '0', '0' FROM personas WHERE ingreso LIKE '%$keyword%'
union
SELECT nombre as dato,'e' as type, '0', idEmpresa FROM empresas WHERE nombre LIKE '%$keyword%'
union
SELECT titulo as dato,'f' as type, '0', idForo FROM foros WHERE titulo LIKE '%$keyword%'
order by type desc limit 8";
$result = pg_query($conn,$query);
if($result)
{
    while($row = pg_fetch_array($result))
    {
        if($row['type'] === "p")
        {
            $usuario = md5($row[2]);
            echo "<li onclick=\"set_item_search('$row[0]','Persona',$row[3])\"><img src='http://localhost/usuariosGitBook/$usuario' width='40px' height='40px'> $row[0] </li>";
        }
        else if($row['type'] === "f")
        {
            echo "<li onclick=\"set_item_search('$row[0]','Foro',$row[3])\"><img src='/img/forum' width='40px' height='40px'> $row[0] </li>";
        }
        else if($row['type'] === "e")
        {
            echo "<li onclick=\"set_item_search('$row[0]','Empresa',$row[3])\"><img src='/img/company' width='40px' height='40px'> $row[0] </li>";
        }
        else
        {
            echo "<li onclick=\"set_item_search('$row[0]','Generacion',$row[3])\"><img src='/img/generation' width='40px' height='40px'> $row[0] </li>";
        }      
    }
}


?>