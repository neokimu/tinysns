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
</head>
<body>
<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
        <div class="header">
            <h1 class="brand-title">TINY SNS</h1>
            <h2 class="brand-tagline">Shere Your Interests</h2>

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
                <h1 class="content-subhead">popular Post</h1>
                <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
                <!-- A single blog post -->
                <section class="post">
                    <header class="post-header">
                        <img width="48" height="48" alt="Tilo Mitra&#x27;s avatar" class="post-avatar" src="<?= base_url()?>/assets/img/mikey.jpg">
                        
                        <h2 class="post-title">LIKE数が多い人のPOST表示</h2>

                        <p class="post-meta">
                        <button class="modal" type="button">モーダル</button>    
<!--        $(document).on('click','.modal', function() {
        $.ajax({ type: 'POST',
            url: "<?=base_url()?>/main/f_ajax",
            dataType: "json",
            data: {
            "id" : test
            },
            success: function(data) {
           
            },
            error: function(data) {
                alert('error');
            }});-->                        
                            <a class="post-category post-category-js" href="#">LIKE数</a>
                        </p>
                    </header>

                    <div class="post-description">
                        <div class="post-images pure-g">
                            <div class="pure-u-1 pure-u-md-2-3">                              
                                    <img class="pure-img-responsive" src="<?= base_url()?>/assets/img/miso.jpg">
                                <div class="post-image-meta">
                                    <h3>味噌煮込みうどん</h3>
                                </div>
                                <p>味噌煮込みうどんは美味しいかな？ </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="posts">
                <h1 class="content-subhead">Recent Posts</h1>

                <section class="post">
                    <header class="post-header">
                        <img width="48" height="48" alt="Eric Ferraiuolo&#x27;s avatar" class="post-avatar" src="<?= base_url()?>/assets/img/minnie.png">

                        <h2 class="post-title">選択したCATEGORYのPOST（時間順）</h2>

                        <p class="post-meta">
                            By <a class="post-author" href="#">名前(ID)</a>   <a class="post-category post-category-js" href="#">LIKE数</a>
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
                        <img width="48" height="48" alt="Eric Ferraiuolo&#x27;s avatar" class="post-avatar" src="<?= base_url()?>/assets/img/minnie.png">
                        <h2 class="post-title"><?=$this->data[$i]['title']?></h2>
                        <h3><?=$this->data[$i]['p_category']?></h3>
                        <p class="post-meta">
                            By <a class="post-author" href="#"><?=$this->data[$i]['id']?></a>  
                            <a class="post-category post-category-js" href="#"><?=$this->data[$i]['like_num']?></a>
                            <a class="post-category"><?=$this->data[$i]['p_date']?></a>
                        </p>
                    </header>

                    <div class="post-description">
                        <div class="post-images pure-g">
                            <div class="pure-u-1 pure-u-md-2-3">                              
                                <img class="pure-img-responsive" src="<?= base_url()?>/assets/img/<?=$this->data[$i]['p_photo']?>">
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
                        <li class="pure-menu-item"><a href="http://purecss.io/" class="pure-menu-link">About Neo</a></li>
                        <li class="pure-menu-item"><a href="http://twitter.com/" class="pure-menu-link">Twitter</a></li>
                        <li class="pure-menu-item"><a href="" class="pure-menu-link">Information</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
