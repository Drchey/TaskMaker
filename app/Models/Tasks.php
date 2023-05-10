<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'priority', 'order', 'project_id'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['project'] ?? false) {
            $query->where('project_id', 'like', '%' . request('project') . '%');
        }
    }

    // Relationship with Projects
    public function projects()
    {
        return $this->belongsToMany(Projects::class);
    }
}