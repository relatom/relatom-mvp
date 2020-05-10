@extends('layouts.app')

@section('content') 
    <section>
        <header class="mb-4">
            <div class="flex justify-between pb-4">
                <h1 class="text-xl font-semibold">Évènements</h1>
                <a href="#">Add a event</a>
            </div>
            
            <div class="flex justify-between cards p-4 pb-0 pt-3 shadow-xs">
                <ul class="flex">
                    <li class="mr-6 pb-2 {{ $type === 'upcoming' ? 'tab--nav--active' : '' }}">
                        <a href="/events">Upcoming</a></li>
                    <li class="mr-6 pb-2 {{ $type === 'past' ? 'tab--nav--active' : '' }}">
                        <a href="/events/past">Past</a></li>
                </ul> 
            </div>
        </header>
            @foreach ($days as $key => $day)
                <section class="mt-4">
                    <header>
                        <h2 class="text-sm font-semibold pl-4 pb-3 text-gray-800">
                            {{ strtolower(date('l j F', strtotime($key))) }} 
                        </h2>
                    </header>
                    <main class="cards">
                        @foreach($day as $event)
                            <article class="flex p-4 border-b last:border-b-0">
                                <div class="flex-shrink-0">
                                    <p class="w-full">{{ date('G : m', strtotime($event->start_at)) }}</p>
                                </div>
                                <div class="ml-4">
                                    <p class="text-xs text-gray-800 font-semibold">Groupe d'école de pagaie, loisir adulte</p>
                                    <h3>
                                        <a class="font-semibold text-lg text-blue-500 hover:text-blue-800 hover:underline" href="{!! url('/events/' . $event->id); !!}">
                                            {{ $event->title }}
                                        </a>
                                    </h3>
                                    <p class="text-gray-600 ">4 Membres inscrits</p>
                                </div>
                            </article>   
                        @endforeach
                    </main>
                </section>
            @endforeach 
    </section>
@endsection
