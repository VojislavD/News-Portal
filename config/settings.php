<?php

return [

    /*
    |--------------------------------------------------------------------------
    | News Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration of websites basic informations like title, favicon, colors, 
    | meta tags, social networks etc.
    |
    */

    'headline' => env('HEADLINE', 'Newsportal'),
    'title' => env('TITLE', 'Newsportal | News and Magazine portal'),
    'primary_color' => env('PRIMARY_COLOR', '#0a4184'),
    'secondary_color' => env('SECONDARY_COLOR', '#c41414'),
    'favicon' => env('FAVICON', '/storage/images/favicon.png'),
    'description_tag' => env('DESCRIPTION_TAG', 'News and Magazine portal based on Laravel framework.'),
    'keywords_tag' => env('KEYWORDS_TAG', 'news, magazine, portal, laravel'),
    'author_tag' => env('AUTHOR_TAG', 'Vojislav Dragicevic'),
    'facebook_url' => env('FACEBOOK_URL', 'https://www.facebook.com/LaravelCommunity/'),
    'twitter_url' => env('TWITTER_URL', 'https://twitter.com/laravelphp'),
    'instagram_url' => env('INSTAGRAM_URL', 'https://www.instagram.com/laravelnews/'),
    'youtube_url' => env('YOUTUBE_URL', 'https://www.youtube.com/channel/UCfO2GiQwb-cwJTb1CuRSkwg'),
];
