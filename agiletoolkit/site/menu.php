<?php

//menu
$app = new \atk4\ui\App('My Admin Wal');
$app->initLayout($app->stickyGET('layout') ?: 'Admin');

$menu = "";
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
}


$layout = $app->layout;
if (isset($layout->leftMenu)) {
    $layout->leftMenu->addItem(['Welcome Page', 'icon' => 'gift'], ['index', 'group' => 'welcome']);
    $layout->leftMenu->addItem(['page_test', 'icon' => 'object group'], ['page_test']);
    $sub = $layout->leftMenu->addMenu('Some Bars', 'Vertical');
    $sub->addItem(['page_test', 'icon' => 'object group'], ['page_test']);
    $sub->addItem('bar 2');

    /*
      if ($menu != "crud") {
      $layout->leftMenu->addItem(['menu', 'icon' => 'object group'], ['index', 'menu' => "crud"]);
      } else {
      $form = $layout->leftMenu->addGroup(['Form', 'icon' => 'edit']);
      $form->js('click')->univ()->successMessage('Clicked');
      $item = $form->addItem(['Page test', 'icon' => 'yellow star'], ['page_test']);
      $form->addItem('crud', ['index']);
      }

     */
    $form = $layout->leftMenu->addGroup(['Form', 'icon' => 'edit']);
    $item = $form->addItem(['Page test', 'icon' => 'yellow star'], ['page_test']);
    $form->addItem('crud', ['index']);
}