@extends('layouts.app')

@section('content')

@php
    $groupName = "";
@endphp
        <div>
            <div>
                <ul>
@foreach($groups as $group)
    @if($group->group != $groupName)
    @php
        if($groupName != $group->group) {
            $groupName = $group->group;
        }        
    @endphp
                </ul>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                Grupo {{ $groupName }}
            </div>

            <div class="card-body">
                <ul class="list">
    @endif

            <li> {{ $group->userData->name }}

   


@endforeach

            </ul>
        </div>
    </div>
        
@endsection
