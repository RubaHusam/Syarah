<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "CarListing".
 *
 * @property int $id
 * @property string $title
 * @property string $make
 * @property string $model
 * @property int $year
 * @property float $price
 * @property float $mileage
 * @property string|null $description
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property UserPurchase[] $userPurchases
 */
class CarListing extends \yii\db\ActiveRecord
{
    const STATUS_AVAILABLE = 'available';
    const STATUS_SOLD = 'sold';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'CarListing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'make', 'model', 'year', 'price', 'mileage'], 'required'],
            [['year'], 'integer'],
            [['price', 'mileage'], 'number'],
            [['description'], 'string'],
            ['status', 'in', 'range' => [self::STATUS_AVAILABLE, self::STATUS_SOLD]],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['make', 'model'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'make' => 'Make',
            'model' => 'Model',
            'year' => 'Year',
            'price' => 'Price',
            'mileage' => 'Mileage',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[UserPurchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPurchases()
    {
        return $this->hasMany(UserPurchase::class, ['car_id' => 'id']);
    }
}
