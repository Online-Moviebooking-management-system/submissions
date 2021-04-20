$(document).ready(function () {


    $("#UID").blur(function () {
        var uid = $(this).val();

        if (uid.length == 0)
            $("#erruid").html("Please Enter Name").addClass("text-danger");
        else
            $("#erruid").html("").removeClass("text-danger");

    });
    //--------------------------------------------------------
    $("#UPWD").blur(function () {
        var pwd = $(this).val();
        if (pwd.length == 0)
            $("#errpwd").html("Please Enter Password").addClass("text-danger");
        else {
            var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
            var bln = r.test(pwd);
            if (bln == true)
                $("#errpwd").html("").removeClass("text-danger");
            else {
                $("#errpwd").html("Please Enter Valid Password").addClass("text-danger");
                alert("Please Enter Cap-small-digit-spl");
            }
        }
    });
    //------------------------------------------------------------------------------
    $("#UMOB").blur(function () {
        var val = $(this).val();
        if (val.length == 0)
            $("#errmob").html("Please Enter Mobile No.").addClass("text-danger");
        else {
            var r = /^[6-9]{1}[0-9]{9}$/;
            var bln = r.test(val);
            if (bln == true)
                $("#errmob").html("").removeClass("text-danger");
            else
                $("#errmob").html("Please Enter Valid Mobile No.").addClass("text-danger");

        }
    });

    //--------------------------------------------------------------------------------
    $("#UMAIL").blur(function () {

        var email = $(this).val();

        if (email.length == 0)
            $("#errmail").html("Please Enter Email").addClass("text-danger");
        else {
            var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

            if (re.test(email))
                $("#errmail").html("").removeClass("text-danger");
            else {
                $("#errmail").html("Please Enter a Valid Email").addClass("text-danger");
                return;
            }

            $.get("ajax-checkmail.php?email=" + email, function (response) {
                response = response.trim();
                $("#errmail").html(response);

                if (response == "Unavailable") {
                    /* alert();*/
                    $("#errmail").removeClass("text-success").addClass("text-danger");

                } else {
                    $("#errmail").removeClass("text-danger").addClass("text-success");
                }
            });
        }

    });
    //------------------------------------------------------------------------------
    $("#signup").click(function () {

        if ($("#UID").val().length == 0 || $("#UPWD").val().length == 0 || $("#UMOB").val().length == 0 || $("#UMAIL").val().length == 0)
            alert("Fill the Required Data");
        else
        if ($("#erruid").html() != "" || $("#errpwd").html() != "" || $("#errmob").html() != "" || $("#errmail").html() != "Available")
            alert("Enter the Given Fields Properly");
        else {
            var name = $("#UID").val();
            var mob = $("#UMOB").val();
            var pwd = $("#UPWD").val();
            var email = $("#UMAIL").val();

            //alert(name + mob + pwd + email);

            $.get("ajax-signup.php?name=" + name + "&mob=" + mob + "&pwd=" + pwd + "&email=" + email, function (response) {
                alert(response);
            });

            $("#UID").val("");
            $("#UMOB").val("");
            $("#UPWD").val("");
            $("#UMAIL").val("");
            $("#errmail").html("");

        }
    });

    //-------------------------------------------------------------------------------

    $("#UIDL").blur(function () {
        var uid = $(this).val();
        if (uid.length == 0)
            $("#errmaill").html("Please Enter user Id").addClass("text-danger");
        else {
            $("#errmaill").html("").removeClass("text-danger");
            $.get("ajax-checkmail.php?email=" + uid, function (response) {
                
                response = response.trim();
                //alert(response.trim());
                if (response != "Unavailable") {

                    
                    $("#errmaill").html("Invalid").removeClass("text-success").addClass("text-danger");

                } else {
                    $("#errmaill").html("Ok").removeClass("text-danger").addClass("text-success");
                }
            });
        }

    });
    
    //------------------------------------------
    
    $("#UPWDL").blur(function () {
        var pwd = $(this).val();
        if (pwd.length == 0)
            $("#errpwdl").html("Please Enter Password").addClass("text-danger");
        else
            $("#errpwdl").html("").removeClass("text-danger");
            
    });
    
    //--------------------------------------------------------
    
    $("#login").click(function(){
        
        var email = $("#UIDL").val();
        var pwd = $("#UPWDL").val();
        
        if(email.length==0 || pwd.length==0)
            alert("Please FIll the Data");
        else
            if($("#errmaill").html() != "Ok" || $("#errpwdl").html() != "")
                alert("Enter the Data Properly");
        else
        {
            $.getJSON("json-login.php?email="+email,function(arry){
                
                if(arry[0].pwd == pwd)
                    window.location="movies.php";
                else
                    alert("Invalid Login! Check password and Retry!");
            });
                
        }
    });


});
