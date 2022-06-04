<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    use HasFactory;
	protected $table = 'clients';
    protected $fillable = [
    	'client_name',
    	'client_company',
    	'client_address',
    	'client_state',
    	'client_gst',
    	'client_mobile',
    	'client_pincode',
    	'client_email',
    	'client_other_state',
    	'client_country',
    	'created_at',
    	'updated_at',
    ];
}
