<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Especialidad;

/**
 * EspecialidadSearch represents the model behind the search form of `common\models\Especialidad`.
 */
class EspecialidadSearch extends Especialidad
{
    public $ingenieriaNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ingenieria_id'], 'integer'],
            [['nombre', 'ingenieriaNombre'], 'safe'],
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
        $query = Especialidad::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([ 
            'attributes' => [ 
                'nombre', 
                'ingenieriaNombre' => [ 
                    'asc' => ['ingenieria.nombre' => SORT_ASC], 
                    'desc' => ['ingenieria.nombre' => SORT_DESC], 
                    'label' => 'Ingeniería' ], 
                                            ] ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ingenieria_id' => $this->ingenieria_id,
        ]);

        $query->andFilterWhere(['like', 'especialidad.nombre', $this->nombre]);

        $query->joinWith(['ingenieria' => function ($q) {
            $q->andFilterWhere(['=', 'ingenieria.id', $this->ingenieriaNombre]);
            }]);

        return $dataProvider;
    }
}
