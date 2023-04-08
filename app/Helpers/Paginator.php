<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginator
{
    public static function set($items, $length = 10, $path = null)
    {
        if ($items instanceof Collection) {
            $items = $items->all();
        }

        $page = request()->get('page') ?: 1;

        $offset = ($page - 1) * $length;

        $paginator = new LengthAwarePaginator(array_slice($items, $offset, $length), count($items), $length);

        if ($path) {
            $paginator->setPath($path);
        } else {
            $paginator->setPath(request()->path());
        }

        return $paginator;
    }
}
