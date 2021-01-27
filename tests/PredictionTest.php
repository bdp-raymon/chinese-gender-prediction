<?php

namespace BdpRaymon\ChineseGenderPrediction\Tests;

use BdpRaymon\ChineseGenderPrediction\ChineseGenderPrediction;
use PHPUnit\Framework\TestCase;
use RangeException;

class PredictionTest extends TestCase
{
    /** @test */
    public function test_prediction_work_correctly()
    {
        $prediction = new ChineseGenderPrediction();

        $prediction->motherAge(18);

        $this->assertIsGirl($prediction->pregnancyMonth(0)->predict());
        $this->assertIsBoy($prediction->pregnancyMonth(3)->predict());
        $this->assertIsBoy($prediction->pregnancyMonth(5)->predict());
        $this->assertIsBoy($prediction->pregnancyMonth(10)->predict());

        $prediction->motherAge(20);

        $this->assertIsBoy($prediction->pregnancyMonth(1)->predict());
        $this->assertIsBoy($prediction->pregnancyMonth(5)->predict());
        $this->assertIsGirl($prediction->pregnancyMonth(9)->predict());
        $this->assertIsBoy($prediction->pregnancyMonth(11)->predict());
    }

    public function test_mother_age_and_pregnancy_month_is_required()
    {
        $prediction = new ChineseGenderPrediction([
            'mother_age' => 20
        ]);

        $this->expectException(\Exception::class);

        $prediction->predict();

        $prediction = new ChineseGenderPrediction([
            'pregnancy_month' => 5
        ]);

        $this->expectException(\Exception::class);

        $prediction->predict();
    }

    public function test_out_of_range_pregnancy_month()
    {
        $prediction = new ChineseGenderPrediction();

        $this->expectException(RangeException::class);

        $prediction->pregnancyMonth(-1);
    }

    protected function assertIsBoy(string $sex)
    {
        $this->assertEquals('boy', $sex);
    }

    protected function assertIsGirl(string $sex)
    {
        $this->assertEquals('girl', $sex);
    }
}
