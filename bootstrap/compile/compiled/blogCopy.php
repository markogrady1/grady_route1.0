<?php
include "../app/views/layouts/main.php"; ?>

<?php for($num = 0; $num < count($data); $num++) { ?>
    <?php echo $data[$num]['title'],  "<br>" ; ?>
    <?php echo $data[$num]['id'],  "<br>" ; ?>

<?php } ?>

<?php echo $data[0]['title'],  "<br>" ; ?>
<?php echo $data[0]['id'],  "<br>" ; ?>
<?php echo $data[0]['content'],  "<br>" ; ?>

<?php echo $data[1]['title'],  "<br>" ; ?>
<?php echo $data[1]['id'],  "<br>" ; ?>
<?php echo $data[1]['content'],  "<br>" ; ?>

<?php echo $data[2]['title'],  "<br>" ; ?>
<?php echo $data[2]['id'],  "<br>" ; ?>
<?php echo $data[2]['content'],  "<br>" ; ?>

<?php echo $data[3]['title'],  "<br>" ; ?>
<?php echo $data[3]['id'],  "<br>" ; ?>
<?php echo $data[3]['content'],  "<br>" ; ?>

<?php
include "../app/views/layouts/footer.php";