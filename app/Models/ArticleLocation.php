<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleLocation extends Model
{
    use HasFactory;

    protected $table = "article_location";

    public $fillable = [
        "article_id", "location_id"
    ];
}
