<?php

namespace App\Services;


use App\Candidate;
use App\CandidateToOpening;
use App\CoreSettings;
use App\Messages;
use App\Openings;
use App\User;

class AdminService extends BaseService
{
    /**
     * AdminService constructor.
     * @param Candidate $candidate
     * @param Messages $messages
     * @param CoreSettings $coreSettings
     * @param CandidateToOpening $candidateToOpening
     * @param User $user
     * @param Openings $openings
     */
    public function __construct(Candidate $candidate, Messages $messages, CoreSettings $coreSettings, CandidateToOpening $candidateToOpening, User $user, Openings $openings)
    {
        parent::__construct($candidate, $messages, $coreSettings, $candidateToOpening, $user, $openings);
    }

    /**
     * @return mixed
     */
    public function notifyNewCandidates()
    {
        return $this->candidate->getUnviewedCandidates();
    }

    /**
     * @return mixed
     */
    public function notifyNewMessages()
    {
        return $this->message->getUnviewedMessages();
    }
}