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
        add_shortcode('code-viewer', array(
            $this,
            'shortcode'
        ));
    }

    public function shortcode($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'src' => null,
            'lang' => 'empty'
        ), $atts, 'code-viewer'));
        $source = $src ? file_get_contents($src) : $content;
        
        $geshi = new \GeSHi($source, $lang);
        $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 2);
        $geshi->set_line_style('background: #fcfcfc;', 'background: #f0f0f0;');
        
        return $geshi->parse_code();
    }
}
