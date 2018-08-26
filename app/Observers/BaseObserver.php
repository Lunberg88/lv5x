<?php

namespace App\Observers;

use App\History;

class BaseObserver
{
    /**
     * @var History
     */
    protected $history;

    /**
     * BaseObserver constructor.
     * @param History $history
     */
    public function __construct(History $history)
    {
        $this->history = $history;
    }
}