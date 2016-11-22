<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

try {
    /** Loads the WordPress Environment and Template */
    require(dirname(__FILE__).'/wp-blog-header.php');
} catch (Exception $e){
    require_once __DIR__.'/wp-content/plugins/logging-with-monolog/logging-with-monolog.php';
    addLogEntry('alert', $e->getMessage());

    throw $e;
} catch (Throwable $x){
    require_once __DIR__.'/wp-content/plugins/logging-with-monolog/logging-with-monolog.php';
    addLogEntry('alert', $x->getMessage());

    throw $x;
}
