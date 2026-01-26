<?php

use App\QueryBuilder;

$db = new QueryBuilder();
//$db->getAll('posts');

//$db->insert([
//    'title' => 'neo'
//], 'posts');

//$db->update([
//    'id' => 2,
//    'title' => '2new post from QueryFactory package2'
//], 2, 'posts');

//$db->delete( 2, 'posts' );

$db->findOne('walli', 'posts');