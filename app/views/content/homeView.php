<?php include "../app/views/layouts/main.php";?>





<a class="blog-links" href="blog/show/<?php echo $this->data[0]['id'] ?>"><?php echo $this->data[0]['id'] ?></a>
<?php echo $this->data[0]['title']; ?>
<?php echo $this->data[0]['content']; ?>
<?php echo $this->data[0]['id']; ?>
<?php echo $this->data[0]['author']; ?>

<?php include '../app/views/layouts/footer.php' ?>
