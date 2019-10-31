<?php


namespace App\Services;


use App\Question;
use App\Repositories\RepositoryInterface;

class NewQuestionServices
{
    protected $quesitonRepository;

    public function __construct(RepositoryInterface $repository, Question $question)
    {

        $repository->setModel($question);
        $this->quesitonRepository = $repository;

    }

    public function getNewQuestion($previous)
    {

        $question = $this->quesitonRepository->find($previous + 1 );

        return $question;

    }
}
