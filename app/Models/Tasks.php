<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $casts = [
        'priority' => 'int',
        'project_idproject_id' => 'int',
        'sort' => 'int'
    ];

    protected $table = "tasks";

    protected $fillable = ["name", "priority", "project_id"];

    public function Project()
    {
        return $this->belongsTo(SettingsProject::class);
    }
}
