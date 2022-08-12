<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsProject extends Model
{
    use HasFactory;

    protected $table = "settings_project";

    protected $fillable = ["name"];

    public function Tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}
