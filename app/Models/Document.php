<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'fail'
    ];

    // Relation ke table users
    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id', 'id')->withDefault(['name' => 'TIADA NAMA']);
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault(['name' => 'TIADA NAMA']);
        // return $this->belongsTo(User::class);
    }
}
