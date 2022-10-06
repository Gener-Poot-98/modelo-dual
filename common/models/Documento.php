<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "documento".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_cierre
 * @property int $estado_documento_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Archivo[] $archivos
 * @property DocumentoArchivo[] $documentoArchivos
 * @property EstadoDocumento $estadoDocumento
 */
class Documento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'fecha_inicio', 'fecha_cierre', 'estado_documento_id'], 'required'],
            [['descripcion'], 'string'],
            [['fecha_inicio', 'fecha_cierre', 'created_at', 'updated_at'], 'safe'],
            [['estado_documento_id'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['estado_documento_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoDocumento::class, 'targetAttribute' => ['estado_documento_id' => 'id']],
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
            'descripcion' => 'Descripcion',
            'fecha_inicio' => 'Fecha de Inicio',
            'fecha_cierre' => 'Fecha de Cierre',
            'estado_documento_id' => 'Estado',
            'created_at' => 'Fecha de creación',
            'updated_at' => 'Última Actualización',
        ];
    }

    /**
     * Gets query for [[Archivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArchivos()
    {
        return $this->hasMany(Archivo::class, ['id' => 'archivo_id'])->viaTable('documento_archivo', ['documento_id' => 'id']);
    }

    /**
     * Gets query for [[DocumentoArchivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoArchivos()
    {
        return $this->hasMany(DocumentoArchivo::class, ['documento_id' => 'id']);
    }

    /**
     * Gets query for [[EstadoDocumento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoDocumento()
    {
        return $this->hasOne(EstadoDocumento::class, ['id' => 'estado_documento_id']);
    }

    public function getEstadoDocumentoNombreList()
    {
        $estadosDocumento = EstadoDocumento::find()->all();

        $estadosDocumentoList = ArrayHelper::map($estadosDocumento, 'id', 'nombre');

        return $estadosDocumentoList;
    }

    public function getEstadoDocumentoNombre() 
    { 
        return $this->estadoDocumento->nombre; 
    }
}
