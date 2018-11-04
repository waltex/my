<?php

/* models
  Crud1
  Combo1
  User
 */

class crud1_filter extends \atk4\data\Model {
    public $table = 'crud1';

    function init() {
        parent::init();

        $this->addField('col3', ['caption' => 'colonna1', 'required' => true, 'type' => 'string']);
        //$this->hasOne('id_combo', [new Combo1(), 'required' => true, 'caption' => 'colonan2', 'ui' => ['form' => ['AutoComplete', 'plus' => true]]])->addTitle(['field' => 'col1']);
        //$this->addField('is_admin', ['type' => 'boolean']);
    }

}

class Crud1 extends \atk4\data\Model {

    public $table = 'crud1';
    public $title = 'Tabella crud1';
    public $caption = ' ';

    function init() {
        parent::init();

      

        $this->addField('col3', ['caption' => 'colonna1', 'required' => true, 'type' => 'string']);
        $this->hasOne('id_combo', [new Combo1(), 'required' => true, 'caption' => 'colonan2', 'ui' => ['form' => ['AutoComplete', 'plus' => true]]])->addTitle(['field' => 'col1']);
        $this->addField('is_admin', ['type' => 'boolean']);
    }

}

class Combo1 extends \atk4\data\Model {

    public $table = 'combo1';
    public $title_field = 'col1';

    function init() {
        parent::init();

        $this->addField('col1', ['caption' => 'colonna1', 'required' => true, 'type' => 'string']);
        $this->addField('col2', ['caption' => 'colonna2', 'required' => true, 'type' => 'string']);
        $this->hasMany('id_combo', new Crud1());
    }

}


    class User extends \atk4\data\Model {

    public $table = 'user';

    function init() {
        parent::init();

        $this->addField('name', ['caption' => 'Nome', 'required' => true, 'type' => 'string']);
        $this->addField('email', ['caption' => 'ISO', 'required' => true, 'type' => 'string']);
        $this->addField('password', ['type' => 'password']);
        $this->addHook('beforeSave', function ($m) {
            //if (!$m['name']) {
            $m['name'] = strtoupper($m['name'] . 'aa');
            //}
        });
    }

}

class Crud_oci extends \atk4\data\Model {

    public $table = 'ABB_CRUD';
    public $id_field = 'ID';
    public $sequence = 'ABB_CRUD_SEQ';

    function init() {
        parent::init();

        $this->addField('CAMPO1', ['caption' => 'colonna1', 'required' => true, 'type' => 'string']);
        $this->addField('DTIN', ['caption' => 'data inizio', 'required' => true, 'type' => 'date']);
        $this->hasOne('COMBO', [new Combo_oci(), 'required' => true, 'caption' => 'combo descri', 'ui' => ['form' => ['AutoComplete', 'plus' => true]]])->addTitle(['field' => 'DESCRI']);
    }

}

class Combo_oci extends \atk4\data\Model {

    public $table = 'ABB_CRUD_COMBO';
    public $id_field = 'ID';
    public $sequence = 'ABB_CRUD_COMBO_SEQ';
    public $title_field = 'DESCRI';

    function init() {
        parent::init();

        $this->addField('DESCRI', ['caption' => 'colonna1', 'required' => true, 'type' => 'string']);
        $this->hasMany('COMBO', new Crud_oci());
    }

}
