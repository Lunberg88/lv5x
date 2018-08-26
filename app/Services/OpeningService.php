<?php

namespace App\Services;

use App\Candidate;
use App\CandidateToOpening;
use App\CoreSettings;
use App\Messages;
use App\User;
use Event;
use Auth;
use App\Openings;
use Intervention\Image\Facades\Image;
use App\Http\Requests\OpeningRequest;

class OpeningService extends BaseService
{
    /**
     * OpeningService constructor.
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
     * @param OpeningRequest $openingRequest
     * @return bool
     */
    public function createNewOpening(OpeningRequest $openingRequest)
    {
        if($openingRequest->validated()) {
            $newOpening = $this->opening->create($openingRequest->except('_token', 'add'));
            if($openingRequest->file('imgFile')) {
                $image = $openingRequest->file('imgFile');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('images/openings/'.$filename);
                Image::make($image->getRealPath())->save($path);
                $newOpening->update(['img' => $filename]);
            }
            $newOpening->update(['slug' => str_slug($openingRequest->title, '-'), 'user_id' => Auth::id()]);
            Event::fire('onAddCandidate', [Auth::user(), $newOpening]);
            return $newOpening;
        }
        return false;
    }

    /**
     * @param OpeningRequest $openingRequest
     * @param $id
     * @return bool
     */
    public function updateOpening(OpeningRequest $openingRequest, $id)
    {
        $updateOpening = $this->opening->find((int)$id);
        if($openingRequest->validated()) {
            $updateOpening->update($openingRequest->except('_token', 'add'));
            if($openingRequest->file('editImgFile') && $openingRequest->file('editImgFile') != '') {
                $image = $openingRequest->file('editImgFile');
                $filename = time().'-'.$updateOpening->id.'.'.$image->getClientOriginalExtension();
                $path = public_path('images/openings/'.$filename);
                Image::make($image->getRealPath())->save($path);
                $updateOpening->update(['img' => $filename]);
            }
            return $updateOpening;
        }
        return false;
    }
}