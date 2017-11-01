<?php
require 'classes/Db.php';

$db = new Db();

$comments = $db->getAllComments();
?>
<html>
<head>
    <title>Test</title>
    <link href="/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/web/css/app.css" rel="stylesheet">
</head>
<body>
<div class="head">
    <div class="container">
        <div class="row logo">
            <img src="/web/img/logo.png" alt="">
        </div>
        <div class="row header-block">
            <img src="/web/img/header_img.png" alt="">
        </div>
        <div class="row form-block">
            <form class="add_comment_form">
                <div class="form-group">
                    <div class="form-group col-sm-6">
                        <div class="form-group">
                            <label for="name" class="required_input">Имя</label>
                            <input type="text" class="form-control" id="name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="required_input">E-Mail</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="form-group">
                            <label for="comment" class="required_input">Комментарий</label>
                            <textarea class="form-control" id="comment" name="comment" rows=5></textarea>
                        </div>
                    </div>
                    <div class="form-group col-sm-2 col-sm-offset-10">
                        <input type="submit" class="form-control" value="Записать">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row comments-block-text">
            <p>Выводим комментарии</p>
        </div>
        <div class="row comments-block">
            <?php foreach($comments as $key => $comment):?>
                <?php require 'view/comment_block.php'?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 logo">
                <img src="/web/img/logo.png" alt="">
            </div>
            <div class="col-xs-4 col-md-2 col-xs-offset-4 col-md-offset-6">
                <div class="soc_circle">
                    <span class="fa fa-facebook" aria-hidden="true"></span>
                </div>
                <div class="soc_circle">
                    <span class="fa fa-vk" aria-hidden="true"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/web/js/app.js"></script>
</body>
</html>