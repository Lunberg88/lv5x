<?php

namespace App\Services;

use App\Openings;
use App\User;
use App\Candidate;
use App\Messages;
use App\CoreSettings;
use App\CandidateToOpening;

class BaseService
{
    /**
     * @var array
     */
    protected $currencies = [
        1 => '&dollar;',
        2 => '&euro;',
        3 => '&#8381;',
        4 => '&#8372;'
    ];

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Candidate
     */
    protected $candidate;

    /**
     * @var Messages
     */
    protected $message;

    /**
     * @var Openings
     */
    protected $opening;

    /**
     * @var CoreSettings
     */
    protected $coreSettings;

    /**
     * @var CandidateToOpening
     */
    protected $candidateToOpening;

    /**
     * BaseService constructor.
     * @param Candidate $candidate
     * @param Messages $messages
     * @param CoreSettings $coreSettings
     * @param CandidateToOpening $candidateToOpening
     * @param User $user
     * @param Openings $openings
     */
    public function __construct(Candidate $candidate, Messages $messages, CoreSettings $coreSettings, CandidateToOpening $candidateToOpening, User $user, Openings $openings)
    {
        $this->candidate = $candidate;
        $this->message = $messages;
        $this->coreSettings = $coreSettings;
        $this->user = $user;
        $this->candidateToOpening = $candidateToOpening;
        $this->opening = $openings;
    }
}