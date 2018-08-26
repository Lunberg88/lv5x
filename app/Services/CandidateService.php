<?php

namespace App\Services;

use App\CandidateToOpening;
use App\CoreSettings;
use App\Messages;
use App\Openings;
use App\User;
use Illuminate\Support\Facades\Storage;
use Auth;
use Event;
use App\Candidate;
use App\Http\Requests\CandidateRequest;

class CandidateService extends BaseService
{
    /**
     * CandidateService constructor.
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
     * @param CandidateRequest $candidateRequest
     * @return bool
     */
    public function createNewCandidate(CandidateRequest $candidateRequest)
    {
        if($candidateRequest->validated()) {
            $newCandidate = $this->candidate->create($candidateRequest->except('token', 'add'));
            $newCandidate->update(['user_id' => Auth::id(), 'status' => 2, 'viewed' => 1]);
            $fileName = str_replace('.', '-', str_replace('@', '_', $candidateRequest->email));
            if($candidateRequest->hasFile('upload_cvs') && $candidateRequest->file('upload_cvs') !== null) {
                $newCandidate->update(['upload_cvs' => $candidateRequest->file('upload_cvs')->storeAs('public', 'candidate-'.$fileName.'.'.$candidateRequest->file('upload_cvs')->getClientOriginalExtension())]);
            }
            Event::fire('onAddCandidate', [Auth::user(), $this->candidate]);
            return true;
        }
        return false;
    }

    /**
     * @param CandidateRequest $candidateRequest
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCandidateInfo(CandidateRequest $candidateRequest, $id)
    {
        if($candidateRequest->validated()) {
            $updateCandidate = $this->candidate::find((int)$id);
            $updateCandidate->update($candidateRequest->except('token', 'add'));
            $updateCandidate->update(['user_id' => Auth::id()]);
            $updateCandidate->viewed != 1 ? $updateCandidate->update(['viewed' => 1]) : false;

            $fileName = str_replace('.', '-', str_replace('@', '_', $candidateRequest->email));
            if($candidateRequest->hasFile('edit_upload_cvs') && $candidateRequest->file('edit_upload_cvs') != '') {
                $old_cvs = $updateCandidate->upload_cvs;
                if($new_cvs = $candidateRequest->file('edit_upload_cvs')->storeAs('public', 'candidate-'.$fileName.'.'.$candidateRequest->file('edit_upload_cvs')->getClientOriginalExtension())) {
                    $updateCandidate->update(['upload_cvs' => $new_cvs]);
                    Storage::delete($old_cvs);
                }
            }
            return $updateCandidate;
        }
    }

    /**
     * @param CandidateRequest $candidateRequest
     * @param $id
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function removeAttachedCvs(CandidateRequest $candidateRequest, $id)
    {
        $updateCandidate = $this->candidate::find((int)$id);

        if($candidateRequest->delete_cvs == "true") {
            Storage::delete($updateCandidate->upload_cvs);
            $updateCandidate->update(['upload_cvs' => null]);
            //return redirect('admin/candidates/edit/'.$updateCandidate->id)->with(['message' => 'Candidate CV successfully deleted!']);
        }
        return false;
    }
}