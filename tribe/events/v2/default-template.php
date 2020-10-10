<?php
// this file is only being used on the main calendar page, for the default events templates

use Tribe\Events\Views\V2\Template_Bootstrap;

// Load header template.
Hybrid\View\display( 'header', Hybrid\Template\hierarchy() );

// Load content template.
echo tribe( Template_Bootstrap::class )->get_view_html();

// Load footer template.
Hybrid\View\display( 'footer', Hybrid\Template\hierarchy() );
