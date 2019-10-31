<?php


namespace App\Http\Controllers;


use App\MyCache\UserMyCache;
use App\Question;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use App\Services\NewQuestionServices;
use App\Services\QuestionStoreService;
use App\Services\UserAnswerControlServices;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $repository;

    protected $userMyCache;

    protected $newQuestionServices;

    public function __construct(RepositoryInterface $repository, Question $question, UserMyCache $userMyCache, NewQuestionServices $newQuestionServices)
    {

        $repository->setModel($question);
        $this->repository = $repository;
        $this->userMyCache = $userMyCache;
        $this->newQuestionServices = $newQuestionServices;

    }

    public function index(Request $request, UserAnswerControlServices $userAnswerControlServices)
    {
        if($userAnswerControlServices->control($request->input('id')) == true)
        {
            return $this->newQuestion( $request->input('id') );
        }

        $question = $this->repository->findByAttributes(['id' => $request->input('id')],['options' => 'answers'],['*'],true);

        if($question == null)
            return abort(404);

        return view('question',['question' => $question, 'user' => $this->userMyCache->get()->name]);
    }

    public function store(Request $request, QuestionStoreService $questionStoreService)
    {
        $this->validate($request, [
            'question_id' => 'required',
            'answer_id'   => 'required',
        ]);

        $questionStoreService->store($request->all());

        return $this->newQuestion($request->input('question_id'));
    }

    public function newQuestion($id)
    {
        $question = $this->newQuestionServices->getNewQuestion($id);

        if($question == null)
        {
            return redirect()->route('result.index');
        }

        return redirect()->route('question.index',['id' => $question->id]);
    }

}
