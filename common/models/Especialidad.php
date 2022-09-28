<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "especialidad".
 *
 * @property int $id
 * @property string $nombre
 * @property int $ingenieria_id
 *
 * @property Ingenieria $ingenieria
 * @property PerfilEstudiante[] $perfilEstudiantes
 */
class Especialidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'especialidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'ingenieria_id'], 'required'],
            [['ingenieria_id'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['ingenieria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingenieria::class, 'targetAttribute' => ['ingenieria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Especialidad',
            'ingenieria_id' => 'Ingenieria ID',
        ];
    }

    /**
     * Gets query for [[Ingenieria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngenieria()
    {
        return $this->hasOne(Ingenieria::class, ['id' => 'ingenieria_id']);
    }

    /**
     * Gets query for [[PerfilEstudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilEstudiantes()
    {
        return $this->hasMany(PerfilEstudiante::class, ['especialidad_id' => 'id']);
    }
}
