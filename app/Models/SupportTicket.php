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

    public const STATUS_NEW = 'new';
    public const STATUS_IN_REVIEW = 'in_review';
    public const STATUS_COMPLETED = 'completed';

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

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
}