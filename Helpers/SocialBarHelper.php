<?php

namespace Chaplean\Bundle\SocialButtonsBundle\Helpers;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class SocialBarHelper.
 *
 * @package   Chaplean\Bundle\SocialButtonsBundle\Helpers
 * @author    Valentin - Chaplean <valentin@chaplean.coop>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class SocialBarHelper extends Helper
{
    protected $templating;

    /**
     * @param \Symfony\Component\Templating\EngineInterface $templating Templating.
     */
    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @param mixed $parameters Parameters.
     *
     * @return string
     */
    public function socialButtons($parameters)
    {
        return $this->templating->render('ChapleanSocialButtonsBundle:SocialButtons:social-buttons.html.twig', $parameters);
    }

    /**
     * @param mixed $network    Network.
     * @param mixed $parameters Parameters.
     *
     * @return string
     */
    private function socialButton($network, $parameters)
    {
        return $this->templating->render('ChapleanSocialButtonsBundle:SocialButtons:' . $network . '-button.html.twig', $parameters);
    }

    /**
     * @param mixed $parameters Parameters.
     *
     * @return string
     */
    public function facebookButton($parameters)
    {
        return $this->socialButton('facebook', $parameters);
    }

    /**
     * @param mixed $parameters Parameters.
     *
     * @return string
     */
    public function twitterButton($parameters)
    {
        return $this->socialButton('twitter', $parameters);
    }

    /**
     * @param mixed $parameters Parameters.
     *
     * @return string
     */
    public function googlePlusButton($parameters)
    {
        return $this->socialButton('googleplus', $parameters);
    }

    /**
     * @param mixed $parameters Parameters.
     *
     * @return string
     */
    public function linkedInButton($parameters)
    {
        return $this->socialButton('linkedin', $parameters);
    }

    /**
     * @param mixed $parameters Parameters.
     *
     * @return string
     */
    public function pinterestButton($parameters)
    {
        return $this->socialButton('pinterest', $parameters);
    }

    /**
     * @param mixed $parameters Parameters.
     *
     * @return string
     */
    public function viadeoButton($parameters)
    {
        return $this->templating->render('ChapleanSocialButtonsBundle:SocialButtons:viadeo-button.html.twig', $parameters);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chaplean_social_buttons_helper';
    }
}
