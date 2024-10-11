<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "UserPurchase".
 *
 * @property int $user_id
 * @property int $car_id
 * @property string $date
 *
 * @property CarListing $car
 * @property User $user
 */
class UserPurchase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userPurchase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id', 'date'], 'required'],
            [['user_id', 'car_id'], 'integer'],
            [['date'], 'safe'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarListing::class, 'targetAttribute' => ['car_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'car_id' => 'Car ID',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(CarListing::class, ['id' => 'car_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
