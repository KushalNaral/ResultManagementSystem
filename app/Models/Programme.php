<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Programme extends Model
{
    use HasFactory,  HasApiTokens ,  Notifiable;

    protected $fillable = [ ' semester' , 'branch'];

    protected $hidden = [ 'created_at' , 'updated_at' , 'id' , 'students_id'];




}
