<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CakePHP boilerplate project</title>
    </head>
    <body>
        <ul>
            <li><?php echo $this->Html->link("常看项目信息", 'info'); ?></li>
            <li><?php echo $this->Html->link("访问后台", '/admin/users/home'); ?></li>
        </ul>
    </body>
</html>