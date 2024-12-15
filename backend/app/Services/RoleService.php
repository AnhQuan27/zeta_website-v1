<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService 
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRoles()
    {
        return $this->roleRepository->getAll();
    }

    public function getRoleById($id)
    {
        return $this->roleRepository->getById($id);
    }

    public function createRole(array $data)
    {
        return $this->roleRepository->create($data);
    }

    public function updateRole($id, array $data)
    {
        return $this->roleRepository->update($id, $data);
    }

    public function deleteRole($id)
    {
        return $this->roleRepository->delete($id);
    }

    public function restoreRole($id)
    {
        return $this->roleRepository->restore($id);
    }

    public function forceDeleteRole($id)
    {
        return $this->roleRepository->forceDelete($id);
    }
}