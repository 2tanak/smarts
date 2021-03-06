<?php

namespace Modules\Entity\Policies;

use App\User;
use Modules\Entity\Model\SysUserType\SysUserType;
use Illuminate\Auth\Access\HandlesAuthorization;

class MainPolicy {
    use HandlesAuthorization;


    private function mainCheck($user){
        return in_array($user->type_id, [SysUserType::ADMIN]);
    }

    public function list(User $user){
        if (!$this->mainCheck($user))
            return false;

        return true;
    }

    public function view($user, $item){
        if (!$this->mainCheck($user))
            return false;

        return true;
    }

    public function create($user){
      if (!$this->mainCheck($user))
            return false;

        return true;
    }

    public function update($user, $item){
        if (!$this->mainCheck($user))
            return false;

        return true;
    }

    public function delete($user){
       if (!$this->mainCheck($user))
            return false;

        return true;
    }

}
