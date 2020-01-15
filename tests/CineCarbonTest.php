<?php

use PHPUnit\Framework\TestCase;
use Carbon\Carbon;
use Gordesch\CineCarbon;

final class CineCarbonTest extends TestCase
{
    public function testFirstDayOfWeekIsWednesday(): void
    {
        $this->assertEquals(
            CineCarbon::now()->startOfWeek()->dayOfWeek,
            Carbon::WEDNESDAY
        );
    }

    public function testProgrammingWeekIsDifferentFromCalendarWeek(): void
    {
        $monday = CineCarbon::parse('next monday');
        $this->assertNotEquals(
            $monday->isoFormat('GGGG-WW'),
            $monday->programmingWeek()
        );
    }

    public function testCreatedProgrammingWeekStartsOnWednesday(): void
    {
        $week = CineCarbon::createFromProgrammingWeek(CineCarbon::now()->programmingWeek());
        $week_start = $week->startOfWeek();
        $this->assertEquals(
            $week_start->dayOfWeekIso,
            CARBON::WEDNESDAY
        );
    }

    public function testCreatedProgrammingWeekEndsOnTuesday(): void
    {
        $week = CineCarbon::createFromProgrammingWeek(CineCarbon::now()->programmingWeek());
        $week_end = $week->endOfWeek();
        $this->assertEquals(
            $week_end->dayOfWeekIso,
            CARBON::TUESDAY
        );
    }

    public function testCreatedProgrammingWeekHasOnlyOneWeekNumber(): void
    {
        $week = CineCarbon::createFromProgrammingWeek(CineCarbon::now()->programmingWeek());
        $week_start = $week->startOfWeek();
        $week_end = $week->endOfWeek();
        $this->assertEquals(
            $week_start->programmingWeek(),
            $week_end->programmingWeek()
        );
    }
}
