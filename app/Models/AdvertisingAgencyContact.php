<?php

namespace App\Models;

use App\Models\Concerns\FlagsSpam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertisingAgencyContact extends Model
{
    use HasFactory, SoftDeletes, FlagsSpam;

    protected $table = 'advertising_agency_contacts';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
        'message',
        'selected_package',
        'ip',
        'user_agent',
        'url'
    ];

    protected $dates = ['deleted_at'];

    protected $casts = ['is_spam' => 'boolean'];
}