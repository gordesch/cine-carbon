<?php

namespace Gordesch;

use Carbon\Carbon;
use Carbon\Translator;

class CineCarbon extends Carbon
{
    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);
        $locale_cinema = Carbon::getLocale() . '_cinema';
        $translator = Translator::get($locale_cinema);
        $translator->setTranslations(['first_day_of_week' => CARBON::WEDNESDAY]);
        //$this->setTranslator($translator);
        $this->locale($locale_cinema);
    }

    public static function createFromProgrammingWeek(string $programming_week): CineCarbon
    {
        $datetime = new static();
        list($year, $week) = explode('-', $programming_week);
        $datetime->setIsoDate($year, $week, self::WEDNESDAY)->setTime(0, 0);
        return $datetime;
    }

    public function programmingWeek(): string {
        while ($this->toMutable()->dayOfWeek !== CARBON::WEDNESDAY) {
            $this->subDay();
        }
        return $this->isoFormat('GGGG-WW');
    }
}
