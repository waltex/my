<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Crud1;

/**
 * Crud1Search represents the model behind the search form of `app\models\Crud1`.
 */
class Crud1Search extends Crud1
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_combo', 'col1', 'is_admin'], 'integer'],
            [['col3'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Crud1::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_combo' => $this->id_combo,
            'col1' => $this->col1,
            'is_admin' => $this->is_admin,
        ]);

        $query->andFilterWhere(['like', 'col3', $this->col3]);

        return $dataProvider;
    }
}
