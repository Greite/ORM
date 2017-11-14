<?php

require_once 'src/query/Query.php';
require_once 'src/connection/ConnectionFactory.php';

use \query\Query as Query;
use \connection\ConnectionFactory as ConnectionFactory;

$conf = parse_ini_file('conf/bdd.ini', true);
ConnectionFactory::MakeConnection($conf);

$query = new Query();
$query = $query::table("article");
$reponse = $query->select(["descr"])->where("id", "=", "66")->get();
//$insert = $query->insert()
print_r($reponse);