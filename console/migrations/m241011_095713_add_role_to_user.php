<?php

use yii\db\Migration;

/**
 * Class m241011_095713_add_role_to_user
 */
class m241011_095713_add_role_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'role', $this->string()->defaultValue('buyer')->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241011_095713_add_role_to_user cannot be reverted.\n";

        return false;
    }
    */
}
