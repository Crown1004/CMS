<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Slug //  For Generating Arabic Slugs
{


    public static function uniqueSlug($slug, $table) // to make the slug unique
    {
        $slug = self::createSlug($slug);

        $items = DB::table($table)->select('slug')->whereRaw("slug like '$slug%'")->get();

        $count = count($items) + 1; // add 1 to make it unique

        return $slug . '-' . $count;
    }


    protected static function createSlug($str) // take the title replace spaces with -
    {
        $string = preg_replace("/[^a-z0-9_\s\-۰۱۲۳۴۵۶۷۸۹يءاأإآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهی]/u", '', $str);

        $string = preg_replace("/[\s\-_]+/", ' ', $string);

        $string = preg_replace("/[\s_]/", '-', $string);

        return $string;
    }
}
