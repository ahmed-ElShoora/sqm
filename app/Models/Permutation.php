<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permutation extends Model
{
    protected $fillable = [
        'id','title','canCreate','canEdit','canDelete','seeMessages'
    ];

    public function scopeGetTitle($query, $id)
    {
        return $query->select('title')->where('id', $id);
    }

    public function scopeCanCreate($query, $id)
    {
        return $query->select('canCreate')->where('id', $id);
    }

    public function scopeCanEdit($query, $id)
    {
        return $query->select('canEdit')->where('id', $id);
    }

    public function scopeCanDelete($query, $id)
    {
        return $query->select('canDelete')->where('id', $id);
    }

    public function scopeSeeMessages($query, $id)
    {
        return $query->select('eeMessages')->where('id', $id);
    }
}
