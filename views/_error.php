<?php
?>
<h1><?php echo $exception->getCode() ?> </h1>
<h2>UH OH! You're lost.</h2>
<p>
    <?php echo $exception->getMessage() ?>
</p>
<button class="btn green">HOME</button>