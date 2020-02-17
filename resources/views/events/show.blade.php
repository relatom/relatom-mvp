@extends('layouts.app')

@section('content')
<article>
    <h1 class="text-xl font-semibold pb-4">{{ $event->title }}</h1>
    <header class="cards p-4"> 
        <p>Organisé par Célestin Ballèvre et ...</p>
        <p>
            {{ $event->start_at->format('l j F') }} 

            {{ isset($event->finish_at) ? 'de' : 'à' }}

            {{ $event->start_at->format('h:i') }} 

            @isset($event->finish_at) 
            à {{ $event->finish_at->format('h:i') }}
            @endisset
        </p> 
        <p>Lieux de l'activité : </p> 
    </header>
    <div class="cards">
        <h3 class="cards--header font-semibold">Votre participations</h3>
        @isset($auth_adherents)
        <form class="p-4" action="{{ url('/events/' . $event->id . '/participations') }}" method="POST">
            {{ csrf_field() }}
            <fieldset>
                <legend>Specify participations</legend>
                @forelse ($auth_adherents as $adherent)
                <input id="adherent-{{$adherent->id}}" 
                type="checkbox" 
                name="participations[]" 
                @isset($adherent->is_participating) 
                checked
                @endisset
                value="{{$adherent->id}}">
                <label for="adherent-{{$adherent->id}}">
                    @component('components.display-adherent', ['adherent' => $adherent])
                    @endcomponent
                </label><br>
                @endforeach
            </fieldset>
            <input type="submit" name="Sauvegarder"/>
        </form>
        @endisset
    </div>
    <div class="flex justify-between cards p-4 pb-0 pt-3">
        <ul class="flex">
            <li class="mr-6 pb-2 border-solid border-b-2 border-blue-800 ">
                <a href="">Détails</a>
            </li>
            <li class="mr-6">
                <a href="">Discussions</a>
            </li>
        </ul> 
    </div>
    <div >
        <section class="cards">
            <h2 class="cards--header font-semibold">À propos</h2>
            <p class="p-4">{!! $event->description !!}</p>
        </section>
        <section class="cards">
            <header class="flex justify-between cards--header">
                <h2 class="font-semibold">Participants</h2>
                <a href="">Voir tous</a>
            </header>
            
            @isset($participants)
            <ul class="p-4">
                @forelse ($participants as $participant)
                <li><a href="{!! url('adherents/' . $participant->id); !!}">
                    @component('components.display-adherent', ['adherent' => $participant])
                    @endcomponent
                </a></li>
                @endforeach
            </ul>
            @endisset
        </section>
    </div>                
    <div class="cards">
        <form class="p-4" action="{{ url('/events/' . $event->id . '/comments') }}" method="POST">
            {{ csrf_field() }}
            <textarea rows="4" cols="50" name="message" placeholder="Ajouter votre commentaire"></textarea>
            <input type="submit" name="submit" value="Ajouter">
        </form>   
    </div>
    <section id="discussions" class="cards">
        <h2 class="cards--header font-semibold">Discussions</h2>
        @forelse ($comments as $comment)
        <article>
            <p>{{ $comment->message }}</p>
            <p>{{ $comment->updated_at }} - Célestin Ballèvre</p>
        </article>
        @empty
        <p>No comments</p>
        @endforelse

        
    </section>        
</article>
@endsection
