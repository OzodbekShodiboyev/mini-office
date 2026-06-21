<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['template_id', 'user_id', 'title', 'content', 'status', 'public_token'];

    protected static function booted()
    {
        static::creating(function ($document) {
            if (empty($document->public_token)) {
                $document->public_token = Str::random(40);
            }
        });
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function signature()
    {
        return $this->hasOne(Signature::class);
    }

    public function isSigned(): bool
    {
        return $this->status === 'signed';
    }
}

