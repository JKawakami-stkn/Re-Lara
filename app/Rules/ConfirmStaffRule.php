<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ConfirmStaffRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $staff = \App\models\M_wf_staff::find($value);
        return (!empty($staff));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '指定された職員が見つかりません';
    }
}
