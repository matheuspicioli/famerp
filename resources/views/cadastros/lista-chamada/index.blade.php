@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>Listas de chamadas</h2>
                        <div class="row">
                            {!! Button::primary('Nova lista de chamada')->asLinkTo(route('lista-chamada.create')) !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        {!!
                            Table::withContents($listasChamadas->items())
                                ->striped()
                                ->callback('Ações', function($field, $listaChamada){
                                    $linkEdit = route('lista-chamada.edit',['listaChamada' => $listaChamada->ListaChamadaID]);
                                    $linkShow = route('lista-chamada.show',['listaChamada' => $listaChamada->ListaChamadaID]);
                                    return Button::link(Icon::create('pencil'))->asLinkTo($linkEdit).'|'.
                                            Button::link(Icon::create('remove'))->asLinkTo($linkShow);
                                })
                        !!}
                    </div>
                    <div class="panel-body">
                        {!! $listasChamadas->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style type="text/css">
    /*table > thead > tr > th:nth-child(9){
        width: 40%;
    }*/
</style>
@endpush