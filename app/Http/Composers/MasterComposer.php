<?php

namespace App\Http\Composers;

use App\User;
use App\Services\AdminService;
use Illuminate\Contracts\View\View;

class MasterComposer
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var AdminService
     */
    protected $adminService;

    /**
     * MasterComposer constructor.
     * @param User $user
     * @param AdminService $adminService
     */
    public function __construct(User $user, AdminService $adminService)
    {
        $this->user = $user;
        $this->adminService = $adminService;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with(['user' => $this->user, 'adminService' => $this->adminService]);
    }
}