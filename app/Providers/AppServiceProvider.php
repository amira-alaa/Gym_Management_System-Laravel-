<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\IService\IMemberService;
use App\Services\IService\IMembershipService;
use App\Repositories\IRepository\IMemberRepository;
use App\Repositories\IRepository\IMembersessionRepository;
use App\Repositories\IRepository\IMembershipRepository;
use App\Repositories\IRepository\IPlanRepository;
use App\Repositories\IRepository\ISessionRepository;
use App\Services\Service\MemberService;
use App\Services\Service\MembershipService;
use App\Repositories\Repository\MemberRepository;
use App\Repositories\Repository\PlanRepository;
use App\Services\IService\IPlanService;
use App\Services\Service\PlanService;
use App\Repositories\Repository\MembershipRepository;
use App\Repositories\Repository\SessionRepository;
use App\Services\IService\ISessionService;
use App\Services\Service\SessionService;
use App\Repositories\IRepository\ITrainerRepository;
use App\Repositories\Repository\MembersessionRepository;
use App\Services\IService\ITrainerService;
use App\Repositories\Repository\TrainerRepository;
use App\Services\IService\IHomeService;
use App\Services\IService\IMembersessionService;
use App\Services\Service\HomeService;
use App\Services\Service\MembersessionService;
use App\Services\Service\TrainerService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IHomeService::class , HomeService::class);
        $this->app->bind(IMemberRepository::class , MemberRepository ::class);
        $this->app->bind(IMemberService::class , MemberService::class);
        $this->app->bind(IPlanRepository::class , PlanRepository ::class);
        $this->app->bind(IPlanService::class , PlanService::class);
        $this->app->bind(IMembershipRepository::class , MembershipRepository::class);
        $this->app->bind(IMembershipService::class , MembershipService::class);
        $this->app->bind(ISessionRepository::class , SessionRepository::class);
        $this->app->bind(ISessionService::class , SessionService::class);
        $this->app->bind(ITrainerRepository::class , TrainerRepository::class);
        $this->app->bind(ITrainerService::class , TrainerService::class);
        $this->app->bind(IMembersessionRepository::class , MembersessionRepository::class);
        $this->app->bind(IMembersessionService::class , MembersessionService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
