<?php
//konfiguracny subor pre DB
$db_server="edudb-02.nameserver.sk";
$db_user="samod150";
$db_pass="Hesloheslo123";
$db_name="4ideaspace_stude";
$db_port="3307";


$conn=mysqli_connect($db_server, $db_user, $db_pass, $db_name, $db_port);

/*if(!$conn)
{
    echo "Neuspesne pripojenie";
    exit;
}
else
{
        echo "Konektivita nadviazana";
}
*/
?>