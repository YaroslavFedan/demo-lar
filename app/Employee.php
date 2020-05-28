<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use NodeTrait;

    protected $fillable = ['full_name', 'phone', 'photo', 'email', 'salary', 'position_id',
        'employed_at', 'parent_id', 'admin_created_id', 'admin_updated_id'];

    protected $guarded = ['lft', 'rgt', 'created_at', 'updated_at'];

    protected $dates = ['employed_at'];

    public $parent_name;

    public function scopeHeads($query, $str){
        return $query->where('full_name','LIKE','%'.$str.'%')
                     ->where('depth','<', config('employee.depth'));
    }

    /**
     * Set image path to public directory
     * @param $value
     * @return string|null
     */
    public function getPhotoAttribute($value) {
        return ($value) ? config('image.path').$value : null;
    }

    /**
     *  Return formatted phone number
     * @param $value
     * @return mixed
     */
    public function getPhoneAttribute($value) {
        return Str::formatPhoneNumber($value);
    }

    public function getEmployedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }


    /**
     * Return clear phone number
     * @param $value
     */
    public function setPhoneAttribute($value) {
        $this->attributes['phone'] = Str::clearNumber($value);
    }


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
    public function adminCreated() {
        return $this->belongsTo(User::class, 'admin_created_id');
    }

    /**
     * Get the admin who updated this employee
     */
    public function adminUpdated() {
        return $this->belongsTo(User::class, 'admin_updated_id');
    }


}
