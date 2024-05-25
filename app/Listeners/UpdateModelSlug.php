<?php

namespace App\Listeners;

use Illuminate\Support\Str;
use App\Events\SlugUpdateAfterName;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateModelSlug
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SlugUpdateAfterName $event): void
    {

        $model = $event->model;

        if (!$model)
            return;

        $model->slug = Str::slug($model->name, '-');
        $model->save();
    }
}
