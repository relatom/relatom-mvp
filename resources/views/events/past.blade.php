@extends('layouts.app')

@section('content') 
    <section>
        <header>
            <h1>Évènements à passées</h1>
            <ul>
                <li><a href="/events">Upcoming</a></li>
                <li><a href="/events/past">Past</a></li>
            </ul> 
        </header>
        <section>
            @foreach ($events as $event)
                <article>
                    <span>{{ $event->start_at }}</span>
                    <h2><a href="{!! url('/events/' . $event->id); !!}">{{ $event->title }}</a></h2>
                </article>
            @endforeach
        </section>
    </section>
@endsection
