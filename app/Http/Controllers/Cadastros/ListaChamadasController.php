<?php

namespace Famerp\Http\Controllers\Cadastros;

use Famerp\Forms\ListaChamadaForm;
use Famerp\Models\ListaChamada;
use Illuminate\Http\Request;
use Famerp\Http\Controllers\Controller;

class ListaChamadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cadastros.lista-chamada.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(ListaChamadaForm::class, [
            'url'       => route('lista-chamada.store'),
            'method'    => 'POST'
        ]);

        return view('cadastros.lista-chamada.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(ListaChamadaForm::class);

        if(!$form->isValid())
            return redirect()->back()->withErrors($form->getErrors())->withInput();

        $dados = $form->getFieldValues();
        ListaChamada::create($dados);
        $request->session()->flash('message', 'Lista de chamada criada com sucesso!');
        return redirect()->route('lista-chamada.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  ListaChamada  $listaChamada
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listaChamada = ListaChamada::find($id);
        return view('cadastros.lista-chamada.show', compact('listaChamada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ListaChamada  $listaChamada
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaChamada $listaChamada)
    {
        $form = \FormBuilder::create(ListaChamadaForm::class, [
            'url'       => route('lista-chamada.update', ['listaChamada' => $listaChamada->ListaChamadaID]),
            'method'    => 'PUT',
            'model'     => $listaChamada,
        ]);

        return view('cadastros.lista-chamada.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ListaChamada  $listaChamada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaChamada $listaChamada)
    {
        $form = \FormBuilder::create(ListaChamadaForm::class);

        if(!$form->isValid())
            return redirect()->back()->withErrors($form->getErrors())->withInput();

        $dados = $form->getFieldValues();
        $listaChamada->update($dados);
        $request->session()->flash('message', 'Lista de chamada alterada com sucesso!');
        return redirect()->route('lista-chamada.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ListaChamada  $listaChamada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        ListaChamada::find($id)->delete();
        $request->session()->flash('message', 'Lista de chamada deletada com sucesso!');
        return redirect()->route('lista-chamada.index');
    }
}
