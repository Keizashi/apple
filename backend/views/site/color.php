<?php

/* @var $apple \common\models\Apple */

?>
<h1> <?= $apple->color ?> </h1>

<p> <?= $apple->appearance_timestamp ?> </p>

<p> <?= date('Y-m-d h:i:s', $apple->appearance_timestamp) ?> </p>