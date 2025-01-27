<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Med extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
