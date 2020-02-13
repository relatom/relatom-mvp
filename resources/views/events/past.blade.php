@extends('layouts.app')

@section('content') 
    <section>
         <header class="pb-4">
            <h1 class="text-xl font-semibold pb-4">Évènements</h1>
            <ul class="flex border-solid border-b mb-4">
                <li class="mr-6 pb-2">
                    <a href="/events">Upcoming</a></li>
                <li class="mr-6 pb-2 border-solid border-b-2 border-gray-700">
                    <a href="/events/past">Past</a></li>
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
