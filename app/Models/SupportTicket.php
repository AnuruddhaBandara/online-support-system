<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class SupportTicket extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    const STATUS_NEW = 'new';

    protected $fillable = [
        'customer_name',
        'problem_description',
        'email',
        'phone_number',
        'reference_number',
        'status',
        'agent_reply',
        'agent_id'
    ];
}
