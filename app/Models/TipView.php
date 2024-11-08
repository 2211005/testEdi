<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipView extends Model
{
    use HasFactory;

    protected $fillable = ['tip_id', 'viewed_at'];
}
