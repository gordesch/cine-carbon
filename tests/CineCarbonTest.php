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
}
