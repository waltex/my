<?php

require 'init.php';

$t = $app->add(new \atk4\ui\Tabs);
//$app->add(['Header', 'Very simple form']);
// dynamic tab




$t->addTab('tets', function ($tab) {
    require './database.php';
    $m = new Crud1($db1);
    $g = $tab->add("CRUD");
    $g->setModel($m);
    $g->addQuickSearch(['col3', 'col1'], true);
    $sel = $g->addSelection();


    $vp = $tab->add('VirtualPage');

    $vp->add(['Text', 'ciao ']);
    $vp->add(['Text', 'ciao 2 ']);

    $b2 = $g->menu->addItem('deleted row');
    $b2->on('click', function ($j, $arg1) use ($sel, $g, $tab, $vp) {
        $i = 0;
        foreach (explode(',', $arg1) as $id) {
            $g->model->delete($id);
            $i++;
        }

        return [
            new \atk4\ui\jsNotify('Not yet implemented'),
            new \atk4\ui\jsReload($g),
            new \atk4\ui\jsModal('My Popup Title',$vp),

        ];
            //return 'deleted rows ' . $arg1;
    }, ['confirm' => 'sure?', 'args' => [new \atk4\ui\jsExpression('[]', [$sel->jsChecked()])]]);



    $modal1 = $tab->add(['Modal', 'title' => 'Lorem Ipsum load dynamically']);
    //$modal1->show();
    
    

    //$action = $tab->js(true)->text(new \atk4\ui\jsExpression('[]', [$sel->jsChecked()]));
    //$action = new \atk4\ui\jsExpression('alert([])', ['Hello world']);
    $modal1->set(function ($modal1) use ($sel, $tab) {
        //$sel = $g->addSelection();
        //$modal->add(['LoremIpsum', 'size' => 2]);
        //$modal=add(['Modal', 'title' => 'Lorem I
        //$action = new \atk4\ui\jsExpression('[]', [$sel->jsChecked()]);
        //$val=(new jQuery($action));
        $val = $tab->js(true, new \atk4\ui\jsExpression([$sel->jsChecked()]));
        $modal1->add('Message')->set('This modal is only closable via the green button');
        //$form = $modal->add('Form');
        //$modal1->show();
        //return $arg1;
    });
    $b = $g->menu->addItem('button x');
    $b->on('click', [$modal1->show()]);



    $label = $tab->add(['Label', 'Callback test']);


    $label2 = $tab->add(['Label', 'Callback test']);



});
$t->addTab('test', function ($tab) {
    require './database.php';
    $form = $tab->add('form');
    if (!isset($_SESSION['ad'])) {
        $_SESSION['ad'] = []; // initialize
    }
    $sess = new \atk4\data\Persistence_Array($_SESSION['ad']);

    $text = $form->addField('email', 'posta elettronica')->set('ssss');


    $form->buttonSave->set('Subscribe');
    $form->buttonSave->icon = 'mail';

    $tab->add(['Header', 'Modal View']);
    $modal = $tab->add(['Modal', 'title' => 'Simple modal']);
    $modal->addDenyAction('No', new \atk4\ui\jsExpression('function(){window.alert("Can\'t do that."); return false;}'));
    $modal->addApproveAction('Yes', new \atk4\ui\jsExpression('function(){window.alert("You\'re good to go!");}'));

    //$form_m = $modal->add('form');
    //$form_m->addField('email', 'posta elettronica')->set('ssss');
    //$form_m->addField('text')->set('Modal message here.');
    //$modal->add(new(["label" => "xxxxx"]));

    $modal->add(new \atk4\ui\FormField\Line(['placeholder' => 'Weight', 'labelRight' => new \atk4\ui\Label(['kg', 'basic'])]));
    //$field->set('hello world');
    //$modal->add('text');
    $b = $tab->add('Button')->set('Show Modal');
    $b->on('click', $modal->show());

});
$t->addTab('MYSQL', function ($tab) {
    require './database.php';
    $m = new Crud1($db1);
    $g = $tab->add("CRUD");
    $g->setModel($m);
    $g->addQuickSearch(['col3', 'col1'], true);
});


$t->addTab('ORACLE TEST', function ($tab) {
    require './database.php';
    $m = new Crud_oci($db_oci_t);
    $g = $tab->add('CRUD');
    $g->setModel($m);
    $g->addQuickSearch(['CAMPO1', 'DESCRI'], true);
});


$t->addTab('crud2', function ($tab) {
    require './database.php';


    //$message = new \atk4\ui\Message('Message Title');
    //$tab->add($message);
    $g = $tab->add('CRUD');
    $model_user = new User($db1);

    $model_user->addExpression('xx', [
        '50',
        'type' => 'money',
        'caption' => 'Total Price'
    ]);
    $g->setModel($model_user);
    $g->addQuickSearch(['name'], true);

    //$g->addFilterColumn(['name']);


    $g->menu->addItem(['Add Country', 'icon' => 'add square'], new \atk4\ui\jsExpression('alert(123)'));
    $g->menu->addItem(['Ricarica', 'icon' => 'refresh'], new \atk4\ui\jsReload($g));
    $g->menu->addItem(['Delete All', 'icon' => 'trash', 'red active']);

    $g->addColumn("total1", ['Template', 'hello<b>world</b>']);
    //$g->addColumn('name2', ['TableColumn/Link', 'page2']);
    //$g->addColumn('totale', 'Delete');
    $g->addAction('Say HI', function ($j, $id) use ($g) {
        return 'Loaded "' . $g->model->load($id)['name'] . '" from ID=' . $id;
    });
    $sel = $g->addSelection();

    $g->menu->addItem('show selection')->on('click', new \atk4\ui\jsExpression(
        'alert("Selected: "+[])',
        [$sel->jsChecked()]
    ));

    //$g->addDropdown('name1', ['Sort A-Z', 'Sort by Relevance'], function ($item) {
    //return $item;
    //});

    $g->addModalAction(['icon' => 'external'], 'Modal Test', function ($p, $id) {
        $p->add(['Message', 'Clicked on ID=' . $id]);
        //$p->add('Form');
        $p->add(['Text', 'here goes some text']);
        $form_m = $p->add('Form');
        $form_m->addField('email');
    });

    $tab->add(['ui' => 'divider']);

    $c = $tab->add('Columns');
    $cc = $c->addColumn(0);
    $cc->add(['Header', 'form1']);

    $form = $tab->add('Form');
    $form->addField('email');


    $calOptions = [
        'days' => ['D', 'L', 'Ma', 'Me', 'J', 'V', 'S'],
        'months' => ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
        'monthsShort' => ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
        'today' => 'Aujourd`hui',
        'now' => 'Maintenant',
        'am' => 'AM',
        'pm' => 'PM'
    ];

    $month = $form->addField('month', ['Calendar', 'type' => 'date', 'options' => ['firstDayOfWeek' => 1, 'text' => $calOptions]]);
    $form->addField('gender1', ['Radio', 'caption' => 'Walter'], ['enum' => ['Female', 'Male']])->set('Female');
    $form->addField('m_gift', ['DropDown', 'caption' => 'Gift for Men', 'values' => ['Beer Glass', 'Swiss Knife']]);
    $form->addField('f_gift', ['DropDown', 'caption' => 'Gift for Women', 'values' => ['Wine Glass', 'Lipstick']]);
    $form->addField('multi', [
        'DropDown',
        'caption' => 'Multiple selection',
        'empty' => 'Choose has many options needed',
        'isMultiple' => true,
        'values' => ['default' => 'Default', 'option1' => 'Option 1', 'option2' => 'Option 2'],
    ]);
    $form->addField('user', ['AutoComplete', 'plus' => true])->setModel(new User($db1));
    $form->onSubmit(function ($form) {
        // implement subscribe here

        return "Subscribed " . $form->model['email'] . " to newsletter.";

    });
    $cc->add(['Header', 'filter form']);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    //if (!isset($_SESSION['my_virtual_table']))
    //  $_SESSION['my_virtual_table'] = [];
    $db = new \atk4\data\Persistence_Array($_SESSION);
    $model_filter = new crud1_filter($db);
    $form = $tab->add('Form');
    $form->setModel($model_filter);
    // submit event
    $form->onSubmit(function ($form) use ($model_filter, $tab) {
        $form->model->save(); // will only store email / password
        return $form->success('Thank you. Check your email now');
    });
});


