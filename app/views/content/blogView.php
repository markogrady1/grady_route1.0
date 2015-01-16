<?php include "../app/views/layouts/main.php"; ?>
<a href="#top"><span  id="up-btn" class="scroll-top-button"><img src="images/white-up-arrow.png"></span></a>
<?php
for ($i = 0; $i < count($this->data); $i++) {
    echo $this->data[$i]['title'] . "<br>";
}

?>
<?php echo $this->data[0]['title']; ?>
<?php echo $this->data[0]['content']; ?>
<?php echo $this->data[0]['id']; ?>
<?php echo $this->data[0]['author']; ?>
<?php include '../app/views/layouts/footer.php' ?>