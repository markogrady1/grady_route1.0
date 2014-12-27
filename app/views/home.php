<?php
include "../app/views/layouts/main.php";?>






<a class="blog-links" href="blog/show/{$data[0]['id'];}">{$data[0]['title'].PHP_EOL ;}</a>
{$data[0]['id']. PHP_EOL ;}
{$data[0]['content']. PHP_EOL ;}

<?php include '../app/views/layouts/footer.php' ?>
