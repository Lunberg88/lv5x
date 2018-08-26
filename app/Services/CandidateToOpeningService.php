<?php

namespace App\Services;

use App\Candidate;
use App\CoreSettings;
use App\Messages;
use App\Notifications\CandidateAppliedToOpening;
use App\User;
use App\Openings;
use Illuminate\Http\Request;
use App\CandidateToOpening;

class CandidateToOpeningService extends BaseService
{
    /**
     * CandidateToOpeningService constructor.
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
     * @param $user_id
     * @param $name
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ApplyUserToOpening($user_id, $name, Request $request)
    {
        if((int)$request->id && (int)$request->id != '') {
            if(($this->candidateToOpening->getUserOpening((int)$user_id, $request->id))->isEmpty()) {
                $this->candidateToOpening->create(['user_id' => (int)$user_id, 'opening_id' => (int)$request->id]);
                $this->user->findOrFail(1)->notify(new CandidateAppliedToOpening($user_id, $name, ($this->opening->findOrFail($request->id))->title, $request->id));
                return response()->json(['success' => 'You successfully applied!']);
            }
            return response()->json(['error' => 'You are already applied to this Opening!'], 201);
        }
        return response()->json(['error' => 'Opening or OpeningID not found!'], 404);
    }
}