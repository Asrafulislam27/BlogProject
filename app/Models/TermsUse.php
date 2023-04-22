<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsUse extends Model
{
    use HasFactory;

    protected $fillable = ['terms_name','terms_description'];
}
