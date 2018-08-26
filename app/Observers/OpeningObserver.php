<?php

namespace App\Observers;

use Auth;
use App\History;
use App\Openings;

class OpeningObserver extends BaseObserver
{
    /**
     * OpeningObserver constructor.
     * @param History $history
     */
    public function __construct(History $history)
    {
        parent::__construct($history);
    }

    /**
     * Fire Model Event on Creating
     * @param Openings $openings
     */
    public function created(Openings $openings)
    {
        $this->history->create([
            'name' => 'Created new Opening',
            'actions' => 'Opening - '.$openings->title.' was created by: '.Auth::user()->name,
            'type' => 1
        ]);
    }

    /**
     * Fire Model Event on Updating
     * @param Openings $openings
     */
    public function updated(Openings $openings)
    {
        $this->history->create([
            'name' => 'Updating Opening',
            'actions' => 'Opening <b>'.$openings->title.'</b> was updated by: '.Auth::user()->name,
            'type' => 2
        ]);
    }

    /**
     * Fire Model Event on Deleting
     * @param Openings $openings
     */
    public function deleted(Openings $openings)
    {
        $this->history->create([
            'name' => 'The opening deleted',
            'actions' => 'The Opening with id <b>'.$openings->title.'</b> was deleted by: '.Auth::user()->name,
            'type' => 3
        ]);
    }
}