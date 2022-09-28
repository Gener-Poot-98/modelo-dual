<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "perfil_estudiante".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $nombre
 * @property string|null $matricula
 * @property int|null $ingenieria_id
 * @property int|null $genero_id
 * @property int|null $especialidad_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Especialidad $especialidad
 * @property Genero $genero
 * @property Ingenieria $ingenieria
 * @property Proyecto[] $proyectos
 */
class PerfilEstudiante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil_estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'ingenieria_id', 'genero_id', 'especialidad_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre', 'matricula'], 'string', 'max' => 45],
            [['especialidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Especialidad::class, 'targetAttribute' => ['especialidad_id' => 'id']],
            [['genero_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::class, 'targetAttribute' => ['genero_id' => 'id']],
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
            'user_id' => 'User ID',
            'nombre' => 'Nombre',
            'matricula' => 'Matricula',
            'ingenieria_id' => 'Ingeniería',
            'genero_id' => 'Genero',
            'especialidad_id' => 'Especialidad',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Ultima Actualización',
        ];
    }

    /**
     * Gets query for [[Especialidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialidad()
    {
        return $this->hasOne(Especialidad::class, ['id' => 'especialidad_id']);
    }

    /**
     * Gets query for [[Genero]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Genero::class, ['id' => 'genero_id']);
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
        return $this->hasMany(Proyecto::class, ['perfil_estudiante_id' => 'id']);
    }

    public static function findByNombre($nombre)
    {
        return static::findOne(['nombre' => $nombre]);
    }

    public static function getGeneroLista()
    {
        $droptions = Genero::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'nombre');
    }

    public static function getEspecialidadLista()
    {
        $droptions = Especialidad::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'nombre');
    }

    public static function getIngenieriaLista()
    {
        $droptions = Ingenieria::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'nombre');
    }
}
