<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Motor;

/**
 * MotorSearch represents the model behind the search form about `app\models\Motor`.
 */
class MotorSearch extends Motor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fk_cliente', 'hp', 'rpm'], 'integer'],
            [['marca', 'imagen', 'descripcion', 'estado', 'fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Motor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
             'query' => $query,
             'sort'=> ['defaultOrder' => ['fecha'=>SORT_DESC]]
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
            'fk_cliente' => $this->fk_cliente,
            'hp' => $this->hp,
            'rpm' => $this->rpm,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'imagen', $this->imagen])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
