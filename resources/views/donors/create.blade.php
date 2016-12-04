@extends('layouts.dashboard')
@section('pagina', 'Concluir perfil')

@section('conteudo')
  <div class="container">
    <div class="row">
      {{ Form::open(
        'class' => 'form',
        'action' => 'DonorController@store',
        ) }}

      {{ Form::submit('Continuar', ['class' => 'btn btn-primary']) }}

      {{ Form::close() }}
    </div>
  </div>
@endsection
