<?php

namespace Gordesch;

use Carbon\Carbon;
use Carbon\Translator;

class CineCarbon extends Carbon
{
    use CineDate;

    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);
        $locale_cinema = Carbon::getLocale() . '_cinema';
        $translator = Translator::get($locale_cinema);
        $translator->setTranslations(['first_day_of_week' => CARBON::WEDNESDAY]);
        //$this->setTranslator($translator);
        $this->locale($locale_cinema);
    }
}
