<?php
include "../app/views/layouts/main.php"; ?>

<?php for($num = 0; $num < count($data); $num++) { ?>
    <a class="blog-links" href="blog/show/<?php echo $data[$num]['id']; ?>"><p><?php echo $data[$num]['title'] ; ?></p></a>
    <p><?php echo $data[$num]['id']  ; ?></p>
<?php } ?>

<?php echo $data[0]['title'],'<br>' ; ?>
<?php echo $data[0]['id'],'<br>' ; ?>
<?php echo $data[0]['content'],'<br>' ; ?>
<h1><?php      $data[0]['title']?></h1>

<?php
include "../app/views/layouts/footer.php";