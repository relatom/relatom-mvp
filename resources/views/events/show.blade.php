@extends('layouts.app')

@section('content')
    <article>
        <header>
            <h1>{{ $event->title }}</h1>
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
        <div>
            <div>
                <section>
                    <h2>Détails</h2>
                    <p>{!! $event->description !!}</p>
                </section>
                <section>
                    <h2>Participations</h2>
                    @isset($participants)
                        <ul>
                            @forelse ($participants as $participant)
                                <li><a href="{!! url('adherents/' . $participant->id); !!}">
                                    @component('components.display-adherent', ['adherent' => $participant])
                                    @endcomponent
                                </a></li>
                            @endforeach
                        </ul>
                    @endisset
                    <div>
                        <h3>Votre participations</h3>
                        @isset($auth_adherents)
                            <form action="{{ url('/events/' . $event->id . '/participations') }}" method="POST">
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
                </section>
            </div>
            <section id="discussions">
                <h2>Discussions</h2>
                @forelse ($comments as $comment)
                    <article>
                        <p>{{ $comment->message }}</p>
                        <p>{{ $comment->updated_at }} - Célestin Ballèvre</p>
                    </article>
                @empty
                    <p>No comments</p>
                @endforelse
                    
                <div>
                    <h3>Nouveau commentaire</h3>
                    <form action="{{ url('/events/' . $event->id . '/comments') }}" method="POST">
                        {{ csrf_field() }}
                        <textarea rows="4" cols="50" name="message" placeholder="Ajouter votre commentaire"></textarea>
                        <input type="submit" name="submit" value="Ajouter">
                    </form>
                </div>
            </section>    
        </div>
    </article>
@endsection
