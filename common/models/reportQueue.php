<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reportQueue".
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $status
 * @property string|null $error_note
 */
class ReportQueue extends \yii\db\ActiveRecord
{
    const STATUS_SUBMITTED = "submitted";
    const STATUS_PENDING = "pending";
    const STATUS_COMPLETED = "completed";
    const STATUS_FAILED = "failed";
    

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reportQueue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['error_note'], 'string'],
            ['status', 'in', 'range' => [self::STATUS_SUBMITTED, self::STATUS_PENDING, self::STATUS_COMPLETED, self::STATUS_FAILED]],
            [['path'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'path' => 'Path',
            'status' => 'Status',
            'error_note' => 'Error Note',
        ];
    }
}
