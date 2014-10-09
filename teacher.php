<?php

?>

<!doctype html>
<html>
    <head>
       <?php include 'head.php'; ?> 
        <script language="javascript">
        $(function() { 
        
        var Credentials = Backbone.Model.extend({});

        var LoginView = Backbone.View.extend({
            
            events: {
                "click #login": "login"
            },

            initialize: function(){
            var self = this;
            
            this.render();

            this.username = $("#username");
            this.password = $("#password");

            this.username.change(function(e){
                self.model.set({username: $(e.currentTarget).val()});
            });

            this.password.change(function(e){
                self.model.set({password: $(e.currentTarget).val()});
            });
            },
                    
             render: function(){
                var template = _.template( $("#login_template").html(), {} );
                this.el.html( template );
            },

            login: function(event){
                var user= this.model.get('username');
                var pword = this.model.get('password');
                var self = this;
                event.preventDefault();
                $.ajax({
                    url:'api/login.php',
                    type:'POST',
                    dataType:"json",
                    data: {username: user, password: pword, type: 'authenticate' },
                    success:function (data) {

                        if(data.error) {  
                            alert(data.error.text);
                        }
                        else { 
                            window.location.replace('#slotter');
                            self.remove();
                        }
                    }
                });
            }
        });

        window.LoginView = new LoginView({
            model: new Credentials(),
            el: $("#login_container") 
        });
        
        var SlotView = Backbone.View.extend({
            
        });            
        
        });
        </script>
        
        <script type="text/template" id="login_template">
            <form action="login.php">
            Username: <input type="text" id="username"><br>
            Password: <input type="password" id="password"><br>
            <button id="login">Login</button>
            </form>
        </script>
        
        <script type="text/template" id="slot_template">
            <form action="lockSlot.php">
            
            </form>
        </script>
        
    </head>
    <body>
        <div id="login_container"></div>
        <div id="slot_container"></div>
    </body>
</html>