<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $guarded = [];

    public $timestamps = false;


	 /**
     * Throw 403 if the event doesnt belong to user
     *
     * @return void
     */
    public function checkBelongsToTheUserOrFail()
    {
    	if($this->user_id != auth()->user()->id) {
    		abort(403, 'Access denied');
    	}

    	return $this;
    }
}
