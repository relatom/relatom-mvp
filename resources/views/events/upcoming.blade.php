@extends('layouts.app')

@section('content') 
    <section>
        <header class="mb-4">
            <h1 class="text-xl font-semibold pb-4">Évènements</h1>
            <div class="flex justify-between bg-white border-solid border p-4 pb-0 pt-3 rounded shadow-xs">
                <ul class="flex">
                    <li class="mr-6 pb-2 border-solid border-b-2 border-gray-700">
                        <a href="/events">Upcoming</a></li>
                    <li class="mr-6">
                        <a href="/events/past">Past</a></li>
                </ul> 
            </div>
        </header>
        <section class="bg-white border-solid border rounded shadow-xs mb-4">
            @foreach ($week as $key => $day)
                <h2 class="text-xs font-semibold uppercase bg-gray-200 text-gray-700 p-4 pt-2 pb-2">
                    @if ($key === date("Y-m-d"))
                        Aujourd'hui
                    @elseif ($key === date("Y-m-d", strtotime("+ 1 day")))
                        Demain
                    @else
                        {{ date('D j M', strtotime($key)) }} 
                    @endif
                </h2>
                @forelse ($day as $event)
                    <article class="flex p-4">
                        <span>{{ date('h : m', strtotime($event->start_at)) }}</span>
                        <h2 class="ml-4"><a 
                            class="font-semibold text-blue-800" href="{!! url('/events/' . $event->id); !!}">{{ $event->title }}</a></h2>
                    </article>
                @empty
                    <p class="p-4 text-gray-500">Aucun événement prévu.</p>
                @endforelse
            @endforeach
        </section>
        <section class="bg-white border-solid border rounded shadow-xs mb-4">
            <h2 class="text-base font-semibold p-4 pt-3 pb-3">
                Plus tard en {{ date("F", strtotime('this month')) }}</h2>
            <hr>
            <div class="p-4">
                @foreach ($month as $key => $event)
                    <article>
                        <span>{{ $event->start_at }}</span>
                        <h2><a href="{!! url('/events/' . $event->id); !!}">{{ $event->title }}</a></h2>
                    </article>
                @endforeach
            </div>
            
        </section>
        <section class="bg-white border-solid border rounded shadow-xs mb-4">
            @foreach ($after as $key => $month)
                <h2 class="text-base font-semibold p-4 pt-3 pb-3">{{ $key }}</h2>
                <hr>
                <div class="p-4">   
                    @foreach ($month as $event)
                        <article>
                            <span>{{ $event->start_at }}</span>
                            <h2><a href="{!! url('/events/' . $event->id); !!}">{{ $event->title }}</a></h2>
                        </article>
                    @endforeach
                </div>
            @endforeach
        </section>
    </section>
@endsection
