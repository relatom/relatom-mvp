@extends('layouts.app')

@section('content')
            
    <div>
        <h1>Adherents</h1>
        <div>
            @component('components.display-adherent', ['adherent' => $adherent])
            @endcomponent
        </div>
    </div>
@endsection
