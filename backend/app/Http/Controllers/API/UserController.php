<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userService;

    /**
     * Constructor
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return UserResource::collection($users)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_OK);;
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());
        return response()->json(new UserResource($user), Response::HTTP_CREATED);
    }

    public function update(UserRequest $request, $id)
    {
        $updated = $this->userService->updateUser($id, $request->validated());
        if (!$updated) {
            return response()->json(
                ['message' => 'User not found'], 
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->json(
            ['message' => 'User updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->userService->deleteUser($id);
        if (!$deleted) {
            return response()->json(['message' => 'User not found or failed to delete'], Response::HTTP_NOT_FOUND);
        }
        return response()->noContent();
    }
}
