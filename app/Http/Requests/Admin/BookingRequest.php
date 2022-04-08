<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'arena_id' => 'required|numeric',
                    'time_from' => 'required|unique:bookings|date_format:Y-m-d H:i',
                    'time_to' => 'required|unique:bookings|date_format:Y-m-d H:i',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'arena_id' => ['required','numeric'],
                    'time_from' => ['required','unique:bookings,time_from, ' . $this->route()->booking->id, 'date_format:Y-m-d H:i'],
                    'time_to' => ['required','unique:bookings,time_to, ' . $this->route()->booking->id, 'date_format:Y-m-d H:i'],
                ];
            }
            default: break;
        }
    }
}
