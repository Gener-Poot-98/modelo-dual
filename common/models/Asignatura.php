<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Docente;

/**
 * This is the model class for table "asignatura".
 *
 * @property int $id
 * @property string $nombre
 * @property string $clave
 * @property string $creditos
 * @property string $competencia_disciplinar
 * @property int $docente_id
 * @property int $horas_dedicadas
 * @property string $periodo_desarrollo
 * @property string $periodo_acreditacion
 * @property int $ingenieria_id
 *
 * @property Docente $docente
 * @property Ingenieria $ingenieria
 */
class Asignatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'clave', 'creditos', 'competencia_disciplinar', 'docente_id', 'horas_dedicadas', 'periodo_desarrollo', 'periodo_acreditacion', 'ingenieria_id'], 'required'],
            [['competencia_disciplinar'], 'string'],
            [['docente_id', 'horas_dedicadas', 'ingenieria_id'], 'integer'],
            [['nombre', 'clave', 'creditos', 'periodo_desarrollo', 'periodo_acreditacion'], 'string', 'max' => 45],
            [['docente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::class, 'targetAttribute' => ['docente_id' => 'id']],
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
            'clave' => 'Clave',
            'creditos' => 'Creditos',
            'competencia_disciplinar' => 'Competencia Disciplinar',
            'docente_id' => 'Docente ID',
            'horas_dedicadas' => 'Horas Dedicadas',
            'periodo_desarrollo' => 'Periodo Desarrollo',
            'periodo_acreditacion' => 'Periodo Acreditacion',
            'ingenieria_id' => 'Ingenieria ID',
        ];
    }

    /**
     * Gets query for [[Docente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::class, ['id' => 'docente_id']);
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

    public function getDocenteNombre() 
    { 
        return $this->docente->nombre; 
    }

    public function getDocenteList()
    {
        $docente = Docente::find()->all();

        $docentesList = ArrayHelper::map($docente, 'id', 'nombre');

        return $docentesList;
    }
}
