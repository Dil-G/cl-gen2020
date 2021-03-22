function getData(type)  {  
    $.ajax({
        url : "../../src/add_user.php",
        type : "GET",
        data :  {user_type: type},
        success: function(result) 
        {
            userid.value=result;
            username.value=result.substr(0,4)+"/"+result.substr(4);
            pwd.value=result;
        }
    });
}