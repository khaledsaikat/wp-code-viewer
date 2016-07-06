<?php
/*
 * Plugin Name: Remote Code Viewer
 * Plugin URI: http://khaledsaikat.com
 * Description: Remote code viewer usign GeSHi
 * Author: Khaled Hossain
 * Version: 0.1
 * Author URI: http://khaledsaikat.com
 */
namespace CodeViewer;

require __DIR__ . '/vendor/autoload.php';

Base::init(__FILE__);
Base::load_controllers();