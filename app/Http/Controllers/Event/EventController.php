<?php

namespace App\Http\Controllers\Event;

use App\Event;
use App\Events\CalenderEventAdded;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Event\FormatEventData;
use App\Http\Requests\AddEventRequest;
use Auth;

class EventController extends Controller
{
    use FormatEventData;

    /**
     *  list of events that belongs to the user
     */
    public $events;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        //please import the database form /database/test.sql first and login user as below
        //username - suman@suman.com
        //password - password
        $this->middleware('auth');
    }

    /**
     * sets the events
     *
     * @return  Illuminate\Contracts\View
     */
    public function index()
    {
        $this->setEvents();

        return view('event.calender', [
            'events'         => $this->getEvents(),
            'calenderEvents' => $this->getformatedEventForCalender(),
        ]);
    }

    /**
     *  @return collcetion
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * sets the events for current user
     *
     * @return void
     */
    public function setEvents()
    {
        $this->events = Event::where('user_id', auth()->user()->id)
            ->orderBy('event_date')
            ->get(['id', 'title', 'event_date']);
    }

    /**
     * Show the form for editing the specified resource
     *
     * @param $id int id of the event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->getSelectedEvent($id);

        return view('event.edit', [
            'event' => $event,
        ]);
    }

    /**
     *  Store a newly created resource in storage
     *
     * @param \Illuminate\Http\Request $requestt
     * @return \Illuminate\Http\Response
     */
    public function store(AddEventRequest $request)
    {

        $event = Event::create([
            'user_id'    => auth()->user()->id,
            'title'      => $request->title,
            'event_date' => $request->date,
        ]);

        //fire event to do somthing else like, sending emails
        event(new CalenderEventAdded($event));

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, AddEventRequest $request)
    {
        $event = $this->getSelectedEvent($id);

        $event->update([
            'title'      => $request->title,
            'event_date' => $request->date,
        ]);

        return redirect()->route('event');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $event = $this->getSelectedEvent($id);

        $event->delete();

        return redirect()->back();
    }

    /**
     * gets the selected event or fails
     *
     * @param int $id
     * @return  Illuminate\Database\Eloquent\Collection
     */
    public function getSelectedEvent($id) 
    {
       return Event::findOrFail($id)->checkBelongsToTheUserOrFail();
    }

}
