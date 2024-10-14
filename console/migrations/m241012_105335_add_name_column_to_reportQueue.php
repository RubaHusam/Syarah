<?php

use yii\db\Migration;

/**
 * Class m241012_105335_add_name_column_to_reportQueue
 */
class m241012_105335_add_name_column_to_reportQueue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%reportQueue}}', 'name', $this->string(255)->notNull()->after('id'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%reportQueue}}', 'name');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241012_105335_add_name_column_to_reportQueue cannot be reverted.\n";

        return false;
    }
    */
}
