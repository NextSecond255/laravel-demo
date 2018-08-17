<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'introduction',
		'avatar',
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
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function topics()
	{
		return $this->hasMany(Topic::class);
	}

    /**
     * 判断是否是作者
     *
     * @param Model $model
     *
     * @return bool
     */
	public function isAuthor(Model $model)
    {
        return $this->id == $model->user_id;
    }
}