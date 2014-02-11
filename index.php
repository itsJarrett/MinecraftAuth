<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MinecraftAuth (Minecraft v1.7.4) Session Login Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A simple way to simulate the Mojang Authentication system.">
        <meta name="author" content="stuntguy3000">
        
        <style>
        .circular {
			border-radius: 5px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			box-shadow: 0 0 5px rgba(0, 0, 0, .8);
			-webkit-box-shadow: 0 0 5px rgba(0, 0, 0, .8);
			-moz-box-shadow: 0 0 5px rgba(0, 0, 0, .8);
		}
		</style>
        
        <link href="http://stuntguy3000.me/resources/css/bootstrap.css" rel="stylesheet" media="screen">
		
	</head>
    
    <body>
		<div class="container">
            <br>
            <center><h2 class="muted">Minecraft Authentication Session Login Simulator</h2><h3>Source: https://github.com/stuntguy3000/MinecraftAuth</h3></center>
            <hr>
            <pre>[stuntguy3000] Chester do you like my auth sim? http://auth.stuntguy3000.me/
[Chester] Hmm seems pretty decent
[stuntguy3000] YES APPROVAL</pre><div class="alert alert-info fade in">
                <strong>We respect privacy.</strong> We <strong>do <u>not</u></strong> save <strong>any</strong> information that you enter below. This form simply POST's the data to the official <strong>Mojang Authentication servers</strong>, through <strong>Ajax</strong>.
                <br><br><i>Also..</i><br><br>
                <p>This code example/demonstration which is designed to test how the Mojang Auth system works. Think of this as a simulation of the launcher.<br>
                <br> <strong>- Do not</strong> give out any of the information you receive while using this system. 
                <strong>Especially</strong> the Token Key. If you release your Token key then it is possible for anyone to login (as you) using that key, 
                as this system is designed to bypass the login section of the new Minecraft launcher.
                <br><br> - This system is experimental and is <strong>not</strong> intended for actual use.
                This is designed for developers to mess around.
                <br><br><strong>You should understand that this system is an experiment, and can be used in dark, scary and pure evil ways.</strong>
                <br></p></div><br>
            
            <div id="responce"></div>
            <form class="form-horizontal" id="loginForm">
                <div class="control-group">
                    <label class="control-label">Minecraft Username</label>
                    <div class="controls">
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Minecraft Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                
                <div class="control-group" id="tokenGroup" name="tokenGroup">
                    <label class="control-label">Client Token</label>
                    <div class="controls">
                        <input type="text" id="clientToken" name="clientToken" placeholder="Client Token" value="MinecraftIsAwesome">
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" id="debug" name="debug"> Debug mode?
                        </label>
                    </div>
                </div>
            
                <div class="control-group">
                    <div class="controls">
                        <div class="btn-group">
                            <input type="submit" id="loginButton" class="btn btn-primary" value="Login to Minecraft">
                        </div>
                        
                    </div>
                </div>
            </form>
		</div>
        
        <script src="//code.jquery.com/jquery-latest.js"></script>
        <script src="http://stuntguy3000.me/resources/js/bootstrap.js"></script>
        
        <script>
            $(document).ready(function(){
                $("#debug").click( function(){
                    if( $(this).is(':checked') ) {
                        $('#tokenGroup').fadeIn();
                    } else {
                        $('#tokenGroup').fadeOut();
                    }
                        
                });
                
                $("#loginForm").submit(function() {
                    $('#loginButton').val('Logging in...');
                    $('#loginButton').addClass('disabled');
                            
                    $('#responce').fadeOut(function() {
                        $.post("post.php", $("#loginForm").serialize(), function(data){
                            $('#responce').html(data);
                            $('#loginButton').val('Login to Minecraft');
                            $('#loginButton').removeClass('disabled');
                            $('#responce').fadeIn();
                        });
                    });
                    return false;
                });
                
                $('#tokenGroup').hide();
                $('#responce').hide();
                $('#userimg').hide();
            });
        </script>
    </body>
</html>
