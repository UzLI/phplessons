<?php

use yii\db\Migration;

/**
 * Class m201218_164456_books
 */
class m201218_164456_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable('books', [
			'id'=>$this->primaryKey(),
			'name'=>$this->string(32),
			'id_authors'=>$this->smallInteger(8)
		]);
		$this->alterColumn('books', 'id', $this->smallInteger(8).' NOT NULL AUTO_INCREMENT');
		
		$this ->addForeignKey(
		'book_to_author',
		'books',
		'id_authors',
		'authors',
		'id',
		'CASCADE'
		);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201218_164456_books cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201218_164456_books cannot be reverted.\n";

        return false;
    }
    */
}
