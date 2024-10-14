<?php

use yii\db\Migration;

/**
 * Class m241011_124202_create_car_listing_user_purchase_report_queue_tables
 */
class m241011_124202_create_car_listing_user_purchase_report_queue_tables extends Migration
{
    public function safeUp()
    {
        $this->createTable('CarListing', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'make' => $this->string(100)->notNull(),
            'model' => $this->string(100)->notNull(),
            'year' => $this->integer()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'mileage' => $this->decimal(10, 2)->notNull(),
            'description' => $this->text(),
            'status' => "ENUM('available', 'sold') NOT NULL DEFAULT 'available'",
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createTable('userPurchase', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'car_id' => $this->integer()->notNull(),
            'date' => $this->timestamp()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-userPurchase-user_id',
            'userPurchase',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-userPurchase-car_id',
            'userPurchase',
            'car_id',
            'CarListing',
            'id',
            'CASCADE'
        );

        $this->createTable('reportQueue', [
            'id' => $this->primaryKey(),
            'path' => $this->string(255),
            'status' => "ENUM('submitted', 'pending', 'completed', 'failed') NOT NULL DEFAULT 'submitted'",
            'error_note' => $this->text(),
        ]);
    }

    public function safeDown()
    {
        // Drop foreign keys
        $this->dropForeignKey('fk-userPurchase-user_id', 'userPurchase');
        $this->dropForeignKey('fk-userPurchase-car_id', 'userPurchase');

        // Drop tables
        $this->dropTable('CarListing');
        $this->dropTable('userPurchase');
        $this->dropTable('reportQueue');
    }
}
