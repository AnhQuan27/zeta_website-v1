<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\RoleService;
use App\Http\Resources\RoleResource;
use App\Http\Requests\RoleRequest;

use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles();

        return RoleResource::collection($roles)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $role = $this->roleService->getRoleById($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], Response::HTTP_NOT_FOUND);
        }

        return (new RoleResource($role))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(RoleRequest $request)
    {
        $role = $this->roleService->createRole($request->validated());
        return response()->json(new RoleResource($role), Response::HTTP_CREATED);
    }

    public function update(RoleRequest $request, $id)
    {
        $updated = $this->roleService->updateRole($id, $request->validated());
        if (!$updated) {
            return response()->json(['message' => 'Role not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'Role updated successfully'], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $deleted = $this->roleService->deleteRole($id);
        if (!$deleted) {
            return response()->json(['message' => 'Role not found or failed to delete'], Response::HTTP_NOT_FOUND);
        }
        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->roleService->restoreRole($id);
        if (!$restored) {
            return response()->json(
                ['message' => 'Role not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->roleService->forceDeleteRole($id);
        if (!$deleted) {
            return response()->json(
                ['message' => 'Role not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }
}
