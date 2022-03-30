<?php
namespace Modules\Entity\Model\Application;

use Modules\Entity\Services\ModelRole;
use Modules\Entity\Model\SysUserType\SysUserType;

class Role extends ModelRole {
    public function calc(){
        if ($this->request->user()->type_id == SysUserType::MANAGER)
            $this->query->where('manager_id', $this->request->user()->id);
        
    }

}
