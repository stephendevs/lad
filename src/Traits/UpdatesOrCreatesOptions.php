<?php

namespace Stephendevs\Lad\Traits;

use Illuminate\Http\Request;
use Stephendevs\Lad\Models\Option\Option;


trait UpdatesOrCreatesOptions
{

    /*
    |--------------------------------------------------------------------------
    | Update Or Create Options Trait
    |--------------------------------------------------------------------------
    | This trait is responsible for extending controller that handles creat and update of settings / option
    |
    */

    public function updateOrCreate(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        foreach ($this->options() as $key => $value) {
           ($request->has($key)) ? Option::updateOrCreate(
               ['option_key' => $key], [
                   'option_value' => ($request->hasFile($key)) ? 'storage/'.request()->$key->store('lad', 'public') : $request->$key,
                   'owner_id' => '0',
                   'owner_type' => 'system'
               ]
           ) : Option::updateOrCreate(['option_key' => $key], ['option_value' => $value[0], 'owner_id' => '0','owner_type' => 'system']);
        }
        return ($request->expectsJson()) ? response()->json([
            'success' => true, 'message' => 'Options updated successfully'
        ]) : back()->withInput()->with('updated', 'Options updated successfully');
    }


    protected function getOptions()
    {
        $options_keys = $options_values = [];
        $dboptions = Option::whereIn('option_key', array_keys($this->options()))->get(['option_key', 'option_value']);
        foreach ($dboptions as $key => $value) {
            array_push($options_keys, $value->option_key);
            array_push($options_values, $value->option_value);
        }
        return array_combine($options_keys, $options_values);
    }

    protected function options() : array 
    {
        return [
            //'option_key' => ['option_default_value', 'ignoreOnUpdate'],
        ];
    }


     /**
     * Get Options  validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [

        ];
    }

    /**
     * Get Options validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }

}