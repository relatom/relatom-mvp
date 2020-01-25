@extends('layouts.app')

@section('content') 
    <section>
        <header>
            <h1>Évènements à venir</h1>
            <ul>
                <li><a href="/events">Upcoming</a></li>
                <li><a href="/events/past">Past</a></li>
            </ul> 
        </header>
        <section>
            <h2>Cette semaine</h2>
            @foreach ($week as $event)
                <article>
                    <span>{{ $event->start_at }}</span>
                    <h2><a href="{!! url('/events/' . $event->id); !!}">{{ $event->title }}</a></h2>
                </article>
            @endforeach
        </section>
        <section>
            <h2>Ce mois-ci</h2>
            @foreach ($month as $event)
                <article>
                    <span>{{ $event->start_at }}</span>
                    <h2><a href="{!! url('/events/' . $event->id); !!}">{{ $event->title }}</a></h2>
                </article>
            @endforeach
        </section>
        <section>
            <h2>Suite</h2>
            @foreach ($after as $event)
                <article>
                    <span>{{ $event->start_at }}</span>
                    <h2><a href="{!! url('/events/' . $event->id); !!}">{{ $event->title }}</a></h2>
                </article>
            @endforeach
        </section>
    </section>
@endsection
