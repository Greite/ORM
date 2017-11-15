<?php

require_once 'src/mf/query/Query.php';
require_once 'src/mf/model/Model.php';
require_once 'src/tests/models/Article.php';
require_once 'src/mf/connection/ConnectionFactory.php';

use mf\query\Query as Query;
use mf\connection\ConnectionFactory as ConnectionFactory;

$conf = parse_ini_file('conf/bdd.ini', true);
ConnectionFactory::MakeConnection($conf);

$query = new Query();
$query = $query::table("article");
$reponse = $query->select(["descr"])->where("id", "=", "66")->get();
//$insert = $query->insert()
print_r($reponse);