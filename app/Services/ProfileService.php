<?php

namespace App\Services;

use App\Candidate;
use App\CandidateToOpening;
use App\CoreSettings;
use App\Http\Requests\UserProfileRequest;
use App\Messages;
use App\User;
use App\Openings;

class ProfileService extends BaseService
{
    /**
     * ProfileService constructor.
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
     * @param UserProfileRequest $userProfileRequest
     * @param $user_id
     * @return bool
     */
    public function updateUserProfile(UserProfileRequest $userProfileRequest, $user_id)
    {
        if($userProfileRequest->validated()) {
            $user = $this->user->find((int)$user_id);

            $candidate = $this->candidate->getByEmail($user->email);

            $user->update(['name' => $userProfileRequest->name, 'email' => $userProfileRequest->email]);
            $candidate === null ?: $candidate->update(['email' => $user->email]);

            if($userProfileRequest->subscribe !== null && $userProfileRequest->subscribe != '') {
                $candidate === null ?: $candidate->update(['subscribe' => $userProfileRequest->subscribe]);
            }

            if(($userProfileRequest->password !== null && $userProfileRequest->password != '') && ($userProfileRequest->new_password !== null && $userProfileRequest->new_password != '')) {
                $user->update(['password' => bcrypt(trim($userProfileRequest->new_password))]);
            }

            return true;
        }
        return false;
    }
}