<?php

namespace Famerp\Http\Controllers\Cadastros;

use Famerp\Models\Paciente;
use Famerp\PacienteForm;
use Illuminate\Http\Request;
use Famerp\Http\Controllers\Controller;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate();
        return view('cadastros.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(PacienteForm::class, [
            'url'       => route('pacientes.store'),
            'method'    => 'POST'
        ]);

        return view('cadastros.pacientes.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(PacienteForm::class);

        if(!$form->isValid())
            return redirect()->back()->withErrors($form->getErrors())->withInput();

        $dados = $form->getFieldValues();
        Paciente::create($dados);
        $request->session()->flash('message', 'Paciente criado(a) com sucesso!');
        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente  $paciente)
    {
        return view('cadastros.pacientes.show', ['paciente' => $paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        $form = \FormBuilder::create(PacienteForm::class, [
            'url'       => route('pacientes.update', ['paciente' => $paciente->PacienteID]),
            'method'    => 'PUT',
            'model'     => $paciente,
        ]);

        return view('cadastros.pacientes.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Paciente $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $form = \FormBuilder::create(PacienteForm::class);

        if(!$form->isValid())
            return redirect()->back()->withErrors($form->getErrors())->withInput();

        $dados = $form->getFieldValues();
        $paciente->update($dados);
        $request->session()->flash('message', 'Paciente alterado(a) com sucesso!');
        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Paciente $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Paciente $paciente)
    {
        $paciente->delete();
        $request->session()->flash('message', 'Paciente deletado(a) com sucesso!');
        return redirect()->route('pacientes.index');
    }
}
