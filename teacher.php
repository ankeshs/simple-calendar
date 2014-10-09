<?php

?>

<!doctype html>
<html>
    <head>
       <?php include 'head.php'; ?> 
        <script language="javascript">
        $(function(){ /*
        var SomeModel = Backbone.Model.extend({});

        someModel = new SomeModel();
        someModel.bind("change", function(model, collection){
            alert("You set some_attribute to " + model.get('some_attribute'));
        });

        someModel.set({some_attribute: "some value"}); */

        var Credentials = Backbone.Model.extend({});

        var LoginView = Backbone.View.extend({
        el: $("#login-form"),

        events: {
        "click #login": "login"
        },

        initialize: function(){
        var self = this;

        this.username = $("#username");
        this.password = $("#password");

        this.username.change(function(e){
        self.model.set({username: $(e.currentTarget).val()});
        });

        this.password.change(function(e){
        self.model.set({password: $(e.currentTarget).val()});
        });
        },

        login: function(event){
        var user= this.model.get('username');
        var pword = this.model.get('password');
        
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
                    window.location.replace('#');
                }
            }
        });
        }
        });

        window.LoginView = new LoginView({model: new Credentials()});
        });
        </script>
    </head>
    <body>
        <form action="/login" id="login-form">
        Username: <input type="text" id="username"><br>
        Password: <input type="password" id="password"><br>
        <button id="login">Login</button>
        </form>
    </body>
</html>