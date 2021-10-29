<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ["slug", "name", "description", "logo"];
    /**
     * @var mixed
     */
    private $id;

    public function ratings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
