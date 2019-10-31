<?php


namespace App\Services;


use App\MyCache\UserMyCache;
use App\Repositories\RepositoryInterface;
use App\UserAnswer;

class QuestionStoreService
{
    protected $userAnswerRepository;

    protected $userMyCache;

    public function __construct(RepositoryInterface $repository, UserAnswer $userAnswer, UserMyCache $userMyCache)
    {

        $repository->setModel($userAnswer);
        $this->userAnswerRepository = $repository;
        $this->userMyCache = $userMyCache;
    }

    public function store($data)
    {

        if($data == null)
            return abort(404);

        $userAnswer = $this->userAnswerRepository->create([
            'user_id' => $this->userMyCache->get()->id,
            'question_id' => $data['question_id'],
            'answer_id' => $data['answer_id']
        ]);

        if($userAnswer == null)
            return redirect()->route('question.index',['id' => $data['question_id']]);

        return $userAnswer;
    }

}
