<?php
include "../app/views/layouts/main.php"; ?>

{{for($num = 0; $num < count($data); $num++)}}
    <a class="blog-links" href="blog/show/{$data[$num]['id'];}"><p>{$data[$num]['title'] ;}</p></a>
    <p>{$data[$num]['id']  ;}</p>
{{endfor}}

{$data[0]['title'] . PHP_EOL ;}
{$data[0]['id'] . PHP_EOL ;}
{$data[0]['content'] . PHP_EOL ;}


<?php
include "../app/views/layouts/footer.php";