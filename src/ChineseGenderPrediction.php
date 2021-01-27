<?php

namespace BdpRaymon\ChineseGenderPrediction;

use Exception;

class ChineseGenderPrediction
{
    protected ?int $motherAge = null;

    protected ?int $pregnancyMonth = null;

    public function __construct(array $config = [])
    {
        if (isset($config['mother_age'])) {
            $this->motherAge($config['mother_age']);
        }

        if (isset($config['pregnancy_month'])) {
            $this->pregnancyMonth($config['pregnancy_month']);
        }
    }

    public function motherAge(int $motherAge): self
    {
        $this->motherAge = min(max($motherAge, 18), 45);
        return $this;
    }

    public function pregnancyMonth(int $pregnancyMonth): self
    {
        if ($pregnancyMonth < 0 || $pregnancyMonth > 11) {
            throw new \RangeException('Pregnancy Month should be greater or equal 0 or less than 12');
        }
        $this->pregnancyMonth = $pregnancyMonth;
        return $this;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function predict(): string
    {
        $this->checkRequirements();

        $predictions = include 'calendar.php';

        return strtolower($predictions[$this->motherAge][$this->pregnancyMonth]);
    }

    /**
     * @throws Exception
     */
    protected function checkRequirements()
    {
        if (is_null($this->motherAge)) {
            throw new Exception('Mother age is required for prediction');
        }

        if (is_null($this->pregnancyMonth)) {
            throw new Exception('Pregnancy Month is required for prediction');
        }
    }
}
