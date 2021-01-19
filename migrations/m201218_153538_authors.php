<?php

use yii\db\Migration;

/**
 * Class m201218_153538_authors
 */
class m201218_153538_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable('authors', [
			'id'=>$this->primaryKey(),
			'name'=>$this->string(32)
		]);
		$this->alterColumn('authors', 'id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201218_153538_authors cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201218_153538_authors cannot be reverted.\n";

        return false;
    }
    */
}
