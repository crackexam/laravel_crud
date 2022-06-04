<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
	protected $table = 'companies';
    protected $fillable = [
    	'name',
    	'email',
    	'mobile',
    	'address',
    	'gstnumber',
    	'bankname',
    	'accountname',
    	'acountnumber',
    	'bankifsccode',
    	'companylogo',
    	'created_at',
    	'updated_at',
    ];
}
