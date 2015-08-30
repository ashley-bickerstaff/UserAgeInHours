<?php
/**
 * This is the test case for the IntervalYearsDaysHours view helper
 *
 * @category   ApplicationTest
 * @package    ApplicationTest\View\Helper
 * @class      IntervalYearsDaysHoursTest
 * @copyright  Copyright (c) 2015
 * @author     Ashley Bickerstaff
 */

namespace ApplicationTest\View\Helper;

use Application\View\Helper\IntervalYearsDaysHours;

class IntervalYearsDaysHoursTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var IntervalYearsDaysHours
     */
    protected $helper;

    public function setUp()
    {
        $this->helper = new IntervalYearsDaysHours();
    }

    /**
     * Basic instantiation tests.
     */
    public function testInstantiation()
    {
        $this->assertInstanceOf('Application\View\Helper\IntervalYearsDaysHours', $this->helper);
        $this->assertInstanceOf('Zend\View\Helper\AbstractHelper', $this->helper);
    }

    /**
     * Test against manually calculated scenarios.
     */
    public function testScenarios()
    {
        $this->assertEquals(
            '25 years, 47 day(s) and 0 hour(s)',
            $this->helper->__invoke(new \DateTime('1990-07-14 00:00:00'), new \DateTime('2015-08-30 00:00:00'))
        );

        $this->assertEquals(
            '54 years, 339 day(s) and 0 hour(s)',
            $this->helper->__invoke(new \DateTime('1960-09-23 00:00:00'), new \DateTime('2015-08-28 00:00:00'))
        );

        $this->assertEquals(
            '41 years, 86 day(s) and 0 hour(s)',
            $this->helper->__invoke(new \DateTime('1973-01-02 00:00:00'), new \DateTime('2014-03-29 00:00:00'))
        );
    }

    /**
     * Test that the correct exceptions are being thrown and the messaging is correct.
     */
    public function testExceptionHandling()
    {
        try {
            $this->helper->__invoke(new \DateTime('2015-08-30 00:00:00'), new \DateTime('1990-07-14 00:00:00'));
        } catch (\Exception $e) {
            $this->assertInstanceOf('InvalidArgumentException', $e);
            $this->assertEquals('Please ensure that the end date is less than the start date.', $e->getMessage());
        }
    }
}