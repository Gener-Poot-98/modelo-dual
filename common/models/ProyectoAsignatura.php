<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "proyecto_asignatura".
 *
 * @property int $id
 * @property int $proyecto_id
 * @property int $asignatura_id
 */
class ProyectoAsignatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyecto_asignatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proyecto_id', 'asignatura_id'], 'required'],
            [['proyecto_id', 'asignatura_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'proyecto_id' => 'Proyecto ID',
            'asignatura_id' => 'Asignatura ID',
        ];
    }
}
