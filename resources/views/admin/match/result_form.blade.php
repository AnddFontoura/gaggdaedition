@extends('layouts.app')

@section('content')

<form action="{{ route('admin.matches.update_result', $match->id) }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Cadastrar resultado do Jogo
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <h3> Jogador 1 </h3>
                        <p> {{ $match->challenger1->userData->name }} </p>
                    </div>

                    <div class="form-group mt-3">
                        <span> Gols feitos </span>
                        <input type="number" name="challenger1_goals_scored" class="form-control" value="@if($challenger1Info){{$challenger1Info->goals_scored}}@else{{ 0 }}@endif">
                    </div>

                    <div class="form-group mt-3">
                        <span> Cartões Amarelos </span>
                        <input type="number" name="challenger1_yellow_card" class="form-control" value="@if($challenger1Info){{$challenger1Info->yellow_card}}@else{{ 0 }}@endif">
                    </div>

                    <div class="form-group mt-3">
                        <span> Cartões Vermelhos </span>
                        <input type="number" name="challenger1_red_card" class="form-control" value="@if($challenger1Info){{$challenger1Info->red_card}}@else{{ 0 }}@endif">
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="form-group">
                        <h3> Jogador 2 </h3>
                        <p> {{ $match->challenger2->userData->name }} </p>
                    </div>

                    <div class="form-group mt-3">
                        <span> Gols feitos </span>
                        <input type="number" name="challenger2_goals_scored" class="form-control" value="@if($challenger2Info){{$challenger2Info->goals_scored}}@else{{ 0 }}@endif">
                    </div>

                    <div class="form-group mt-3">
                        <span> Cartões Amarelos </span>
                        <input type="number" name="challenger2_yellow_card" class="form-control" value="@if($challenger2Info){{$challenger2Info->yellow_card}}@else{{ 0 }}@endif">
                    </div>

                    <div class="form-group mt-3">
                        <span> Cartões Vermelhos </span>
                        <input type="number" name="challenger2_red_card" class="form-control" value="@if($challenger2Info){{$challenger2Info->red_card}}@else{{ 0 }}@endif">
                    </div>
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