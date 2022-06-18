<?php 

namespace Namnb\FirstPackage\Traits;

trait TriggerPermission {
    public function isAdmin(): bool
    {
        return ((boolean) $this->attributes['is_admin']) ?? false;
    }
}