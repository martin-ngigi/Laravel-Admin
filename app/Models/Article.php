<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // one to one relationship
    public function article(){
        //remember that the "id" of article_type is saved in the article
        return $this->hasOne(ArticleType::class, 'id', 'type_id');
    }
}
