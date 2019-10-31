<?php


namespace App\Http\Controllers;


use App\Answer;
use App\MyCache\UserMyCache;
use App\Question;
use App\Repositories\RepositoryInterface;
use App\User;

class ResultController extends Controller
{
    protected $userRepository;

    protected $questionRepository;

    protected $answerRepository;

    protected $userMyCache;

    public function __construct(RepositoryInterface $repository, User $user, UserMyCache $userMyCache, RepositoryInterface $questionRepository, Question $question, RepositoryInterface $answerRepository, Answer $answer)
    {

        $repository->setModel($user);
        $this->userRepository = $repository;

        $questionRepository->setModel($question);
        $this->questionRepository = $questionRepository;

        $answerRepository->setModel($answer);
        $this->answerRepository = $answerRepository;

        $this->userMyCache = $userMyCache;

    }

    public function index()
    {
        $user = $this->userRepository->findByAttributes(['id' => $this->userMyCache->get()->id],['answers' => 'results']);

        $result['user_name'] = $user->name;
        $right = 0;
        $wrong = 0;

        foreach ($user->results as $item)
        {

            $resultIn['question'] = $this->questionRepository->find($item->question_id);
            $resultIn['answer'] = $this->answerRepository->find($item->answer_id);

            if($resultIn['answer']->id == $resultIn['question']->right_answer) {
                $resultIn['status'] = true;
                $right += 1;
            }
            else{
                $resultIn['status'] = false;
                $wrong +=1;
            }

            $result['result'][] = $resultIn;

        }

        $result['right'] = $right;
        $result['wrong'] = $wrong;

        return view('result',['results' => $result]);
    }

}
