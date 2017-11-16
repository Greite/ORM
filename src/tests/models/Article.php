<?php
/**
* 
*/
namespace tests\models;

class Article extends \mf\model\Model
{
	protected static $table = 'article';
	protected static $idColumn = 'id';

	public function categorie() {
		return $this->belongs_to('\tests\models\Categorie', 'id_categ');
	}
}