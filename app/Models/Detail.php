<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = "details";
    protected $fillable = [
            'project_name', 'name', 'phone'
    ];
    public $timestamp = false;
}
