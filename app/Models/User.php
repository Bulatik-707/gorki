<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, HasRoles;
    use Authenticatable;
    public $timestamps = false;
    public $table = 'user';
    // поля, которым разрешено массовое присвоение
    protected $fillable = ['fio', 'email', 'password'];

    // //Создаем связь между табл Юзер - Брони  
    // public function brons(){
    //     return $this->belongsTo(Bron::class, 'id_user'); //(Catalog::class,  'catalod_id'}
    // }
}

