<?php $this->layout('layout', ['title' => 'User Profile'])?>



<?php foreach($posts as $post): ?>
    <?php echo $post['title'] . '<br>'; ?>
<?php endforeach; ?>

