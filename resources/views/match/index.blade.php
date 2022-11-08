@extends('layouts.app')

@section('content')

    <div class="card mt-3">
            <div class="card-body">
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th> Horário </th>
                            <th style="width: 30%"> Jogador 1</th>
                            <th class="text-center">  </th>
                            <th class="text-center"> X </th>
                            <th class="text-center">  </th>
                            <th style="width: 30%"> Jogador 2 </th>
                            <th class="text-center"> Grupo </th>
                            <th class="text-center"> Quadra </th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td> {{ $match->match_starts }} </td>
                            <td style="width: 30%"> {{ $match->challenger1->userData->name }} {{ $match->challenger1->userData->group_position }} </td>
                            <td class="text-center"> {{ $match->challenger_1_score }} </td>
                            <td class="text-center"> X </td>
                            <td class="text-center"> {{ $match->challenger_2_score }} </td>
                            <td style="width: 30%"> {{ $match->challenger2->userData->name }} {{ $match->challenger2->userData->group_position }} </td>
                            <td class="text-center"> {{ $match->challenger2->group }} </td>
                            <td class="text-center"> {{ $match->challenger2->field }} </td>
                        </tr> 
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
        
@endsection
