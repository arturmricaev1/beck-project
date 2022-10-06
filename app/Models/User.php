<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
  
class User extends Authenticatable {
    use HasFactory, Notifiable, HasRoles;
  
    /**
     * Атрибуты, которые можно назначать массово.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
  
    /**
     * Атрибуты, которые должны быть скрыты для массивов.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * Атрибуты, которые нужно приводить к собственным 
     * типам.     
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getRoleNameAttribute () {
        $roles = $this->getRoleNames();
        return $roles[0] ?? null;
    }
    public function products() {
        return $this->belongsToMany(Product::class, 'user_product');
    }

}