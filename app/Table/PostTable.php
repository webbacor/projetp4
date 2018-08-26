<?php
namespace App\Table;

use Core\Table\Table;

class PostTable extends Table{

    protected $table = 'articles';

   // get the last article *
    // return array
   
    public function last(){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY articles.date DESC");
    }

    // Get the latest articles from the requested category
    // $ category_id
    // return array
     
    public function lastByCategory($category_id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.category_id = ?
            ORDER BY articles.date DESC", [$category_id]);
    }

    // Retrieve an article by linking the associated category
    // $ id
    // return \ App \ Entity \ PostEntity
    public function findWithCategory($id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.id = ?", [$id], true);
    }
}