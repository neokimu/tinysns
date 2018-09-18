<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">  
        <link rel="stylesheet" href="assets/css/blog.css">
        <title>welcome to tinySNS</title>
    </head>
    <body>
        <h1>join</h1>
        <?php echo validation_errors(); ?>
    <form method="post" action="join/register">
        
        <label for="id">id</label>    
        <input type="text" id="id" name="id" value="<?php echo set_value('id'); ?>"  placeholder="id">
        <br>
        <label for="password">password</label> 
        <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>"   placeholder="password">
        <br>
        <label for="re_password">password_check</label>
        <input type="password" id="re_password" name="re_password" value="<?php echo set_value('re_password'); ?>"   placeholder="password_check">
        <br>
        <label for="email">e-mail</label>
        <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="email">
        <br>
        <label for="p_photo">profile_photo</label>
        <input type="file" id="p_photo" name="p_photo" value="p_photo" placeholder="p_photo">
        <br>
        <label for="profile">profile</label>     
        <textarea name="profile" rows="5" cols="25"></textarea>
        <br>
        <label for="m_category">category</label>    
        <input type="checkbox" name="m_category" value="1">travel 
        <input type="checkbox" name="m_category" value="2">music 
        <input type="checkbox" name="m_category" value="3">social   
        <input type="checkbox" name="m_category" value="4">technology  
        <input type="checkbox" name="m_category" value="5">food  
        <input type="checkbox" name="m_category" value="6">shoping
        <br>
        <input type="submit" value="join" />
        
    </form>  
    </body>
</html>