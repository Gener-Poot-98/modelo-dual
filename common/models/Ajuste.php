<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ajuste".
 *
 * @property int $id
 * @property int $num_semanas_semestre
 * @property string $inicio_preregistro
 * @property string $fin_preregistro
 */
class Ajuste extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ajuste';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_semanas_semestre', 'inicio_preregistro', 'fin_preregistro'], 'required'],
            [['num_semanas_semestre'], 'integer'],
            [['inicio_preregistro', 'fin_preregistro'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num_semanas_semestre' => 'Num Semanas Semestre',
            'inicio_preregistro' => 'Inicio Preregistro',
            'fin_preregistro' => 'Fin Preregistro',
        ];
    }
}
