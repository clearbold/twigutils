<?php

namespace Craft;

class TwigutilsTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return Craft::t('Twigutils');
    }

    public function getFilters()
    {
        return array(
            'httpify' => new \Twig_Filter_Method($this, 'httpifyFilter'),
            'traditionalusphone' => new \Twig_Filter_Method($this, 'traditionalusphoneFilter'),
            'dotusphone' => new \Twig_Filter_Method($this, 'dotusphoneFilter'),
            'toc' => new \Twig_Filter_Method($this, 'tableOfContents')
        );
    }

    public function httpifyFilter($str)
    {
        $charset = craft()->templates->getTwig()->getCharset();
        if (substr_count($str, 'http://') == 0)
            $str = 'http://' . $str;
        return new \Twig_Markup($str, $charset);
    }

    public function traditionalusphoneFilter($str)
    {
        $charset = craft()->templates->getTwig()->getCharset();
        $last_four = substr($str, -4);
        $prefix =  substr($str, -7, 3);
        $area_code = substr($str, -10, 3);
        $str = '(' . $area_code . ') ' . $prefix . '-' . $last_four;
        return new \Twig_Markup($str, $charset);
    }

    public function dotusphoneFilter($str)
    {
        $charset = craft()->templates->getTwig()->getCharset();
        $last_four = substr($str, -4);
        $prefix =  substr($str, -7, 3);
        $area_code = substr($str, -10, 3);
        $str = $area_code . '.' . $prefix . '.' . $last_four;
        return new \Twig_Markup($str, $charset);
    }

    public function tableOfContents($str)
    {
        $charset = craft()->templates->getTwig()->getCharset();
        $return_data = "<div class=\"well toc\">";
        $return_data .= "<ul class=\"ul-toc\">";
        $dom = new \DOMDocument;
        $dom->loadHTML(utf8_decode($str));
        $xpath = new \DOMXPath($dom);
        $nodes = $xpath->query('//*[self::h3]');
        $i = 0;
        $node_id = '';
        foreach( $nodes as $node ) {
            $i++;
            $node_id = $node->getAttribute('id');
            $return_data .= "<li><a href=\"#".$node_id."\">" . $node->nodeValue . "</a></li>";
        }
        $return_data .= "</ul>";
        $return_data .= "</div>";

        if ($nodes->length > 0)
            $return_data .= $str;
        else {
            $return_data = $str;
        }

        return new \Twig_Markup($return_data, $charset);
    }
}
