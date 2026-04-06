<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'destination' => ['nullable', 'string', 'max:100'],
            'check_in'    => ['nullable', 'date', 'after_or_equal:today'],
            'check_out'   => ['nullable', 'date', 'after:check_in'],
            'guests'      => ['nullable', 'integer', 'min:1', 'max:10'],
            'country'     => ['nullable', 'string', 'max:100'],
            'pool'        => ['nullable', 'boolean'],
            'spa'         => ['nullable', 'boolean'],
            'breakfast'   => ['nullable', 'boolean'],
            'stars'       => ['nullable', 'integer', 'between:1,5'],
            'max_price'   => ['nullable', 'integer', 'min:0'],
            'sort'        => ['nullable', 'string', 'in:rating,price_asc,price_desc,name'],
        ];
    }

    public function messages(): array
    {
        return [
            'check_in.after_or_equal' => 'Check-in date must be today or later.',
            'check_out.after'         => 'Check-out date must be after check-in.',
            'guests.min'              => 'At least 1 guest is required.',
            'guests.max'              => 'A maximum of 10 guests is supported.',
            'stars.between'           => 'Star rating must be between 1 and 5.',
        ];
    }

    /** Convenience: typed getter for the destination search term. */
    public function destination(): ?string
    {
        $value = $this->string('destination')->trim()->toString();
        return $value !== '' ? $value : null;
    }
}
