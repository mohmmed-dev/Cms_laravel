<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Slug {

    public static function uniqueSlug($slug,$table)  {
        $slug = self::createSlug($slug);
        $items = DB::table($table)->select('slug')->whereRaw("slug like '$slug%'")->get();
        $count = count($items) + 1;
        return $slug . '-' . $count;
    }
    public static function createSlug($str) {
        $string = str_replace(" ","-",$str);
        $string = str_replace("/","-",$string);
        return $string;
    }
}
