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
                            <td style="width: 30%"> {{ $match->challenger1->userData->name }} </td>
                            <th class="text-center"> {{ $match->challenger_1_score }} </th>
                            <th class="text-center"> X </th>
                            <th class="text-center"> {{ $match->challenger_2_score }} </th>
                            <th style="width: 30%"> {{ $match->challenger2->userData->name }} </th>
                            <th class="text-center"> {{ $match->challenger2->group }} </th>
                            <th class="text-center"> {{ $match->challenger2->field }} </th>
                        </tr> 
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
        
@endsection
