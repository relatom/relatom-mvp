@extends('layouts.app')

@section('content')
            
    <div>
        <h1>Adherents</h1>
        <div>
            @forelse ($adherents as $adherent)
                <p>
                    @component('components.display-adherent', ['adherent' => $adherent])
                    @endcomponent
                </p>
            @empty
                <p>No adherents</p>
            @endforelse
        </div>
    </div>
@endsection
