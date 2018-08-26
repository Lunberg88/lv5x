<?php

namespace App\Observers;

use Auth;
use App\Candidate;
use App\History;

class CandidateObserver extends BaseObserver
{
    /**
     * CandidateObserver constructor.
     * @param History $history
     */
    public function __construct(History $history)
    {
        parent::__construct($history);
    }

    /**
     * Fired Model Event on Creating
     * @param Candidate $candidate
     */
    public function created(Candidate $candidate)
    {
        $this->history->create([
            'name' => 'Added new candidate',
            'actions' => 'Candidate <a href="'.route('admin.candidates.show.id', $candidate->id).'">'.$candidate->fio.'</a> id: '.$candidate->id.'</a> created',
            'type' => 1
        ]);
    }

    /**
     * Fire Model Event on Updating
     * @param Candidate $candidate
     */
    public function updated(Candidate $candidate)
    {
        $this->history->create([
           'name' => 'Editing candidate info',
           'actions' => 'Editing candidate - #'.$candidate->id.' by user: '.Auth::user()->name.'. The candidate fio is: <a href="'.route('admin.candidates.show.id', $candidate->id).'">'.$candidate->fio.'</a>, id is: '.$candidate->id,
           'type' => 2
        ]);
    }

    /**
     * Fire Model Event on Deleting
     * @param Candidate $candidate
     */
    public function deleted(Candidate $candidate)
    {
        $this->history->create([
            'name' => 'The candidate deleted',
            'actions' => 'The candidate with id #'.$candidate->id.' ('.$candidate->fio.') was deleted by: '.Auth::user()->name,
            'type' => 3
        ]);
    }
}