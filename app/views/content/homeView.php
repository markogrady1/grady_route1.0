<?php include "../app/views/layouts/main.php"; ?>





<a class="blog-links" href="blog/show/<?php echo $this->data[0]['id'] ?>">The number is <?php echo $this->data[0]['id'] ?></a><br>
<?php echo $this->data[0]['title']; ?><br>
<?php echo $this->data[0]['content']; ?><br>
<?php echo $this->data[0]['id']; ?><br>
<?php echo $this->data[0]['author']; ?><br>

<?php include '../app/views/layouts/footer.php' ?>
