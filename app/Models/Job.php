<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // The table name (we used job_listings)
    protected $table = 'job_listings';

    protected $fillable = ['employer_id', 'title', 'salary'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}