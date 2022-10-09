<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "expediente".
 *
 * @property int $id
 * @property int $perfil_estudiante_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $fecha_cierre
 * @property int $estado_expediente_id
 *
 * @property EstadoExpediente $estadoExpediente
 * @property PerfilEstudiante $perfilEstudiante
 */
class Expediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perfil_estudiante_id', 'estado_expediente_id'], 'integer'],
            [['created_at', 'updated_at', 'fecha_cierre'], 'safe'],
            [['perfil_estudiante_id'], 'exist', 'skipOnError' => true, 'targetClass' => PerfilEstudiante::class, 'targetAttribute' => ['perfil_estudiante_id' => 'id']],
            [['estado_expediente_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoExpediente::class, 'targetAttribute' => ['estado_expediente_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'perfil_estudiante_id' => 'Estudiante',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Última actualización',
            'fecha_cierre' => 'Fecha Cierre',
            'estado_expediente_id' => 'Estado',
        ];
    }

    /**
     * Gets query for [[EstadoExpediente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoExpediente()
    {
        return $this->hasOne(EstadoExpediente::class, ['id' => 'estado_expediente_id']);
    }

    /**
     * Gets query for [[PerfilEstudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilEstudiante()
    {
        return $this->hasOne(PerfilEstudiante::class, ['id' => 'perfil_estudiante_id']);
    }
}
