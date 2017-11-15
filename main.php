<?php

require_once 'src/mf/query/Query.php';
require_once 'src/mf/model/Model.php';
require_once 'src/tests/models/Article.php';
require_once 'src/mf/connection/ConnectionFactory.php';

use mf\query\Query as Query;
use mf\connection\ConnectionFactory as ConnectionFactory;
use mf\model\Model as Model;
use tests\models\Article as Article;

$conf = parse_ini_file('conf/bdd.ini', true);
ConnectionFactory::MakeConnection($conf);

$query = new Query();
$query = $query::table("article");
$reponse = $query->select(["descr"])->where("id_categ", "=", "1")->where("nom", "=", "velo")->get();
//$insert = $query->insert()
print_r($reponse);

$article = new Article(array('id' => 67, 'nom' => 'trotinette', 'descr' => 'Superbe trotinette rosso corsa', 'tarif' => 80, 'id_categ' => 1));
print_r($article->att);

//5. finders

// $a = new Article();
// $a->nom = 'velo';
// $a->tarif=273;
// $a->insert();
$liste = Article::all();
foreach( $liste as $art){
	print $a->nom;
}