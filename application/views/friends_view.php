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
        <div>
            <!-- A wrapper for all the blog posts -->
            <div class="posts">
                <h1 class="content-subhead">Friends</h1>
                <?php for ($i = 0; $i < count($this->friends); $i++) :?>
                <section class="post">
                    <header class="post-header">
                        <h2 class="post-title"><?=$this->friends[$i]['id']?></h2>
                        <h2 class="post-title"><?=$this->friends[$i]['email']?></h2>
                        <h2 class="post-title"><?=$this->friends[$i]['m_photo']?></h2>
                        <h2 class="post-title"><?=$this->friends[$i]['profile']?></h2>
                    </header>
                </section>
                <?php endfor ?>
            </div>
            <div class="posts">
                <h1 class="content-subhead">Request Friends</h1>
                <?php for ($i = 0; $i < count($this->request); $i++) :?>
                <section class="post">
                    <header class="post-header">
                        <h2 class="post-title"><?=$this->request[$i]['id']?></h2>
                        <h2 class="post-title"><?=$this->request[$i]['m_photo']?></h2>
                        <h2 class="post-title"><?=$this->request[$i]['profile']?></h2>
                    </header>
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
