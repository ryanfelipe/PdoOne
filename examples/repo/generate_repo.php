<?php
use eftec\PdoOne;
use mapache_commons\Collection;

include "../../vendor/autoload.php";
include "../Collection.php";

// connecting to database sakila at 127.0.0.1 with user root and password abc.123
$dao=new PdoOne("mysql","127.0.0.1","root","abc.123","sakila","");
try {
    echo "<h1>connection. The instance 127.0.0.1, base:sakile  user:root and password:abc.123 must exists</h1>";
    $dao->connect();
} catch (Exception $ex) {

}
$arr=['address','city','country','store'];
foreach ($arr as $a) {
    $clase=$dao->generateCodeClass($a,'repo');
    echo "saving {$a}Repo.php<br>";
    file_put_contents($a.'Repo.php',$clase);
}

