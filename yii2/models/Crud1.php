<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crud1".
 *
 * @property int $id
 * @property int $id_combo
 * @property string $col3
 * @property int $col1
 * @property int $is_admin
 */
class Crud1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crud1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_combo', 'col3', 'col1', 'is_admin'], 'required'],
            [['id_combo', 'col1', 'is_admin'], 'integer'],
            [['col3'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_combo' => 'Id Combo',
            'col3' => 'Col3',
            'col1' => 'Col1',
            'is_admin' => 'Is Admin',
        ];
    }
}
