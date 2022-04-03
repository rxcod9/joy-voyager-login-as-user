<?php

namespace Joy\VoyagerLoginAsUser\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use TCG\Voyager\Actions\AbstractAction;
use TCG\Voyager\Facades\Voyager;

class LoginAsUserAction extends AbstractAction
{
    public function getTitle()
    {
        return __('joy-voyager-login-as-user::generic.login_as_user');
    }

    public function getIcon()
    {
        return 'fa-solid fa-user-secret';
    }

    public function getPolicy()
    {
        return 'browse';
    }

    public function getAttributes()
    {
        return [
            'id'     => 'login_as_user_btn',
            'class'  => 'btn btn-primary',
            'target' => '_blank',
        ];
    }

    public function getDefaultRoute()
    {
        // return route('my.route');
    }

    public function shouldActionDisplayOnDataType()
    {
        return config('joy-voyager-login-as-user.enabled', true) !== false
            && isInPatterns(
                $this->dataType->slug,
                config('joy-voyager-login-as-user.allowed_slugs', ['*'])
            )
            && !isInPatterns(
                $this->dataType->slug,
                config('joy-voyager-login-as-user.not_allowed_slugs', [])
            );
    }

    protected function getSlug(Request $request)
    {
        if (isset($this->slug)) {
            $slug = $this->slug;
        } else {
            $slug = explode('.', $request->route()->getName())[1];
        }

        return $slug;
    }
}
