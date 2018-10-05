<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a blog page with a list of posts.">
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
<title>Tiny SNS</title>   
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link href="<?= base_url()?>/assets/css/blog.css" rel="stylesheet">
</head>
<body>
<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
        <div class="header">
            <img width="100" height="100" class="post-avatar" src="<?= base_url()?>/assets/img/p_photo/<?=$this->m_photo?>">
            <h1 class="brand-title">TINY SNS</h1>

            <nav class="nav">
                <ul class="nav-list">
                    <br>
                    <li class="nav-item">
                        <a class="pure-button" href="writepost">write post</a>
                    </li>
                    <li class="nav-item">
                        <a class="pure-button" href="mypage"><?=$this->session->userdata('id')?>'s Page</a>
                    </li>                    
                    <li class="nav-item">
                        <br>
                        <a class="pure-button" href="logout"><?=$this->session->userdata('m_category')?>logout</a>
                    </li>
                </ul>               
            </nav>            
        </div>
    </div>
    <div class="content pure-u-1 pure-u-md-3-4">
        <div>
            <!-- A wrapper for all the blog posts -->
            <div class="posts">
                <h1 class="content-subhead">Recent Posts</h1>

                <section class="post">
                    <header class="post-header">
                        <img width="48" height="48" alt="Eric Ferraiuolo&#x27;s avatar" class="post-avatar" src="<?= base_url()?>/assets/img/minnie.png">
                        <h2 class="post-title">選択したCATEGORYのPOST（時間順）</h2>                        
                        <p class="post-meta">
                            By <a class="post-author" href="#">名前(ID)</a>
                        </p>
                    </header>

                    <div class="post-description">
                        <div class="post-images pure-g">
                            <div class="pure-u-1 pure-u-md-2-3">                              
                                    <img class="pure-img-responsive" src="<?= base_url()?>/assets/img/nagoya.jpg">
                                <div class="post-image-meta">
                                    <h3>名古屋CITY</h3>
                                </div>
                                <p>栄は夜景がいいな</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>  
            <div class="posts">
                <h1 class="content-subhead">Recent Posts</h1>
                <?php for ($i = 0; $i < count($this->data); $i++) :?>
                <section class="post">
                    <header class="post-header">
                        <img width="48" height="48" class="post-avatar" src="<?= base_url()?>/assets/img/m_photo/<?=$this->data[$i]['m_photo']?>">
                        <h2 class="post-title"><?=$this->data[$i]['title']?></h2>
                        <h3><?=$this->data[$i]['p_category']?></h3>
                        <p class="post-meta">
                            By <a class="post-author" href="#"><?=$this->data[$i]['id']?></a>&nbsp;&nbsp;<?=$this->data[$i]['p_date']?>
                        </p>
                    </header>
                    <div class="post-description">
                        <div class="post-images pure-g">
                            <div class="pure-u-1 pure-u-md-2-3">                              
                                <img class="pure-img-responsive" src="<?= base_url()?>/assets/img/p_photo/<?=$this->data[$i]['p_photo']?>">
                                <p><?=$this->data[$i]['p_text']?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endfor ?>          
            </div>
            <div class="footer">
                <div class="pure-menu pure-menu-horizontal">
                    <ul>
                        <li class="pure-menu-item"><a href="https://neo-navi.jp/" class="pure-menu-link">About Neo</a></li>
                        <li class="pure-menu-item"><a href="http://twitter.com/" class="pure-menu-link">Twitter</a></li>
                        <li class="pure-menu-item"><a href="" class="pure-menu-link">TOP</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
