@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar tarefa') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tarefa.update', ['tarefa' => $tarefa->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="tarefa" class="form-label">Tarefa</label>
                          <input name="tarefa" value="{{ $tarefa->tarefa }}" type="text" class="form-control" id="tarefa" aria-describedby="emailHelp">                          
                        </div>
                        <div class="mb-3">
                          <label for="limite" class="form-label">Data limite concusão</label>
                          <input name="data_limite_conclusao" value="{{ $tarefa->data_limite_conclusao }}" type="date" class="form-control" id="limite">
                        </div>                       
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
