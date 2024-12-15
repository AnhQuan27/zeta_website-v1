<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService 
{
    protected $roleService;

    public function __construct(RoleRepository $roleService)
    {
        $this->roleService = $roleService;
    }

    public function getAllRoles()
    {
        return $this->roleService->getAll();
    }

    public function getRoleById($id)
    {
        return $this->roleService->getById($id);
    }

    public function createRole(array $data)
    {
        return $this->roleService->create($data);
    }

    public function updateRole($id, array $data)
    {
        return $this->roleService->update($id, $data);
    }

    public function deleteRole($id)
    {
        return $this->roleService->delete($id);
    }

    public function restoreRole($id)
    {
        return $this->roleService->restore($id);
    }

    public function forceDeleteRole($id)
    {
        return $this->roleService->forceDelete($id);
    }
}