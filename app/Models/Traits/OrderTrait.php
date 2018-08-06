<?php
/**
 * Created by PhpStorm.
 * User: hattie
 * Date: 2018/8/6
 * Time: 下午9:46
 */
namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OrderTrait
{
	public function scopeCreateAsc(Builder $builder)
	{
		return $builder->orderBy('created_at', 'asc');
	}
	public function scopeCreateDesc(Builder $builder)
	{
		return $builder->orderBy('created_at', 'desc');
	}
	public function scopeUpdateAsc(Builder $builder)
	{
		return $builder->orderBy('update_at', 'asc');
	}
	public function scopeUpdateDesc(Builder $builder)
	{
		return $builder->orderBy('update_at', 'desc');
	}
	public function scopeOrderAsc(Builder $builder)
	{
		return $builder->orderBy('order', 'asc');
	}
	public function scopeOrderDesc(Builder $builder)
	{
		return $builder->orderBy('order', 'desc');
	}
}