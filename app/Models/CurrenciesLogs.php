<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrenciesLogs extends Model
{
    use HasFactory;

    protected $table="currencies_logs";
    protected $guarded=[];
    protected $hidden=[];
    protected $fillable=[];
}
