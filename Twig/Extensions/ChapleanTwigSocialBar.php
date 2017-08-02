<?php

namespace Chaplean\Bundle\SocialButtonsBundle\Twig\Extensions;

use Chaplean\Bundle\SocialButtonsBundle\Helpers\SocialBarHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ChapleanTwigSocialBar
 *
 * @package   Chaplean\Bundle\SocialButtonsBundle\Twig\Extensions
 * @author    Valentin - Chaplean <valentin@chaplean.coop>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class ChapleanTwigSocialBar extends \Twig_Extension
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var array
     */
    private $config;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container Container.
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param array $config
     *
     * @return void
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chaplean_social_bar';
    }

    /**
     * @return array<string,\Twig_Function_Method>
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('socialButtons', array($this, 'getSocialButtons'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('facebookButton', array($this, 'getFacebookLikeButton'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('twitterButton', array($this, 'getTwitterButton'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('googlePlusButton', array($this, 'getGooglePlusButton'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('pinterestButton', array($this, 'getPinterestButton'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('viadeoButton', array($this, 'getViadeoButton'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('linkedInButton', array($this, 'getLinkedInButton'), array('is_safe' => array('html'))),
        );
    }

    /**
     * @param array|mixed $parameters Parameters.
     *
     * @return string
     */
    public function getSocialButtons($parameters = array())
    {
        $renderParameters = array();
        $networks = array('facebook', 'twitter', 'googleplus', 'linkedin', 'tumblr', 'pinterest', 'youtube', 'instagram');

        foreach ($networks as $network) {
            // no parameters were defined, keeps default values
            if (!array_key_exists($network, $parameters)) {
                $renderParameters[$network] = array();
                // parameters are defined, overrides default values
            } elseif (is_array($parameters[$network])) {
                $renderParameters[$network] = $parameters[$network];
                // the button is not displayed
            } else {
                $renderParameters[$network] = false;
            }
        }

        /** @var SocialBarHelper $serviceSocial */
        $serviceSocial = $this->container->get('chaplean_social_buttons.social_bar_helper');

        return $serviceSocial->socialButtons($renderParameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getFacebookLikeButton($parameters = array())
    {
        // default values, you can override the values by setting them
        return $this->getButton('facebook', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getTwitterButton($parameters = array())
    {
        return $this->getButton('twitter', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getGoogleplusButton($parameters = array())
    {
        return $this->getButton('googleplus', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getLinkedinButton($parameters = array())
    {
        return $this->getButton('linkedin', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function getPinterestButton($parameters = array())
    {
        return $this->getButton('pinterest', $parameters);
    }

    /**
     * @param string $network
     * @param array  $parameters
     *
     * @return mixed
     */
    private function getButton($network, $parameters = array())
    {
        $parameters = $parameters + $this->config['buttons'][$network];
        $button = $network . 'Button';

        return $this->container->get('chaplean_social_buttons.social_bar_helper')->$button($parameters);
    }
}
