<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\AdjustTime;
use App\Traits\HasNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, AdjustTime, SoftDeletes, Sluggable, HasNotification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'slug',
        'email',
        'password',
        'company',
        'address',
        'avatar',
        'phone',
        'address',
        'country',
        'job_title',
        'date_of_birth',
        'employee_status',
        'department_id',
        'hire_date',
        'terms',
        'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $childTypes = [
        'admin' => App\Models\Admin::class,
    ];

    public static $EMPLOYEESTATUS = [
        'Full-time', 'Contract', 'Intern', 'Part-time', 'Laid off'
    ];
    // protected $appends = ['read_at', 'notification_id'];

    public function jobs()
    {
        return $this->hasMany(PrintJob::class);
    }

    public function fullname(){
        return $this->name.' '.$this->last_name;
    }

    public function avatar(){
        if (strpos($this->avatar, 'https') !== false) {
            return $this->avatar;
        }
        else if($this->avatar){
            return Storage::temporaryUrl($this->avatar, now()->addMinutes(60));
        }else{
            return 'https://i.ibb.co/jzfhPsd/avatar.png';
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name', 'last_name']
            ]
        ];
    }

    public function transanctions(){
        return $this->hasMany(Transaction::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function items()
    {
        return $this->hasOne(Item::class);
    }
}
