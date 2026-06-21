<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
