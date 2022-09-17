<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
    public $archivoKardex, $archivoConstancia_ingles, $archivoConstancia_servicio_social, $archivoConstancia_creditos_complementarios;
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
            [['nombre', 'matricula', 'email', 'ingenieria_id'], 'required'],
            [['ingenieria_id', 'estado_registro_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['comentario'], 'string'],
            [['nombre', 'matricula', 'email'], 'string', 'max' => 45],
            //[['kardex', 'constancia_ingles', 'constancia_servicio_social', 'constancia_creditos_complementarios'], 'string', 'max' => 2500],
            [['archivoKardex', 'archivoConstancia_ingles', 'archivoConstancia_servicio_social', 'archivoConstancia_creditos_complementarios'], 'file', 'extensions' => 'pdf'],
            //[['email'], 'unique'],
            ['email', 'unique', 'targetClass' => '\common\models\Preregistro', 'message' => 'This email has already been taken.'],
            //[['matricula'], 'unique'],
            ['matricula', 'unique', 'targetClass' => '\common\models\Preregistro', 'message' => 'This matricula has already been taken.'],
            [['estado_registro_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoRegistro::class, 'targetAttribute' => ['estado_registro_id' => 'id']],
            [['ingenieria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingenieria::class, 'targetAttribute' => ['ingenieria_id' => 'id']],
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
            'nombre' => 'Nombre',
            'matricula' => 'Matricula',
            'email' => 'Email',
            'ingenieria_id' => 'Ingenieria',
            'kardex' => 'Kardex',
            'constancia_ingles' => 'Constancia de Ingles',
            'constancia_servicio_social' => 'Constancia de Servicio Social',
            'constancia_creditos_complementarios' => 'Constancia de Creditos Complementarios',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Última actualización',
            'estado_registro_id' => 'Estado',
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


    public function getEstadoRegistroNombreList()
    {
        $estadoRegistro = EstadoRegistro::find()->all();

        $estadoRegistroNombreList = ArrayHelper::map($estadoRegistro, 'id', 'nombre');

        return $estadoRegistroNombreList;
    }

    public function getEstadoRegistroNombre() 
    { 
        return $this->estadoRegistro->nombre; 
    }

    public static function findByMatricula($matricula)
    {
        return static::findOne(['matricula' => $matricula]);
    }
}
