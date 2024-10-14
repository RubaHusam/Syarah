<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property int $car_id
 * @property string $name
 * @property string $path
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property CarListing $car
 */
class Images extends \yii\db\ActiveRecord
{
    public $imageFiles;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'name', 'path'], 'required'],
            [['car_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'path'], 'string', 'max' => 255],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarListing::class, 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'name' => 'Name',
            'path' => 'Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function countImagesByCarListing($carListingId)
    {
        return self::find()->where(['car_id' => $carListingId])->count();
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasMany(CarListing::class, ['id' => 'car_id']);
    }
}
