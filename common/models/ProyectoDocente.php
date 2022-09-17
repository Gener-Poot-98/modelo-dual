<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use common\models\Docente;

/**
 * This is the model class for table "proyecto_docente".
 *
 * @property int $id
 * @property int $proyecto_id
 * @property int $docente_id
 *
 * @property Docente $docente
 * @property Proyecto $proyecto
 */
class ProyectoDocente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyecto_docente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proyecto_id', 'docente_id'], 'required'],
            [['proyecto_id', 'docente_id'], 'integer'],
            [['docente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::class, 'targetAttribute' => ['docente_id' => 'id']],
            [['proyecto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proyecto::class, 'targetAttribute' => ['proyecto_id' => 'id']],
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
            'docente_id' => 'Docente ID',
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

    public function getDocenteList()
    {
        $docente = Docente::find()->all();

        $departamentoList = ArrayHelper::map($docente, 'id', 'nombre');

        return $departamentoList;
    }

    public function getDocenteNombre() 
    { 
        return $this->docente->nombre; 
    }

    /**
     * Gets query for [[Proyecto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyecto()
    {
        return $this->hasOne(Proyecto::class, ['id' => 'proyecto_id']);
    }
}
