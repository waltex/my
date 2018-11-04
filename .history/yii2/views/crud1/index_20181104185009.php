<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Crud1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crud1-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuova Crud1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_combo',
            'col3',
            'col1',
            'is_admin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
