<?php

namespace App\Nova\Actions;

use App\Mail\AdminOrderEmail;
use App\Repositories\Orders\OrdersService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class SendEmail extends Action
{
    use InteractsWithQueue, Queueable;
    public $onlyOnDetail = true;
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
       
        $subject = $fields->subject;
        $content = $fields->content;
        foreach ($models as $model) {
            Mail::to($model->email)->send(new AdminOrderEmail($subject, $content));
        }
       
    

        return Action::message('It worked!'); 
    
    }
    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [

            Text::make('Subject', 'subject')->rules('required'),
            Textarea::make('Content', 'content')->rules('required'),

        ];
    }
}
