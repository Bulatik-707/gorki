<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Bron extends Model
{
    use HasFactory;

    public $timestamps = false;

    // //Создаем связь между табл Юзер - Брони
    // public function user(){
    //     return $this->hasMany(User::class); //(Catalog::class,  'catalod_id'}
    // }

}
