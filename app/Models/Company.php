<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable =[
        'name',
        'contact_person',
        'email',
        'site',
        'phone'
    ];

    public function fields(){
        return $this->belongsToMany(Field::class,'contact_lists');
    }
}
