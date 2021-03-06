<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'publish_date' => 'required',
            'publish_time' => 'required',
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
        $published_at = new Carbon(
            $this->publish_date.' '.$this->publish_time
        );
        return [
            'category_id' => $this->category_id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content' => $this->get('content'),
            'meta_description' => $this->meta_description,
            'is_draft' => (bool)$this->is_draft,
            'is_original' => (bool)$this->is_original,
            'published_at' => $published_at,
        ];
    }
}
