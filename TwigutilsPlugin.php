<?php

namespace Craft;

class TwigutilsPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Twig Utils');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Mark Reeves';
    }

    function getDeveloperUrl()
    {
        return 'http://clearbold.com';
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.twigutils.twigextensions.TwigutilsTwigExtension');
        return new TwigutilsTwigExtension;
    }
}
