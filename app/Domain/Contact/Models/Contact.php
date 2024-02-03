<?php

namespace App\Domain\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'contato',
        'email'
    ];

}