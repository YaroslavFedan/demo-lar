<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'admin_created_id', 'admin_updated_id', 'created_at', 'updated_at'];

    /**
     * Get the emlpoyees of this position.
     */
    public function employees() {
       return $this->hasMany(Employee::class);
    }

    public function demos()
    {
        return $this->hasMany(Demo::class);
    }

}
