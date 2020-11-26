<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCommentRequest
 *
 * @package App\Http\Requests
 */
class StoreCommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['required', 'integer'],
            'comment' => ['required', 'string'],
        ];
    }
}
