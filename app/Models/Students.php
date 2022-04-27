<?php

namespace App\Models;

use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;


class Students extends Model
{
    use HasFactory, HasApiTokens, Notifiable;


    protected $fillable = [
        'name',
        'address',
        'class',
        'email',
        'password',
        'password_confirmation',
        'roll_no',
        'section',
        'parents_name',
        'parents_phone',
        'parents_email',
        'exam_status',
        'remember_token',
        'api_token',

    ];




}
