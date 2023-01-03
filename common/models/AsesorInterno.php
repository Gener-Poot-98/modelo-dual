<?php

namespace common\models;
use yii\helpers\ArrayHelper;


use Yii;

/**
 * This is the model class for table "asesor_interno".
 *
 * @property int $id
 * @property string $nombre
 * @property int $ingenieria_id
 *
 * @property Ingenieria $ingenieria
 * @property Proyecto[] $proyectos
 */
class AsesorInterno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asesor_interno';
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
            'nombre' => 'Nombre',
            'ingenieria_id' => 'Ingenieria',
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
     * Gets query for [[Proyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyecto::class, ['asesor_interno_id' => 'id']);
    }

    public function getIngenieriasList()
    {
        $ingenierias = Ingenieria::find()->all();

        $ingenieriasList = ArrayHelper::map($ingenierias, 'id', 'nombre');

        return $ingenieriasList;
    }

    public function getIngenieriaNombre() 
    { 
        return $this->ingenieria->nombre; 
    }
}
