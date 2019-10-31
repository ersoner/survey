<?php


namespace App\Http\Controllers;

use App\Repositories\RepositoryInterface;
use App\Services\UserStoreService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userStoreService;

    public function __construct(UserStoreService $userStoreService)
    {
        $this->userStoreService = $userStoreService;
    }

    public function index()
    {
        return dd($this->repository->all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $request = $request->all();

        $this->userStoreService->save($request);

        return redirect()->route('question.index',['id' => 1]);
    }
}
