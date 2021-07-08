<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UseCase extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'use_cases';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'as_a_id',
        'i_want_to',
        'so_i_can',
        'notes',
        'project_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function useCaseFeatures()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function as_a()
    {
        return $this->belongsTo(Actor::class, 'as_a_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
