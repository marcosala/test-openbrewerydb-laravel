<?php
return [
    'openbrewery' => [
        'base_url' => env('OPENBREWERY_API_BASE_URL', 'https://api.openbrewerydb.org/v1/breweries'),
        'items_per_page' => env('OPENBREWERY_ITEMS_PER_PAGE', 5),
    ],
];