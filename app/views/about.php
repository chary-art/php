<?php
use function Tamtamchik\SimpleFlash\flash;
?>
<?php $this->layout('layout', ['title' => 'User Profile']) ?>

<?= flash()->display(); ?>
<h1>About Page</h1>

<div class="alert alert-primary" role="alert">
    A simple primary alert—check it out!
</div>
<p><?=$this->e($name)?></p>