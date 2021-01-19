<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h2>Авторы и их книги</h2>
    <ul>
    <?foreach ($authors as $author):?>
      <li> <?echo $author->name  ?></li>
    <?foreach ($author->books as $books):?>
    <ul><li><?echo $books->name?></li></ul>
    <? endforeach;?>
    <? endforeach;?>
    </ul>

</div>
