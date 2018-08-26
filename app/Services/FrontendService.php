<?php

namespace App\Services;

use Auth;
use App\Candidate;
use App\Openings;
use Carbon\Carbon;
use App\CoreSettings;

class FrontendService
{
    /**
     * @var CoreSettings
     */
    protected $coreSetting;

    /**
     * @var
     */
    protected $opening;

    /**
     * @var
     */
    protected $candidate;

    /**
     * FrontendService constructor.
     * @param CoreSettings $coreSettings
     * @param Openings $openings
     * @param Candidate $candidate
     */
    public function __construct(CoreSettings $coreSettings, Openings $openings, Candidate $candidate)
    {
        $this->coreSetting = $coreSettings;
        $this->opening = $openings;
        $this->candidate = $candidate;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getSettingsValueByKey($key)
    {
        return $this->coreSetting->getSettingByKey((string)$key);
    }

    /**
     * @param $timestamp
     * @return string
     */
    public function carbonParseTimestamp($timestamp)
    {
        return Carbon::parse($timestamp)->format('d/m/Y');
    }

    /**
     * @param $currentId
     * @param $limit
     * @return mixed
     */
    public function getRelatedOpenings($currentId, $limit)
    {
        return $this->opening->getRelatedOpeningsByParams($currentId, $limit);
    }

    /**
     * @return array|int|mixed
     */
    public function getUserProfile()
    {
        if($user_profile = $this->candidate->getByEmail(Auth::user()->email)) {
            return $user_profile;
        }
        return false;
    }
}