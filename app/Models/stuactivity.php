<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stuactivity extends Model
{
    use HasFactory;
    protected $table = 'student_activity';
    protected $fillable =['StudentSsn','ActivityId','Score'];
}
