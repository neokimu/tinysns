<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a blog page with a list of posts.">
<title>Tiny SNS</title>   
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link href="<?= base_url()?>/assets/css/blog.css" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url()?>/assets/lib/ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
        <div class="header">
            <h1 class="brand-title">TINY SNS</h1>
            <h2 class="brand-tagline">Shere Your Interests</h2>

            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a class="pure-button" href="main">posts view</a>
                    </li>
                    <li class="nav-item">
                        <a class="pure-button" href="mypage"><?=$this->session->userdata('id')?>'s Page</a>
                    </li>
                    <li class="nav-item">
                        <br>
                        <a class="pure-button" href="logout">logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="content pure-u-1 pure-u-md-3-4">
        <h1>write post</h1>
        <?php echo validation_errors(); ?>
        <form action="<?=base_url()?>writepost/post_validation" method="POST" enctype="multipart/form-data">
        <form method="post" action="writepost/write">
            <label for="title">title</label>  
            <input type="text" id="title" name="title" value="<?php echo set_value('title')?>">
            <label for="m_photo">post_photo</label>
            <input type="file" id="p_photo" name="p_photo" value="p_photo" placeholder="p_photo">
            <br><br>
            <textarea id="p_text" name="p_text" value="<?php echo set_value('p_text')?>" rows="10" cols="80">
            </textarea>
            <script>
                CKEDITOR.replace('p_text');
            </script>
            <br>
            <label for="p_category">category</label>    
            <input type="checkbox" name="p_category[]" value="1">travel 
            <input type="checkbox" name="p_category[]" value="2">music 
            <input type="checkbox" name="p_category[]" value="3">social   
            <input type="checkbox" name="p_category[]" value="4">technology  
            <input type="checkbox" name="p_category[]" value="5">food  
            <input type="checkbox" name="p_category[]" value="6">shoping
            <br><br>
            <input type="submit" value="submit">
        </form>       
    </div>
</div>
</body>
</html>
