@extends('layouts.app')

@section('content')

@php
    $groupName = "";
@endphp
        <div>
            <div>
                <table>
                    </tbody>
@foreach($groups as $group)
    @if($group->group != $groupName)
    @php
        if($groupName != $group->group) {
            $groupName = $group->group;
        }        
    @endphp
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                Grupo {{ $groupName }}
            </div>

            <div class="card-body">
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th style="width: 300px;"> Jogador </th>
                            <th class="text-center" title="Pontos"> P </th>
                            <th class="text-center"  title="Jogos"> J </th>
                            <th class="text-center"  title="Vitórias"> V </th>
                            <th class="text-center"  title="Empates"> E </th>
                            <th class="text-center"  title="Derrotas"> D </th>
                            <th class="text-center"  title="Gols Sofridos"> G. S. </th>
                            <th class="text-center"  title="Gols Feitos"> G. F. </th>
                            <th class="text-center"  title="Cartões Amarelos"> C. A. </th>
                            <th class="text-center"  title="Cartões Vermelhos"> C. V. </th>
                        </tr>
                    </thead>

                    <tbody>
    @endif

            <tr>
                <td> {{ $group->userData->name }} </td>
                <td class="text-center" > {{ $group->points }} </td>
                <td class="text-center" > {{ $group->matches }} </td>
                <td class="text-center" > {{ $group->victories }} </td>
                <td class="text-center" > {{ $group->drawns }} </td>
                <td class="text-center" > {{ $group->defeats }} </td>
                <td class="text-center" > {{ $group->goals_conceded }} </td>
                <td class="text-center" > {{ $group->goals_scored }} </td>
                <td class="text-center" > {{ $group->yellow_card }} </td>
                <td class="text-center" > {{ $group->red_card }} </td>
            </tr> 

@endforeach
            </table>
        </div>
    </div>
        
@endsection
