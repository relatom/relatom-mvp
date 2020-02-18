<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Event;
use App\Adherent;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upcoming()
    {

        $days = Event::where('start_at', '>=', now())
            ->orderBy('start_at', 'asc')
            ->get()
            ->groupBy(function ($val) {
                return date("Y-m-d", strtotime($val->start_at));
            });

        return view('events.index', ['type' => 'upcoming', 'days' => $days]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function past()
    {

        $days = Event::where('start_at', '<', now())
            ->orderBy('start_at', 'desc')
            ->get()
            ->groupBy(function ($val) {
                return date("Y-m-d", strtotime($val->start_at));
            });

        return view('events.index', ['type' => 'past', 'days' => $days]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $event = Event::findOrFail($id);
        $participants = $event->participants;
        $auth_adherents_participation = $event->participants()->where('user_id', Auth::id())->get();
        $auth_adherents = Auth::user()->adherents;
        foreach ($auth_adherents as $adherent) {
            foreach ($auth_adherents_participation as $participant) {
                if($adherent->id === $participant->id) {
                    $adherent->is_participating = true;
                }
            }
        }

        return view('events.show', [
            'event' => $event,
            'participants' => $participants, 
            'auth_adherents' => $auth_adherents
        ]);
    }

    /**
     * Show all the participations 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showParticipants($id)
    {

        $event = Event::findOrFail($id);
        $participants = $event->participants;
        $auth_adherents_participation = $event->participants()->where('user_id', Auth::id())->get();
        $auth_adherents = Auth::user()->adherents;
        foreach ($auth_adherents as $adherent) {
            foreach ($auth_adherents_participation as $participant) {
                if($adherent->id === $participant->id) {
                    $adherent->is_participating = true;
                }
            }
        }

        $comments = $event->comments;

        return view('events.show', [
            'event' => $event,
            'participants' => $participants, 
            'comments' => $comments,
            'auth_adherents' => $auth_adherents
        ]);
    }

    /**
     * Show discussions
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showComments($id)
    {

        $event = Event::findOrFail($id);
        $auth_adherents_participation = $event->participants()->where('user_id', Auth::id())->get();
        $auth_adherents = Auth::user()->adherents;
        foreach ($auth_adherents as $adherent) {
            foreach ($auth_adherents_participation as $participant) {
                if($adherent->id === $participant->id) {
                    $adherent->is_participating = true;
                }
            }
        }

        $comments = $event->comments;

        return view('events.show-comments', [
            'event' => $event,
            'comments' => $comments,
            'auth_adherents' => $auth_adherents
        ]);
    }

    /**
     * Save the participations 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveParticipations(Request $request)
    {
        $id = $request->id;
        $adherents_id = Auth::user()->adherents->pluck('id')->all();

        $event = Event::findOrFail($id);
        $already_saved = $event->participants()->where('user_id', Auth::id())->pluck('id')->all();

        $participations = $request->participations;
        $participations = array_map('intval', $participations);

        $detach = array_diff($adherents_id, $participations);
        $detach = array_intersect($detach, $already_saved);

        $attach = array_diff($participations, $already_saved);

        if(!empty($detach)) {
            $event->participants()->detach($detach);
        }

        if(!empty($attach)) {
            $event->participants()->attach($attach);
        }

        return redirect('/events/' . $id);
    }

    /**
     * Save the comments 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveComments(Request $request)
    {
        $id = $request->id;
        $event = Event::findOrFail($id);

        $comment = $event->comments()->create([
            'message' => $request->message,
            'user_id' => Auth::id()
        ]);

        return redirect('/events/' . $id . '#discussions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
