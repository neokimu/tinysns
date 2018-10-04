<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a blog page with a list of posts.">
    <title>Welcome Tiny SNS!</title>   
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
                <form method="post" action="login">
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <label>ID
                            <input type="text" id="id" name="id">
                            </label>
                        </li>
                        <li class="nav-item">
                            <label>PASSWORD</label>
                            <input type="password" id="password" name="password">
                        </li>  
                        <li>
                            <br>
                            <a href="/tinysns/join"><input type="button" value="join"></a>
                            <input type="submit" value="login">
                        </li>
                    </ul>               
                </nav>
                </form>
            </div>
        </div>
    </div>    
    <div>  
        <img src= "<?= base_url()?>/assets/img/welcome.jpg" width=100% height=100%>
    <div>      
    </body>
</html>
