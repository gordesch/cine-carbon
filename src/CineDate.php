<?php


namespace Gordesch;


use Carbon\Carbon;
use Carbon\CarbonImmutable;

trait CineDate
{
    public static function createFromProgrammingWeek(string $programming_week)
    {
        $datetime = new static();
        list($year, $week) = explode('-', $programming_week);
        $datetime = $datetime->setIsoDate($year, $week, CARBON::WEDNESDAY)->setTime(0, 0);
        return $datetime;
    }

    public function programmingWeek(): string {
        $mutable = $this->toMutable();
        while ($mutable->dayOfWeek !== CARBON::WEDNESDAY) {
            $mutable->subDay();
        }
        return $mutable->isoFormat('GGGG-WW');
    }

    public function toMutable(): CineCarbon
    {
        /** @var CineCarbon $date */
        $date = $this->cast(CineCarbon::class);

        return $date;
    }

    /**
     * Return a immutable copy of the instance.
     *
     * @return CarbonImmutable
     */
    public function toImmutable(): CineCarbonImmutable
    {
        /** @var CineCarbonImmutable $date */
        $date = $this->cast(CineCarbonImmutable::class);

        return $date;
    }
}