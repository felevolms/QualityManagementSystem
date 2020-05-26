<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentVersion extends Model
{
    protected $fillable = [
        'url',
        'version',
        'document_id'
    ];

    public function document() {
        return $this->belongsTo(Document::class);
    }
}
