<?php

namespace Tests\Chaplean\Bundle\SocialButtonsBundle\Twig\Extensions;

use Chaplean\Bundle\SocialButtonsBundle\Twig\Extensions\ChapleanTwigSocialBar;
use Chaplean\Bundle\UnitBundle\Test\LogicalTest;

/**
 * Class ChapleanTwigSocialBarTest.
 *
 * @package   Chaplean\Bundle\SocialButtonsBundle\Twig\Extensions
 * @author    Valentin - Chaplean <valentin@chaplean.coop>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class ChapleanTwigSocialBarTest extends LogicalTest
{
    /**
     * @var ChapleanTwigSocialBar
     */
    private $twigSocialBar;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->twigSocialBar = $this->getContainer()->get('chaplean_social_buttons.social_bar_twig_extension');
    }

    /**
     * @return void
     */
    public function testGetName()
    {
        $this->assertEquals('chaplean_social_bar', $this->twigSocialBar->getName());
    }

    /**
     * @return void
     */
    public function testGetFunctions()
    {
        $functions = $this->twigSocialBar->getFunctions();
        $this->assertInternalType('array', $functions);
        $this->assertEquals(
            array(
                0,
                1,
                2,
                3,
                4,
                5,
                6,
            ),
            array_keys($functions)
        );
    }

    /**
     * @return void
     */
    public function testGetFacebookLikeWithDefaultConfig()
    {
        $template = $this->twigSocialBar->getFacebookLikeButton();

        $this->assertContains('btn-share-facebook', $template);
        $this->assertNotContains('http://test.com', $template);
    }

    /**
     * @return void
     */
    public function testGetFacebookLikeWithCustomConfig()
    {
        $template = $this->twigSocialBar->getFacebookLikeButton(array(
            'url' => 'http://test.com'
        ));

        $this->assertContains('btn-share-facebook', $template);
        $this->assertContains('http://test.com', $template);
    }

    /**
     * @return void
     */
    public function testGetTwitterWithDefaultConfig()
    {
        $template = $this->twigSocialBar->getTwitterButton();

        $this->assertContains('btn-share-twitter', $template);
        $this->assertNotContains('http://test.com', $template);
    }

    /**
     * @return void
     */
    public function testGetTwitterWithCustomConfig()
    {
        $template = $this->twigSocialBar->getTwitterButton(array(
            'url' => 'http://test.com'
        ));

        $this->assertContains('btn-share-twitter', $template);
        $this->assertContains('http://test.com', $template);
    }

    /**
     * @return void
     */
    public function testGetGooglePlusWithDefaultConfig()
    {
        $template = $this->twigSocialBar->getGoogleplusButton();

        $this->assertContains('btn-share-googleplus', $template);
        $this->assertNotContains('http://test.com', $template);
    }

    /**
     * @return void
     */
    public function testGetGooglePlusWithCustomConfig()
    {
        $template = $this->twigSocialBar->getGoogleplusButton(array(
            'url' => 'http://test.com'
        ));

        $this->assertContains('btn-share-googleplus', $template);
        $this->assertContains('http://test.com', $template);
    }

    /**
     * @return void
     */
    public function testGetLinkedInWithDefaultConfig()
    {
        $template = $this->twigSocialBar->getLinkedinButton();

        $this->assertContains('btn-share-linkedin', $template);
        $this->assertNotContains('http://test.com', $template);
    }

    /**
     * @return void
     */
    public function testGetLinkedInWithCustomConfig()
    {
        $template = $this->twigSocialBar->getLinkedinButton(array(
            'url' => 'http://test.com'
        ));

        $this->assertContains('btn-share-linkedin', $template);
        $this->assertContains('http://test.com', $template);
    }

    /**
     * @return void
     */
    public function testGetPinterestWithDefaultConfig()
    {
        $template = $this->twigSocialBar->getPinterestButton();

        $this->assertNotEmpty($template);
    }

    /**
     * @return void
     */
    public function testGetFacebookAndTwitterWithDefaultConfig()
    {
        $template = $this->twigSocialBar->getSocialButtons(array('facebook' => array(), 'twitter' => array()));

        $this->assertNotEmpty($template);
        $this->assertContains('btn-share-facebook', $template);
        $this->assertContains('btn-share-twitter', $template);
    }
}
