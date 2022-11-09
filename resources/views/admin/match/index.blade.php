@extends('layouts.app')

@section('content')

<form action="{{ route('admin.matches') }}" method="GET">
    @csrf
    <div class="card bg-dark text-white">
        <div class="card-header">
            Filtros
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <span> Pesquisar por Jogador</span>
                        <select name='filterPlayer' class="form-control">
                            <option value='0'> Escolha um jogador </option>
                            @foreach($groups as $player)
                            <option value="{{ $player->id }}" @if(request()->get('filterPlayer') == $player->id) selected @endif> {{ $player->userData->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <span> Pesquisar por Numero da partida</span>
                        <input type="number" class="form-control" value="matchPosition" value="@if(request()->get('matchPosition') != ''){{ request()->get('matchPosition') }}@endif">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-success" value="Filtrar partidas">
        </div>
    </div>
</form>

<div class="card mt-3">
    <div class="card-body">
        <table class="table table-striped w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th style="width: 30%"> Jogador 1</th>
                    <th class="text-center"> </th>
                    <th class="text-center"> X </th>
                    <th class="text-center"> </th>
                    <th style="width: 30%"> Jogador 2 </th>
                    <th class="text-center"> Grupo </th>
                    <th class="text-center"> Quadra </th>
                    <th class="text-center"> Opções </th>
                </tr>
            </thead>

            <tbody>
                @foreach($matches as $match)
                <tr>
                    <td> {{ $match->match_number }} </td>
                    <td style="width: 30%"> {{ $match->challenger1->userData->name }}</td>
                    <td class="text-center"> {{ $match->challenger_1_score }} </td>
                    <td class="text-center"> X </td>
                    <td class="text-center"> {{ $match->challenger_2_score }} </td>
                    <td style="width: 30%"> {{ $match->challenger2->userData->name }}</td>
                    <td class="text-center"> {{ $match->challenger2->group }} </td>
                    <td class="text-center"> {{ $match->challenger2->field }} </td>
                    <td class="text-right">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary"> Editar </a>
                            <a href="#" class="btn btn-success"> Resultados </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $matches->appends(request()->query())->links() }}
    </div>
</div>


@endsection