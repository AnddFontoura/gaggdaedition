@extends('layouts.app')

@section('content')

<div class="alert alert-success" role="alert">
    Seja bem vindo <b> {{ Auth::user()->name }} </b>
</div>


@if($groups)
<div class="card mt-3">
    <div class="card-header">
        Grupo {{ $userInfo->group }}
    </div>

    <div class="card-body">
        <table class="table table-striped w-100">
            <thead>
                <tr>
                    <th style="width: 300px;"> Jogador </th>
                    <th class="text-center" title="Pontos"> P </th>
                    <th class="text-center" title="Jogos"> J </th>
                    <th class="text-center" title="Vitórias"> V </th>
                    <th class="text-center" title="Empates"> E </th>
                    <th class="text-center" title="Derrotas"> D </th>
                    <th class="text-center" title="Gols Sofridos"> G. S. </th>
                    <th class="text-center" title="Gols Feitos"> G. F. </th>
                    <th class="text-center" title="Cartões Amarelos"> C. A. </th>
                    <th class="text-center" title="Cartões Vermelhos"> C. V. </th>
                </tr>
            </thead>

            <tbody>
                @foreach($groups as $group)
                <tr>
                    <td> {{ $group->userData->name }} </td>
                    <td class="text-center"> {{ $group->points }} </td>
                    <td class="text-center"> {{ $group->matches }} </td>
                    <td class="text-center"> {{ $group->victories }} </td>
                    <td class="text-center"> {{ $group->drawns }} </td>
                    <td class="text-center"> {{ $group->defeats }} </td>
                    <td class="text-center"> {{ $group->goals_conceded }} </td>
                    <td class="text-center"> {{ $group->goals_scored }} </td>
                    <td class="text-center"> {{ $group->yellow_card }} </td>
                    <td class="text-center"> {{ $group->red_card }} </td>
                </tr>

                @endforeach
        </table>
    </div>
</div>

@if(count($groupMatches) > 0)
<div class="card mt-3">
    <div class="card-header">
        Fase de grupos
    </div>

    <div class="card-body">
        <div class="row">
            @foreach($groupMatches as $match)
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12">
                        <p>
                            @if($userInfo->id == $match->challenger_1)
                                <b>
                            @endif
                                {{ $match->challenger1->userData->name }}
                            @if($userInfo->id == $match->challenger_1)
                                </b>
                            @endif
                        </p>
                        <h1> {{ $match->challenger_1_score }} </h1>
                    </div>

                    <div class="col-md-2 col-lg-2 col-sm-12">
                        <h1> X </h1>
                    </div>

                    <div class="col-md-5 col-lg-5 col-sm-12">
                        <p>
                            @if($userInfo->id == $match->challenger_2)
                                <b>
                            @endif
                                {{ $match->challenger2->userData->name }}
                            @if($userInfo->id == $match->challenger_2)
                                </b>
                            @endif
                        </p>
                        <h1> {{ $match->challenger_2_score }} </h1>
                    </div>
                </div>
            </div>

            <hr>
            @endforeach
        </div>
    </div>
</div>
@endif

@endif
@endsection