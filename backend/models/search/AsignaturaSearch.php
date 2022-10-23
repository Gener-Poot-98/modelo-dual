<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Asignatura;

/**
 * AsignaturaSearch represents the model behind the search form of `common\models\Asignatura`.
 */
class AsignaturaSearch extends Asignatura
{  public $docenteNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'docente_id', 'horas_dedicadas', 'ingenieria_id'], 'integer'],
            [['nombre', 'clave', 'creditos', 'competencia_disciplinar', 'docenteNombre','periodo_desarrollo', 'periodo_acreditacion'], 'safe'],
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
    public function search($params, $proyecto_id = null)
    {
        if ($proyecto_id) 
        $query = Asignatura::find() ->leftJoin('proyecto_asignatura', 'proyecto_asignatura.asignatura_id = asignatura.id') ->where(['proyecto_asignatura.proyecto_id' => $proyecto_id]);
        else 
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

        $dataProvider->setSort([ 
            'attributes' => [ 
                'nombre', 
                'docenteNombre' => [
                    'asc' => ['docente.nombre' => SORT_ASC],
                    'desc' => ['docente.nombre' => SORT_DESC],
                    'label' => 'Docente'], ] ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'docente_id' => $this->docente_id,
            'horas_dedicadas' => $this->horas_dedicadas,
            'ingenieria_id' => $this->ingenieria_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'clave', $this->clave])
            ->andFilterWhere(['like', 'creditos', $this->creditos])
            ->andFilterWhere(['like', 'competencia_disciplinar', $this->competencia_disciplinar])
            ->andFilterWhere(['like', 'periodo_desarrollo', $this->periodo_desarrollo])
            ->andFilterWhere(['like', 'periodo_acreditacion', $this->periodo_acreditacion]);

        $query->joinWith(['docente' => function ($q) {
            $q->andFilterWhere(['=', 'docente.id', $this->docenteNombre]);
            }]);

        return $dataProvider;
    }
}
