<?php
namespace CodeViewer;

/**
 *
 * @author Khaled Hossain
 *        
 * @since 0.1
 */
class GeneralController
{

    public function __construct()
    {
        add_shortcode('code', array($this, 'shortcode'));
        add_shortcode('code-viewer', array($this, 'shortcode'));
    }

    public function shortcode($atts, $content = null)
    {
        if (array_key_exists('src', $atts)) {
            $url = $atts['src'];
            $code = file_get_contents($url);
        } else {
            $code = $content;
        }
        
        $language = 'php';
        $geshi = new \GeSHi($code, $language);
        $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 2);
        $geshi->set_line_style('background: #fcfcfc;', 'background: #f0f0f0;');
        $geshi->set_code_style('font-size: 12px;');
        return $geshi->parse_code();
    }
}
