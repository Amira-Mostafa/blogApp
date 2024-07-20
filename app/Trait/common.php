<?php

namespace App\Trait;

trait common
{
    public function uploadfile($file, $path)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $file->move($path, $file_name);
        return $file_name;
    }

    public function messages()
    {
        return [
            'title.required' => 'title is required',
            'title.max' => 'title must be 50 character max',
            'content.required' => 'you must write the contents',
            'tag_id.required' => 'you must select a tag for your post',
            'thumbnail.required' => 'thumbnail is required',
            'thumbnail.mimes' => 'The thumbnail must be a file of type: png, jpg, jpep',
            'thumbnail.image' => 'The thumbnail must be an image',
            'thumbnail.max' => 'thumbnail must be less than 2M',
        ];
    }
}
