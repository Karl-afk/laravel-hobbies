<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * Get all of the hobbies for the Tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class);
    }
    /**
     * Get all of the hobbies for the Tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filteredHobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class)
            ->wherePivot('tag_id', $this->id)
            ->orderBy('updated_at', 'DESC');
    }

    protected $fillable = ['name', 'style'];
}
