<?php
namespace ZiNETHQ\Shinobi;

use ZiNETHQ\Shinobi\Models\Role;
use Illuminate\Contracts\Auth\Guard;

class Shinobi
{
    /**
     * @var Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new TeamHasPermission instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Checks if Team has the given permissions.
     *
     * @param array|string $permissions
     *
     * @return bool
     */
    public function can($permissions)
    {
        if ($this->auth->check()) {
            return $this->auth->user()->currentTeam->can($permissions);
        } else {
            $guest = Role::whereSlug('guest')->first();

            if ($guest) {
                return $guest->can($permissions);
            }
        }

        return false;
    }

    /**
     * Checks if user has at least one of the given permissions.
     *
     * @param array $permissions
     *
     * @return bool
     */
    public function canAtLeast($permissions)
    {
        if ($this->auth->check()) {
            return $this->auth->user()->currentTeam->canAtLeast($permissions);
        } else {
            $guest = Role::whereSlug('guest')->first();

            if ($guest) {
                return $guest->canAtLeast($permissions);
            }
        }

        return false;
    }

    /**
	 * Checks if user is assigned the given role.
	 *
	 * @param  string $slug
	 * @return bool
	 */
    public function is($role)
    {
        if ($this->auth->check()) {
            return $this->auth->user()->currentTeam->is($role);
        } else {
            if ($role === 'guest') {
                return true;
            }
        }

        return false;
    }
}
