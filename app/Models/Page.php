<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $fillable = [
        'slug','string','content'
    ];
}
