<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table="articles";
    protected $uniqueColumn="title";

    public function ArticleCategory(){
        return $this->belongsTo("App\ArticleCategory");
    }
    protected $fillable = ['title','category_id','description','icon','note'];
}
