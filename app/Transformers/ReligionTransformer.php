<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Religion;

class ReligionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Religion $religion)
    {
        return [
            'id'  => $religion->id,
            'name' => $religion->name,
            'slug' => $religion->slug
        ];
    }
}
