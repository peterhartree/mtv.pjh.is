<?php
/**
 * Site Configuration
 * Copy this file to config.php and customise for your site
 */

// Site identity
define('SITE_TITLE', 'My Blog');
define('SITE_DESCRIPTION', 'A minimal PHP blog.');
define('SITE_URL', 'https://example.com');

// Pagination
define('POSTS_PER_PAGE', 6);

// Colors (not currently used in templates, but available for customisation)
define('TEXT_COLOR', '#232323');
define('BACKGROUND_COLOR', '#fff');
define('LINK_COLOR', '#004984');

// Typography (not currently used in templates, but available for customisation)
define('FONT_STACK', "-apple-system, BlinkMacSystemFont, 'avenir next', avenir, 'helvetica neue', helvetica, ubuntu, roboto, noto, 'segoe ui', arial, sans-serif");
define('FONT_SIZE', 16);
define('LINE_HEIGHT', 1.4);

// Paths (usually don't need to change)
define('POSTS_DIR', __DIR__ . '/../data/posts');
define('PAGES_DIR', __DIR__ . '/../data/pages');

// Date format for display
define('DATE_FORMAT', 'F j, Y');
