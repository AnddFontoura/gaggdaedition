@extends('layouts.app')

@section('content')

<form action="{{ route('admin.matches.update', $match->id) }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Editar Jogo
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <h3> Jogador 1 </h3>
                        <p> {{ $match->challenger1->userData->name }} </p> 
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <h3> Jogador 2 </h3>
                        <p> {{ $match->challenger2->userData->name }} </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <h3> Numero da partida no grupo </h3>
                        <input type="number" class="form-control" name="match_number" value="@if($match){{ $match->match_number }}@endif">
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <h3> Grupo </h3>
                        <p> {{ $match->challenger2->group }} </p>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <h3> Campo </h3>
                        <p> {{ $match->challenger2->field }} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-success" value="Atualizar partida">
        </div>
    </div>
</form>

@endsection