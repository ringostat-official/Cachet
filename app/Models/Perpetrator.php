<?php

namespace CachetHQ\Cachet\Models;

use Illuminate\Database\Eloquent\Model;

class Perpetrator extends Model
{
    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = ['name'];

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

}
