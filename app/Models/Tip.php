<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $fillable = ['title','description', 'content','image', 'document'];

    use HasFactory;
}
