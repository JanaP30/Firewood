<?php

namespace App\Nova\Actions;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;

class CreateOrder extends Action
{
    public $standalone = true;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        

        Order::create([
            'first_name' => $fields->first_name,
            'last_name' => $fields->last_name,
            'address'  => $fields->address,
            'phone_number' => $fields->phone_number,
            'quantity' => $fields->quantity,
            'product_type_id' => $fields->product_type_id,
            'product_id' => $fields->product_id,
            'note' => $fields->note,
            'email' => $fields->email
        ]);
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
            Number::make('Quantity', 'quantity')->rules('required', 'gt:0'),
            Text::make('First Name', 'first_name')->rules('required'),
            Text::make('Last Name', 'last_name')->rules('required'),
            Text::make('Address', 'address')->rules('required'),
            Text::make('Phone number', 'phone_number')->rules('required'),
            Text::make('Email', 'email')->rules('required'),
            Textarea::make('Note', 'note')->rules('required'),
            Select::make('Product Type', 'product_type_id')->options(ProductType::pluck('name', 'id'))->displayUsingLabels()->rules('required'),
            Select::make('Product', 'product_id')->options(Product::pluck('name', 'id'))->displayUsingLabels()->rules('required')
            
               

        ];
    }
}
