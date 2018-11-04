<?php
//use \atk4\ui\App;
//require 'init.php';
require'../vendor/autoload.php';

$app = new \atk4\ui\App('Wal');
$app->initLayout("Centered");


/*

$menu = $app->add('Menu_Vertical')->addClass('atk-col-2');
$menu->addTitle('Customer Interaction');

$m_users = $menu->addMenu(['Customers', 'icon' => 'smile']);

$m_users->addItem(['Users', 'icon' => 'users'], 'users');
$m_users->addItem(['Purchases', 'icon' => 'money'], 'purchases');
$m_users->addItem(['Subscribers', 'icon' => 'chart-line'], 'subscribers');
$m_users->addItem(['Plans', 'icon' => 'basket'], 'plans');

$new_comments = "27"; //should be dynamic, set as static here to show functionality
$menu->addItem(['Comments', 'icon' => 'chat-1', 'badge' => [$new_comments, 'swatch' => 'red']]);
$menu->addItem(['Statistic', 'icon' => 'chart-bar', 'icon2' => 'export-1']);
*/