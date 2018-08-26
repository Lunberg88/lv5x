<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\CandidateToOpening;
use App\CoreSettings;
use App\History;
use App\Messages;
use App\Openings;
use App\Services\AdminService;
use App\Services\CandidateHelperService;
use App\Services\CandidateService;
use App\Services\CandidateToOpeningService;
use App\Services\FrontendService;
use App\Services\OpeningService;
use App\Services\ProfileService;
use App\User;

class BaseController extends Controller
{
    /**
     * @var
     */
    protected $adminService;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Candidate
     */
    protected $candidate;

    /**
     * @var Openings
     */
    protected $opening;

    /**
     * @var Messages
     */
    protected $message;

    /**
     * @var ProfileService
     */
    protected $profileService;

    /**
     * @var CandidateToOpening
     */
    protected $candidateToOpening;

    /**
     * @var CoreSettings
     */
    protected $coreSettings;

    /**
     * @var History
     */
    protected $history;

    /**
     * @var CandidateService
     */
    protected $candidateService;

    /**
     * @var CandidateHelperService
     */
    protected $candidateHelperService;

    /**
     * @var OpeningService
     */
    protected $openingService;

    /**
     * @var CandidateToOpeningService
     */
    protected $candidateToOpeningService;

    /**
     * BaseController constructor.
     * @param User $user
     * @param Candidate $candidate
     * @param Openings $openings
     * @param Messages $messages
     * @param ProfileService $profileService
     * @param CandidateToOpening $candidateToOpening
     * @param CoreSettings $coreSettings
     * @param History $history
     * @param CandidateService $candidateService
     * @param CandidateHelperService $candidateHelperService
     * @param OpeningService $openingService
     * @param CandidateToOpeningService $candidateToOpeningService
     * @param AdminService $adminService
     */
    public function __construct(User $user, Candidate $candidate, Openings $openings, Messages $messages, ProfileService $profileService, CandidateToOpening $candidateToOpening, CoreSettings $coreSettings, History $history, CandidateService $candidateService, CandidateHelperService $candidateHelperService, OpeningService $openingService, CandidateToOpeningService $candidateToOpeningService, AdminService $adminService)
    {
        $this->user = $user;
        $this->candidate = $candidate;
        $this->opening = $openings;
        $this->message = $messages;
        $this->profileService = $profileService;
        $this->candidateToOpening = $candidateToOpening;
        $this->coreSettings = $coreSettings;
        $this->history = $history;
        $this->candidateService = $candidateService;
        $this->candidateHelperService = $candidateHelperService;
        $this->openingService = $openingService;
        $this->candidateToOpeningService = $candidateToOpeningService;
        $this->adminService = $adminService;
    }
}
