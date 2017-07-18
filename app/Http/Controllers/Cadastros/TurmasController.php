<?php

namespace Famerp\Http\Controllers\Cadastros;

use Famerp\Forms\TurmaForm;
use Famerp\Models\Turma;
use Illuminate\Http\Request;
use Famerp\Http\Controllers\Controller;

class TurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cadastros.turmas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(TurmaForm::class, [
            'url'       => route('turmas.store'),
            'method'    => 'POST'
        ]);

        return view('cadastros.turmas.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(TurmaForm::class);

        if(!$form->isValid())
            return redirect()->back()->withErrors($form->getErrors())->withInput();

        $dados = $form->getFieldValues();
        Turma::create($dados);
        $request->session()->flash('message', 'Turma criada com sucesso!');
        return redirect()->route('turmas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Turma  $listaChamada
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turma = Turma::find($id);
        return view('cadastros.turmas.show', compact('turma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Turma  $listaChamada
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma $turma)
    {
        $form = \FormBuilder::create(TurmaForm::class, [
            'url'       => route('turmas.update', ['turma' => $turma->TurmaID]),
            'method'    => 'PUT',
            'model'     => $turma,
        ]);

        return view('cadastros.turmas.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Turma  $listaChamada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turma $turma)
    {
        $form = \FormBuilder::create(TurmaForm::class);

        if(!$form->isValid())
            return redirect()->back()->withErrors($form->getErrors())->withInput();

        $dados = $form->getFieldValues();
        $turma->update($dados);
        $request->session()->flash('message', 'Turma alterada com sucesso!');
        return redirect()->route('turmas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Turma  $listaChamada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Turma::find($id)->delete();
        $request->session()->flash('message', 'Turma deletada com sucesso!');
        return redirect()->route('turmas.index');
    }
}
