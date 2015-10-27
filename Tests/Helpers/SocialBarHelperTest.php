<?php

namespace Chaplean\Bundle\SocialButtonsBundle\Tests\Helpers;

use Chaplean\Bundle\SocialButtonsBundle\Helpers\SocialBarHelper;
use Chaplean\Bundle\UnitBundle\Test\LogicalTest;

/**
 * Class SocialBarHelperTest.
 *
 * @package   Chaplean\Bundle\SocialButtonsBundle\Tests\Helpers
 * @author    Valentin - Chaplean <valentin@chaplean.com>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.com)
 * @since     1.0.0
 */
class SocialBarHelperTest extends LogicalTest
{
    /**
     * @var SocialBarHelper
     */
    private $socialBarHelper;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->socialBarHelper = $this->getContainer()->get('chaplean_social_buttons.social_bar_helper');
    }

    /**
     * @return void
     */
    public function testGetName()
    {
        $this->assertEquals('chaplean_social_buttons_helper', $this->socialBarHelper->getName());
    }
}