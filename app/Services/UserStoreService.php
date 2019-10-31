<?php


namespace App\Services;


use App\MyCache\UserMyCache;
use App\Repositories\RepositoryInterface;
use App\User;

class UserStoreService
{
    protected $userRepository;

    protected $userMyCache;

    public function __construct(RepositoryInterface $repository, User $user, UserMyCache $userMyCache)
    {

        $repository->setModel($user);
        $this->userRepository = $repository;
        $this->userMyCache = $userMyCache;

    }

    public function save($data)
    {
        $user = $this->userRepository->create(['name' => $data['name']]);

        if($user == null)
            return redirect()->route('home.index');


        $this->userMyCache->add($user);

        return true;
    }
}
