<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /*public $collects = PostResource::class;*/

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'organization' => 'BrayanCJR7',
                'authors' => [
                    'Brayan Jimenez'
                ]
            ],
            'types' => 'articles'
        ];
    }
}
