
<?php
require_once 'src/mf/query/Query.php';
require_once 'src/mf/model/Model.php';
require_once 'src/tests/models/Article.php';
require_once 'src/tests/models/Categorie.php';
require_once 'src/mf/connection/ConnectionFactory.php';
use mf\query\Query as Query;
use mf\connection\ConnectionFactory as ConnectionFactory;
use mf\model\Model as Model;
use tests\models\Article as Article;
use tests\models\Categorie as Categorie;

$conf = parse_ini_file('conf/bdd.ini', true);
ConnectionFactory::MakeConnection($conf);
$query = new Query();
$query = $query::table("article");
//$reponse = $query->select(["descr"])->where("id_categ", "=", "1")->where("nom", "=", "velo")->get();
//$insert = $query->insert()
//print_r($reponse);
//$article = new Article(array('id' => 67, 'nom' => 'trotinette', 'descr' => 'Superbe trotinette rosso corsa', 'tarif' => 80, 'id_categ' => 1));
//print_r($article->att);
//5. finders
// $a = new Article();
// $a->nom = 'velo';
// $a->tarif=80;
// $a->id_categ=1;
// $a->id = $a->save();
// echo $a->id;
/*$liste = Article::all();
foreach( $liste as $art){
	print $art->nom;
}*/
/*$l = Article::find([['nom', '=', 'velo'],['tarif', '<=', 100]], ['nom', 'tarif']);
foreach ($l as $key => $value) {
	print_r($l[$key]);
}*/
// $arti = $l[0];
// print_r($arti);

/*$l = Article::first(65, ['nom', 'tarif']);
print_r($l);*/

/*$categorie = Article::first(65)->categorie();
print_r($categorie);
echo '<br>';*/

/*$list= Categorie::first(1)->articles();
print_r($list);*/

$c = Categorie::first(1);
$list_articles = $c->articles;
print_r($list_articles);