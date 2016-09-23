<?php

namespace ZiNETHQ\SparkRoles\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Laravel\Spark\Http\Middleware\VerifyUserIsDeveloper as SparkVerifyUserIsDeveloper;

use ZiNETHQ\SparkRoles\Models\Role;

class VerifyUserIsDeveloper extends SparkVerifyUserIsDeveloper
{
    /**
     * @var Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new AddDevelopers instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $closure
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(config('sparkroles.developer.enable')) {
			$role = Role::where('slug', config('sparkroles.developer.slug'))->first();
			if($role) {
				$developers = [];
				foreach($role->models as $model) {
					if($model instanceof User) {
						$developers[] = $model->email;
					}

					if($model instanceof Team) {
						foreach($model->users as $user) {
							$developers[] = $user->email;
						}
					}
				}
				Spark::developers(array_merge(Spark::developers, $developers));
			}
		}
        return parent::handle($request, $next);
    }
}
