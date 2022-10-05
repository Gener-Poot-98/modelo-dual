<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Asignatura;

/**
 * AsignaturaSearch represents the model behind the search form of `common\models\Asignatura`.
 */
class AsignaturaSearch extends Asignatura
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'docente_id', 'horas_dedicadas', 'semestre_id'], 'integer'],
            [['nombre', 'clave', 'creditos', 'competencia_disciplinar', 'periodo_desarrollo', 'periodo_acreditacion'], 'safe'],
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
        $query = Asignatura::find();

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
            'docente_id' => $this->docente_id,
            'horas_dedicadas' => $this->horas_dedicadas,
            'semestre_id' => $this->semestre_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'clave', $this->clave])
            ->andFilterWhere(['like', 'creditos', $this->creditos])
            ->andFilterWhere(['like', 'competencia_disciplinar', $this->competencia_disciplinar])
            ->andFilterWhere(['like', 'periodo_desarrollo', $this->periodo_desarrollo])
            ->andFilterWhere(['like', 'periodo_acreditacion', $this->periodo_acreditacion]);

        return $dataProvider;
    }
}
