@extends('layouts.app')

@section('content')

<form action="@if($match){{ route('admin.matches.new.update', $match->id) }}@else{{ route('admin.matches.new.save') }}@endif" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Criar Jogo
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <h3> Jogador 1 </h3>
                        <select name='challenger_1' class="form-control">
                            @foreach($groups as $player)
                            <option value="{{ $player->id }}" @if($match && $match->challenger_1 == $player->id) selected @endif> {{ $player->userData->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <h3> Jogador 2 </h3>
                        <select name='challenger_2' class="form-control">
                            @foreach($groups as $player)
                            <option value="{{ $player->id }}" @if($match && $match->challenger_2 == $player->id) selected @endif> {{ $player->userData->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <h3> Tipo de partida</h3>
                        <select name='type' class="form-control">
                            @foreach($matchPhases as $key => $matchPhase)
                            <option value="{{ $key }}" @if($match && $match->type == $key) selected @endif> {{ $matchPhase }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <h3> Numero da partida </h3>
                        <input type="number" class="form-control" name="match_number" value="@if($match){{ $match->match_number }}@endif">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-success" value="@if($match) Atualizar @else Criar @endif partida">
        </div>
    </div>
</form>

@endsection