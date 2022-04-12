<?php

namespace Joy\VoyagerLoginAsUser\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Actions\AbstractAction;

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
            'class' => 'btn btn-sm btn-primary pull-right login-as-user',
        ];
    }

    public function getDefaultRoute()
    {
        return route('impersonate', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        $isEnabled = config('joy-voyager-login-as-user.enabled', true) !== false
            && isInPatterns(
                $this->dataType->slug,
                config('joy-voyager-login-as-user.allowed_slugs', ['*'])
            )
            && !isInPatterns(
                $this->dataType->slug,
                config('joy-voyager-login-as-user.not_allowed_slugs', [])
            );

        if (!$isEnabled) {
            return false;
        }

        $user = Auth::user();

        return method_exists($user, 'canImpersonate') && $user->canImpersonate();
    }

    public function shouldActionDisplayOnRow($row)
    {
        return method_exists($row, 'canBeImpersonated') && $row->canBeImpersonated();
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
