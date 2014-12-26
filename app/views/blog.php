<?php
include "../app/views/layouts/main.php"; ?>

{{for($num = 0; $num < count($data); $num++)}}
    {$data[$num]['title'],  "<br>" ;}
    {$data[$num]['id'],  "<br>" ;}

{{endfor}}

{$data[0]['title'],  "<br>" ;}
{$data[0]['id'],  "<br>" ;}
{$data[0]['content'],  "<br>" ;}

{$data[1]['title'],  "<br>" ;}
{$data[1]['id'],  "<br>" ;}
{$data[1]['content'],  "<br>" ;}

{$data[2]['title'],  "<br>" ;}
{$data[2]['id'],  "<br>" ;}
{$data[2]['content'],  "<br>" ;}

{$data[3]['title'],  "<br>" ;}
{$data[3]['id'],  "<br>" ;}
{$data[3]['content'],  "<br>" ;}

<?php
include "../app/views/layouts/footer.php";