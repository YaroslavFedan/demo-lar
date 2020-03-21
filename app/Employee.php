<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Employee extends Model
{
    use NodeTrait;

    protected $fillable = ['full_name', 'phone', 'photo', 'email', 'salary', 'position_id',
        'employed_at', 'parent_id', 'admin_created_id', 'admin_updated_id'];

    protected $guarded = ['lft', 'rgt', 'created_at', 'updated_at'];

    /**
     * Get the position record associated with the employee.
    */
    public function position() {
        return $this->belongsTo(Position::class);
    }

    /**
     * Get the head record associated with the employee.
     */
    public function head() {
        return $this->belongsTo(Employee::class, 'parent_id');
    }

    /**
     * Get the admin who created this employee
     */
    public function adminCreated(){
        return $this->belongsTo(User::class, 'admin_created_id');
    }

    /**
     * Get the admin who updated this employee
     */
    public function adminUpdated(){
        return $this->belongsTo(User::class, 'admin_updated_id');
    }
}
