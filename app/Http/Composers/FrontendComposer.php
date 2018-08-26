<?php

namespace App\Http\Composers;

use App\Services\FrontendService;
use Illuminate\Contracts\View\View;

class FrontendComposer
{
    /**
     * @var FrontendService
     */
    protected $frontendService;

    /**
     * FrontendComposer constructor.
     * @param FrontendService $frontendService
     */
    public function __construct(FrontendService $frontendService)
    {
        $this->frontendService = $frontendService;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with(['frontendService' => $this->frontendService]);
    }
}