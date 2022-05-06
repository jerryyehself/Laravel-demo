<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'contact_lists');
    }

    public function companies(){
        return $this->belongsToMany(Company::class,'contact_lists');
    }
}
