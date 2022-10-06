<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "semestre".
 *
 * @property int $id
 * @property string $nombre
 * @property int $plan_estudios_id
 *
 * @property Asignatura[] $asignaturas
 * @property PlanEstudios $planEstudios
 */
class Semestre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semestre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'plan_estudios_id'], 'required'],
            [['plan_estudios_id'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['plan_estudios_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanEstudios::class, 'targetAttribute' => ['plan_estudios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'plan_estudios_id' => 'Plan Estudios ID',
        ];
    }

    /**
     * Gets query for [[Asignaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturas()
    {
        return $this->hasMany(Asignatura::class, ['semestre_id' => 'id']);
    }

    /**
     * Gets query for [[PlanEstudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudios()
    {
        return $this->hasOne(PlanEstudios::class, ['id' => 'plan_estudios_id']);
    }
}
