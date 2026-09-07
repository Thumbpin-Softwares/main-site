<?php

namespace App\Models;

use App\Models\Concerns\FlagsSpam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InquiryForm extends Model
{
    use HasFactory, SoftDeletes, FlagsSpam;

    protected $casts = ['is_spam' => 'boolean'];
}
