$(document).ready(function () {

    $("#do-login").click(function () {
        let user_name = $("#username").val();
        let password = $("#password").val();
        let msg = $("#msg");

        if (user_name === "") {
            msg.show();
            msg.text("Enter Your User Name").css("color", "red");
            return;
        }
        if (password === "") {
            msg.show();
            msg.text("Enter Your Password").css("color", "red");
            return;
        }
        
        if (user_name !== "" && password !== "") {
            msg.hide();
            
            jQuery.ajax({
                type: 'post',
                url: 'log_in_data.php',
                data: "user_name="+user_name+"&password="+password,
                success: function (result) {
                    if(result === "success"){
                        setTimeout(() => {
                            msg.show();
                            msg.text("Welcome").css("color", "#fe6f27");
                            setTimeout(()=>{
                                window.location.assign("index.php");
                            },2000);
                        }, 800);
                    }else{
                        msg.show();
                        msg.text("Incorrect username or password.").css("color", "red");
                    }
                   
                }
            });
        }
    });

});