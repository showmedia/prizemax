<?php



namespace App\Models;



use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Laravel\Fortify\TwoFactorAuthenticatable;

use Laravel\Jetstream\HasProfilePhoto;

use Laravel\Sanctum\HasApiTokens;



use App\Models\Venda;



class User extends Authenticatable

{

    use HasApiTokens;

    use HasFactory;

    use HasProfilePhoto;

    use Notifiable;

    use TwoFactorAuthenticatable;



    /**

     * The attributes that are mass assignable.

     *

     * @var string[]

     */

    protected $fillable = [

        'name',

        'email',

        'users_id',

        'password',

    ];



    /**

     * The attributes that should be hidden for serialization.

     *

     * @var array

     */

    protected $hidden = [

        'password',

        'remember_token',

        'two_factor_recovery_codes',

        'two_factor_secret',

    ];



    /**

     * The attributes that should be cast.

     *

     * @var array

     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];



    /**

     * The accessors to append to the model's array form.

     *

     * @var array

     */

    protected $appends = [

        'profile_photo_url',

    ];



    public function compras() {
        return $this->hasMany('App\Models\Venda', 'users_id');
    }

    public function indicados() {
        return $this->hasMany('App\Models\User', 'users_id');
    }

    public function indicador() {
        return $this->belongsto('App\Models\User', 'users_id');
    }

    public function Conta() {
        return $this->hasOne('App\Models\Conta', 'users_id');
    }

    public function saques() {
        return $this->hasMany('App\Models\Saque', 'users_id');
    }

}

