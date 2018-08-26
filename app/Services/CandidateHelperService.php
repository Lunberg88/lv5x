<?php

namespace App\Services;

use App\Openings;
use App\User;
use Exception;
use App\Candidate;
use App\Messages;
use App\CoreSettings;
use App\CandidateToOpening;

class CandidateHelperService extends BaseService
{
    /**
     * CandidateHelperService constructor.
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
     * @param $value
     * @param $type
     * @return Exception|mixed
     */
    public function convertTypes($value, $type)
    {
        $all_stacks = $this->getMainStacksValue();
        $stacks = explode(', ', $all_stacks);
        if($type === 'stack') {
            if(array_key_exists($value, $stacks)) {
                return $stacks[$value];
            }
            return new Exception('Stack value doesn\'t set in db');
        }

        if($type === 'currency') {
            if(array_key_exists($value, $this->currencies)) {
                return $this->currencies[$value];
            }
            return new Exception('Passed currency type doesn\'t found');
        }
        return new Exception('Type or value doesn\'t passed');
    }

    /**
     * @return array
     */
    public function showRegisterStack()
    {
        $all_stacks = $this->getMainStacksValue();
        $stacks = explode(', ', $all_stacks);
        return $stacks;
    }

    /**
     * @param null $type
     * @return int|string
     */
    public function showNewNotif($type = null)
    {
        if($type == 'msg') {
            $newMsg = $this->message->getUnviewedMessages();
            $newMsg == $newMsg->isEmpty() ? false : count($newMsg);
            return count($newMsg);

        } elseif($type == 'candidates') {
            $newCandidates = $this->candidate->getUnviewedCandidates();
            $newCandidates == $newCandidates->isEmpty() ? false : count($newCandidates);
            return count($newCandidates);

        }
        return 'none';
    }

    /**
     * @param null $id
     * @param null $type
     * @return array|bool|mixed
     */
    public function showAppliedOpenings($id = null, $type = null)
    {
        if($type === null) {
            if($id !== null) {
                return $this->getAppliedOpenings($id);
            }
        } elseif($type == 1) {
            $applieds = [];
            $allCandidates = $this->getAppliedOpenings($id);
            foreach($allCandidates as $users) {
                $user = $this->user->find($users->user_id);
                array_push($applieds, $user);
            }
            return $applieds;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getMainStacksValue()
    {
        return $this->coreSettings->getCoreSettingsMainStacksByField();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAppliedOpenings($id)
    {
        return $this->candidateToOpening->getAllAppliedOpeningById($id);
    }

    /**
     * @return array
     */
    public function getCurrency()
    {
        return $this->currencies;
    }
}