<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'name',
        'union_name',
        'word_number',
        'subject',
        'message',
        'image',
        'status',
        'admin_reply',
    ];
}
