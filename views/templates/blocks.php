<?php

// Load header/* template.
Hybrid\View\display( 'header', Hybrid\Template\hierarchy() );

// Load content/* template.
Hybrid\View\display( 'content', 'blocks' );

// Load footer/* template.
Hybrid\View\display( 'footer', Hybrid\Template\hierarchy() );
