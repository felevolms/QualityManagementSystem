<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title',
        'role_id'
    ];

    protected $with = [
        'versions'
    ];

    public function versions() {
        return $this->hasMany(DocumentVersion::class);
    }
}
