<?php include "../app/views/layouts/main.php"; ?>



<?php

for($i = 0; $i < count($this->data);  $i++) {
    echo $this->data[$i]['title']."<br>";
}

?>
<?php echo $this->data[0]['title']; ?>
<?php echo $this->data[0]['content']; ?>
<?php echo $this->data[0]['id']; ?>
<?php echo $this->data[0]['author']; ?>
<?php include '../app/views/layouts/footer.php' ?>