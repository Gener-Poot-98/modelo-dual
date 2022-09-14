<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "preregistro".
 *
 * @property int $id
 * @property string $nombre
 * @property string $matricula
 * @property string $email
 * @property int $ingenieria_id
 * @property string $kardex
 * @property string $constancia_ingles
 * @property string $constancia_servicio_social
 * @property string $constancia_creditos_complementarios
 * @property string $created_at
 * @property string $updated_at
 * @property int $estado_registro_id
 * @property string|null $comentario
 *
 * @property EstadoRegistro $estadoRegistro
 * @property Ingenieria $ingenieria
 */
class Preregistro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'preregistro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'matricula', 'email', 'ingenieria_id', 'kardex', 'constancia_ingles', 'constancia_servicio_social', 'constancia_creditos_complementarios', 'created_at', 'updated_at'], 'required'],
            [['ingenieria_id', 'estado_registro_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['comentario'], 'string'],
            [['nombre', 'matricula', 'email'], 'string', 'max' => 45],
            [['kardex', 'constancia_ingles', 'constancia_servicio_social', 'constancia_creditos_complementarios'], 'string', 'max' => 2500],
            [['email'], 'unique'],
            [['matricula'], 'unique'],
            [['estado_registro_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoRegistro::class, 'targetAttribute' => ['estado_registro_id' => 'id']],
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
            'matricula' => 'Matricula',
            'email' => 'Email',
            'ingenieria_id' => 'Ingenieria ID',
            'kardex' => 'Kardex',
            'constancia_ingles' => 'Constancia Ingles',
            'constancia_servicio_social' => 'Constancia Servicio Social',
            'constancia_creditos_complementarios' => 'Constancia Creditos Complementarios',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'estado_registro_id' => 'Estado Registro ID',
            'comentario' => 'Comentario',
        ];
    }

    /**
     * Gets query for [[EstadoRegistro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoRegistro()
    {
        return $this->hasOne(EstadoRegistro::class, ['id' => 'estado_registro_id']);
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
}
