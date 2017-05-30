<?php

namespace App\Listeners;

use App\Events\ForgetCacheEvent;
use App\Service\Cache\CacheService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgetCacheListener
{

    /**
     * Create the event listener.
     * ForgetCacheListener constructor.
     * @param CacheService $cacheService
     * @param array $add
     */
    public function __construct(CacheService $cacheService)
    {
        $this->cacheService = $cacheService;
    }

    /**
     * Handle the event.
     *
     * @param  ForgetCacheEvent  $event
     * @return void
     */
    public function handle(ForgetCacheEvent $event)
    {
        $this->cacheService->forget($event->model, $event->relation);
    }
}
