<?php

/**
 *
 * create composer.json
 * install composer, (after install comp. there will be create vendor folder)
 * have to connect autoload
 * composer.lock is file which gives news about what downloaded from composer and updates..
 * after wrote own code namespace in composer.json, you have "composer dump-autoload"
 */

require '../vendor/autoload.php';


/*
 *   ["REQUEST_URI"]=> string(12) "/php/public/"
 *   ["SCRIPT_NAME"]=> string(21) "/php/public/index.php"
 */


// Create new Plates instance
$templates = new League\Plates\Engine('../app/views');

// Render a template
echo $templates->render('about', ['title' => 'Jonathan']);















if($_SERVER['REQUEST_URI']=='/php/public/home')
{
    require '../app/controllers/homepage.php';
}





