<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrerequipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone','expert_domain', 'cv'
   ];
}