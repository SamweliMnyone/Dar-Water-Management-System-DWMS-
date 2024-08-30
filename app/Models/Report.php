<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'technician_id',
        'region',
        'ward',
        'description',
        'start',
        'finish',
        'explproblem',
        'labour',
        'labour_cost',
        'tools',
        'tools_cost',
    ];

// In Report model
public function technician()
{
    return $this->belongsTo(User::class, 'technician_id'); // Adjust if you use a different foreign key
}
}
