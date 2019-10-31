<?php


namespace App\Services;


use App\MyCache\UserMyCache;
use App\Repositories\RepositoryInterface;
use App\UserAnswer;

class UserAnswerControlServices
{
    protected $userAnswerRepository;

    protected $userMyCache;

    public function __construct(RepositoryInterface $repository, UserAnswer $userAnswer, UserMyCache $userMyCache)
    {

        $repository->setModel($userAnswer);
        $this->userAnswerRepository = $repository;
        $this->userMyCache = $userMyCache;

    }

    public function control($id)
    {
        $userAnswer = $this->userAnswerRepository->findByAttributes(['user_id' => $this->userMyCache->get()->id,'question_id' => $id]);

        if($userAnswer == null)
            return false;

        return true;
    }
}
