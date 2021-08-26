<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashInfo extends Model
{
    protected $table = 'hash_info';
    public $timestamps = false;
    protected $fillable = [
        'key',
        'try',
        'hash',
        'batch',
        'word_concat',
        'input_string',
    ];
}
