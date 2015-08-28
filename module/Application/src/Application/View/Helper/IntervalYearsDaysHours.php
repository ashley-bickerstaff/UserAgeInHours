<?php
/**
 * This is a view helper that will take two \DateTime objects and return the difference between them in years,
 * days and hours.
 *
 * @category   Application
 * @package    Application\View\Helper
 * @class      IntervalYearsDaysHours
 * @copyright  Copyright (c) 2015
 * @author     Ashley Bickerstaff
 */

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class IntervalYearsDaysHours extends AbstractHelper
{

    /**
     * Calculate the years, days and hours between two supplied dates.
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @return string
     */
    public function __invoke(\DateTime $startDate, \DateTime $endDate)
    {

        /**
         * Check to ensure that valid dates are entered.
         */
        if ($endDate <= $startDate) {
            throw new \InvalidArgumentException("Please ensure that the end date is less than the start date.");
        }

        /**
         * Start by calculating the complete different between the two dates.
         */
        $interval = $startDate->diff($endDate);

        /**
         * Extract the number of years only and create a new DateInterval based on this.
         */
        $numberOfYears = $interval->y;
        $yearInterval = new \DateInterval('P' . $interval->y . 'Y');

        /**
         * Using the original start date, add the new, whole-year interval.
         * We're not using DateTimeImmutable so the original object will be updated.
         */
        $startDate->add($yearInterval);

        /**
         * Now we diff the modified start date with the end date again. This will give
         * a timestamp of < 1 year.
         */
        $subYearInterval = $startDate->diff($endDate);

        /**
         * Output the number of years, followed by the number of days in the foreshortened
         * interval and finally, the number of hours.
         *
         * This could be improved using localisation and pluralisation.
         */
        return $subYearInterval->format($numberOfYears . ' years, %a day(s) and %h hour(s)');
    }
}