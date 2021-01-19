<?php

namespace app\models;

use Yii;
use app\controllers\BooksController;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $id_authors
 *
 * @property Authors $authors
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_authors'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['id_authors'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['id_authors' => 'id']],
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
            'id_authors' => 'Id Authors',
        ];
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasOne(Authors::className(), ['id' => 'id_authors']);
    }
    public $NameAuthor;
    public function setAuthors() {
        $this->NameAuthor = $this->authors['name'];
        return $this->NameAuthor;
    }
}
