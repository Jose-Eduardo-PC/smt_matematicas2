<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreRequest;
use App\Http\Requests\Question\UpdateRequest;
use Yajra\Datatables\Datatables;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function datatables(Test $test)
    {
        return DataTables::of(Question::where('test_id', $test->id)->select('id', 'statement', 'correct_paragraph', 'incisoA', 'incisoB', 'incisoC', 'incisoD'))
            ->addColumn('paragraph', function (Question $question) {
                return '<b>A)</b> ' . $question->incisoA . '<br><b>B)</b> '  . $question->incisoB . '<br><b>C)</b> ' . $question->incisoC . '<br><b>D)</b> ' . $question->incisoD . '<br>';
            })
            ->addColumn('correct_paragraph', function (Question $question) {
                return '<b>' . $question->correct_paragraph . '</b>';
            })
            ->addColumn('btn', 'admin.questions.partials.btn')
            ->rawColumns(['paragraph', 'btn', 'correct_paragraph'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question, Request $request)
    {
        $testId = $request->input('testId');
        $questions = Question::all();
        $question = new Question();
        return view('admin.questions.create', ['testId' => $testId], compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $test = Test::find($request->test_id);
        $questionCount = $test->qusestions()->count();
        $questionLimit = 10;

        if ($questionCount < $questionLimit) {
            (new Question())->fill($request->validated())->save();
            return redirect()->route('tests.show', $request->test_id);
        } else {
            session()->flash('error', 'Se ha alcanzado el límite de preguntas para este examen.');
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Question $question)
    {
        $question->fill($request->validated());
        $question->save();
        return redirect()->route('tests.show', ['test' => $question->test_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('tests.show', ['test' => $question->test_id])->with('eliminar', 'ok');
    }
}
