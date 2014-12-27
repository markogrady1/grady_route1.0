<?php
include "../app/views/layouts/main.php";?>






<a class="blog-links" href="show/<?php echo $data[0]['id']; ?>"><?php echo $data[0]['title'],'<br>' ; ?></a>
<?php echo $data[0]['id'],'<br>' ; ?>
<?php echo $data[0]['content'],'<br>' ; ?>

<?php include '../app/views/layouts/footer.php' ?>
