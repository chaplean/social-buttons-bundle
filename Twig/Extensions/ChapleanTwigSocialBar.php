<?php

namespace Chaplean\Bundle\SocialButtonsBundle\Twig\Extensions;

use Chaplean\Bundle\SocialButtonsBundle\Helpers\SocialBarHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ChapleanTwigSocialBar
 *
 * @package   Chaplean\Bundle\SocialButtonsBundle\Twig\Extensions
 * @author    Valentin - Chaplean <valentin@chaplean.com>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.com)
 * @since     0.1.0
 */
class ChapleanTwigSocialBar extends \Twig_Extension
{

    protected $container;

    /**
     * Constructor.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container Container.
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
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
            'socialButtons'    => new \Twig_Function_Method(
                $this,
                'getSocialButtons',
                array(
                    'is_safe' => array('html')
                )
            ),
            'facebookButton'   => new \Twig_Function_Method(
                $this,
                'getFacebookLikeButton',
                array(
                    'is_safe' => array('html')
                )
            ),
            'twitterButton'    => new \Twig_Function_Method(
                $this,
                'getTwitterButton',
                array(
                    'is_safe' => array('html')
                )
            ),
            'googlePlusButton' => new \Twig_Function_Method(
                $this,
                'getGooglePlusButton',
                array(
                    'is_safe' => array('html')
                )
            ),
            'pinterestButton'  => new \Twig_Function_Method(
                $this,
                'getPinterestButton',
                array(
                    'is_safe' => array('html')
                )
            ),
            'viadeoButton'     => new \Twig_Function_Method(
                $this,
                'getViadeoButton',
                array(
                    'is_safe' => array('html')
                )
            ),
            'linkedInButton'   => new \Twig_Function_Method(
                $this,
                'getLinkedInButton',
                array(
                    'is_safe' => array('html')
                )
            ),
        );
    }

    /**
     * @param array|mixed $parameters Parameters.
     *
     * @return string
     */
    public function getSocialButtons($parameters = array())
    {
        $render_parameters = array(
            'facebook' => false,
            'twitter' => false,
            'googleplus' => false
        );

        foreach (array_keys($render_parameters) as $platform) {
            if (!array_key_exists($platform, $parameters)) {
                $render_parameters[$platform] = array();
            } elseif (is_array($parameters[$platform])) {
                // parameters are defined, overrides default values
                $render_parameters[$platform] = $parameters[$platform];
            }
        }

        /** @var SocialBarHelper $serviceSocial */
        $serviceSocial = $this->container->get('chaplean.socialBarHelper');
        return $serviceSocial->socialButtons($render_parameters);
    }

    /**
     * Facebook // https://developers.facebook.com/docs/reference/plugins/like/
     *
     * @param array|mixed $parameters Parameters.
     *
     * @return string
     */
    public function getFacebookLikeButton($parameters = array())
    {
        // default values, you can override the values by setting them
        $parameters = $parameters + array(
                'url'       => null,
                'locale'    => 'en_US',
                'send'      => false,
                'width'     => 100,
                'showFaces' => false,
                'layout'    => 'button_count',
            );

        /** @var SocialBarHelper $serviceSocial */
        $serviceSocial = $this->container->get('chaplean.socialBarHelper');
        return $serviceSocial->facebookButton($parameters);
    }

    /**
     * @param array|mixed $parameters Parameters.
     *
     * @return string
     */
    public function getTwitterButton($parameters = array())
    {
        $parameters = $parameters + array(
                'url'     => null,
                'locale'  => 'en',
                'message' => 'I want to share that page with you',
                'text'    => 'Tweet',
                'via'     => 'The Acme team',
                'tag'     => 'ttot',
                'count'   => 'horizontal',
            );

        /** @var SocialBarHelper $serviceSocial */
        $serviceSocial = $this->container->get('chaplean.socialBarHelper');
        return $serviceSocial->twitterButton($parameters);
    }

    /**
     * @param array|mixed $parameters Parameters.
     *
     * @return string
     */
    public function getGooglePlusButton($parameters = array())
    {
        $parameters = $parameters + array(
                'url'        => null,
                'locale'     => 'en',
                'size'       => 'medium',
                'annotation' => 'bubble',
                'width'      => '300',
            );

        /** @var SocialBarHelper $serviceSocial */
        $serviceSocial = $this->container->get('chaplean.socialBarHelper');
        return $serviceSocial->googlePlusButton($parameters);
    }

    /**
     * @param array|mixed $parameters Parameters.
     *
     * @return string
     */
    public function getViadeoButton($parameters = array())
    {
        $parameters = $parameters + array(
                'url'    => null,
                'locale' => 'en',
                'count'  => 'right',
                'align'  => 'left',
                'layout' => 'btnwhite',
            );

        /** @var SocialBarHelper $serviceSocial */
        $serviceSocial = $this->container->get('chaplean.socialBarHelper');
        return $serviceSocial->viadeoButton($parameters);
    }

    /**
     * @param array|mixed $parameters Parameters.
     *
     * @return string
     */
    public function getPinterestButton($parameters = array())
    {
        $parameters = $parameters + array(
                'url'    => null,
                'locale' => 'en',
            );

        /** @var SocialBarHelper $serviceSocial */
        $serviceSocial = $this->container->get('chaplean.socialBarHelper');
        return $serviceSocial->pinterestButton($parameters);
    }

    /**
     * @param array $parameters
     *
     * @return string
     */
    public function getLinkedInButton($parameters = array())
    {
        $parameters = $parameters + array(
                'url'     => null,
                'locale'  => 'fr',
                'counter' => 'none',
            );

        /** @var SocialBarHelper $serviceSocial */
        $serviceSocial = $this->container->get('chaplean.socialBarHelper');
        return $serviceSocial->linkedInButton($parameters);
    }
}
