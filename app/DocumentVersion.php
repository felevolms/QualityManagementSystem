<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentVersion extends Model
{
    protected $fillable = [
        'url',
        'version'
    ];

    public function document() {
        return $this->hasOne(Document::class);
    }
}
