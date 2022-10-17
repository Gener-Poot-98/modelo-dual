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
 * @property int $semestre_id
 *
 * @property Docente $docente
 * @property Semestre $semestre
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
            [['nombre', 'clave', 'creditos','competencia_disciplinar', 'docente_id', 'horas_dedicadas', 'periodo_desarrollo', 'periodo_acreditacion', 'semestre_id'], 'required'],
            [['competencia_disciplinar'], 'string'],
            [['docente_id', 'horas_dedicadas', 'semestre_id'], 'integer'],
            [['nombre', 'clave', 'creditos', 'periodo_desarrollo', 'periodo_acreditacion'], 'string', 'max' => 45],
            [['docente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::class, 'targetAttribute' => ['docente_id' => 'id']],
            [['semestre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semestre::class, 'targetAttribute' => ['semestre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Asignatura',
            'clave' => 'Clave',
            'creditos' => 'Creditos',
            'competencia_disciplinar' => 'Competencia Disciplinar',
            'docente_id' => 'Docente',
            'horas_dedicadas' => 'Horas',
            'periodo_desarrollo' => 'P. Desarrollo',
            'periodo_acreditacion' => 'P. Acreditacion',
            'semestre_id' => 'Semestre',
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
     * Gets query for [[Semestre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemestre()
    {
        return $this->hasOne(Semestre::class, ['id' => 'semestre_id']);
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
