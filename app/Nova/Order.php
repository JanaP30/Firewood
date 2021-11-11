<?php

namespace App\Nova;

use App\Nova\Actions\CreateOrder;
use App\Nova\Actions\SendEmail;
use App\Nova\Filters\CreatedAtFromDate;
use App\Nova\Filters\CreatedAtToDate;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\NovaRequest;
use Titasgailius\SearchRelations\SearchesRelations;

class Order extends Resource
{
    use SearchesRelations;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Order::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'email', 'first_name', 'last_name'
    ];

    public static $searchRelations = [
        'product' => ['name'],
        'productType' => ['name']
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable()
            ->exceptOnForms(),

            Text::make('First Name')->sortable()->readOnly(),
           
        
            Text::make('Last Name')->readOnly()
            ->sortable(),

            Text::make('Address')->readOnly()
            ->sortable(),
            
            Text::make('Phone number')->readOnly()
            ->sortable()->hideFromIndex(),
            
            Text::make('Email')
            ->sortable(),
           
            Text::make('Quantity')
            ->sortable(),
           
        
            
            Textarea::make('Note')
            ->sortable()->hideFromIndex(),
           
            BelongsTo::make('Product')->exceptOnForms(),

            BelongsTo::make('Product Type', 'productType', ProductType::class)->exceptOnForms(),

            DateTime::make('Created At')->exceptOnForms()


        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new CreatedAtFromDate,
            new CreatedAtToDate
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new CreateOrder,
            new SendEmail

        ];
    }
    

}
