
window.onload = function () {
    document.getElementById("msg").style.display = "none";
    document.getElementById("showNIC").style.display = "none";

};

function CheckPassword(password, confirmPassword) {

    var anUpperCase = /[A-Z]/;
    var aLowerCase = /[a-z]/;
    var aNumber = /[0-9]/;

    if (password.length < 7 || password.search(anUpperCase) == -1 ||
        password.search(aLowerCase) == -1 || password.search(aNumber) == -1) {
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Password";

        return false;

    }
    else if (password != confirmPassword) {
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Passwords not matched";
        return false;

    } else {

    }

}

function validatePassword(password) {

    var anUpperCase = /[A-Z]/;
    var aLowerCase = /[a-z]/;
    var aNumber = /[0-9]/;

    if (password.length < 7 || password.search(anUpperCase) == -1 ||
        password.search(aLowerCase) == -1 || password.search(aNumber) == -1) {
        document.getElementById("password").style.background = "#FFE5E4";
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("pwd").style.display = "block";
        document.getElementById("pwd").innerHTML = "Invalid Password Format";
        return false;

    } else {
        document.getElementById("password").style.background = "#f1f1f1";
        document.getElementById("password").style.borderColor = "transparent";
        document.getElementById("pwd").style.display = "none";

    }

} function validateConPassword(password) {

    var anUpperCase = /[A-Z]/;
    var aLowerCase = /[a-z]/;
    var aNumber = /[0-9]/;

    if (password.length < 7 || password.search(anUpperCase) == -1 ||
        password.search(aLowerCase) == -1 || password.search(aNumber) == -1) {
        document.getElementById("confirm_password").style.background = "#FFE5E4";
        document.getElementById("confirm_password").style.borderColor = "red";
        document.getElementById("psd").style.display = "block";
        document.getElementById("psd").innerHTML = "Invalid Password Format";
        return false;

    } else {
        document.getElementById("confirm_password").style.background = "#f1f1f1";
        document.getElementById("confirm_password").style.borderColor = "transparent";
        document.getElementById("psd").style.display = "none";

    }

}

function validateUsername(username) {

    var position = username.indexOf("/");
    var anUpperCase = /[A-Z]/;
    var aLowerCase = /[a-z]/;
    var aNumber = /[0-9]/g;


    if (username.length != 10 || username.search(anUpperCase) == -1 || position != 4 || username.match(aLowerCase) || !username.charAt(0).match(anUpperCase) || !username.charAt(1).match(anUpperCase) || !username.charAt(2).match(aNumber) || !username.charAt(3).match(aNumber) || !username.charAt(5).match(aNumber) || !username.charAt(6).match(aNumber) || !username.charAt(7).match(aNumber) || !username.charAt(8).match(aNumber) || !username.charAt(9).match(aNumber)) {
        document.getElementById("username").style.background = "#FFE5E4";
        document.getElementById("username").style.borderColor = "red";
        document.getElementById("uName").style.display = "block";
        document.getElementById("uName").innerHTML = "Invalid Username";
    } else {
        document.getElementById("username").style.background = "#f1f1f1";
        document.getElementById("username").style.borderColor = "transparent";
        document.getElementById("uName").style.display = "none";
        return true;
    }


}

function validate(username, password) {

    var anUpperCase = /[A-Z]/;
    var aLowerCase = /[a-z]/;
    var aNumber = /[0-9]/;
    var position = username.indexOf("/");

    if (username.length < 10 || username.search(anUpperCase) == -1 || position != 4 || username.match(aLowerCase)) {
        document.getElementById("uName").style.display = "block";
        document.getElementById("uName").innerHTML = "Invalid Username";
        return false;

    } else if (password.length < 7 || password.search(anUpperCase) == -1 || password.search(aNumber) == -1) {
      
        document.getElementById("pwd").style.display = "block";
        document.getElementById("pwd").innerHTML = "Invalid Password Format";
        return false;

    }
}


function validateReset(username, email) {

    var anUpperCase = /[A-Z]/;
    var aLowerCase = /[a-z]/;
    var aNumber = /[0-9]/;
    var position = username.indexOf("/");
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (username.length < 10 || username.search(anUpperCase) == -1 || position != 4 || username.match(aLowerCase)) {
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Username";
        return false;

    } else if (email.match(pattern)) {
        document.getElementById("msg").style.display = "none";
        return true;
    } else {
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Email";
        return false;
    }
}


function validateRegistrations() {


    
    var letters = /^[A-Za-z\s]+$/;
  
    //First Name
    var fname = document.getElementById("fname").value;
    if(fname.match(letters)){
        document.getElementById("fname").style.background = "#f1f1f1";
        document.getElementById("fname").style.borderColor = "transparent";
        
    } else {
        document.getElementById("fname").style.background = "#FFE5E4";
        document.getElementById("fname").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Fisrt Name";
    return false;
    }

    //Last Name
    var lname = document.getElementById("lname").value;
    if(lname.match(letters)){
        document.getElementById("lname").style.background = "#f1f1f1";
        document.getElementById("lname").style.borderColor = "transparent";
        
    } else {
        document.getElementById("lname").style.background = "#FFE5E4";
        document.getElementById("lname").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Last Name";
    return false;
    }

    
    var t1 = document.getElementById("t1").checked;
    var t2 = document.getElementById("t2").checked;

    if (t1 == false && t2 == false) {
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Select At least One Type";
        return false;
    }

    var date = document.getElementById("date").value;
    var now = new Date();
    var year = new Date(date);
            
    var thisYear = now.getFullYear();
    var dobYear = year.getFullYear();
            
    var max = 65;
    var min = 18;
            
    var dif = thisYear - dobYear;
    var reg = /^(\d{4})\-(\d{1,2})\-(\d{1,2})$/;
               // var { d1, g1 } = dates();
            
    if (date != '') {
        if (regs = date.match(reg)) {
            if (dif < min || dif > max || dif < 0) {
                document.getElementById("date").style.background = "#FFE5E4";
                document.getElementById("date").style.borderColor = "red";
                document.getElementById("msg").style.display = "block";
                document.getElementById("msg").innerHTML = "Invalid Date of Birth";
                return false;

            } else {
                document.getElementById("date").style.background = "#f1f1f1";
                document.getElementById("date").style.borderColor = "transparent";
            }
        } else {
            document.getElementById("date").style.background = "#FFE5E4";
            document.getElementById("date").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid Date ";
            return false;
        }
    } else {
        document.getElementById("date").style.background = "#FFE5E4";
        document.getElementById("date").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Date ";
        return false;
    }

    function dates() {
        var d1 = new Date('Jul 12 1920');
        var g1 = new Date();
        return { d1, g1 };
    }

    // Validate Email
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    var email = document.getElementById("email").value;
    if (email.match(pattern)) {
        document.getElementById("email").style.background = "#f1f1f1";
        document.getElementById("email").style.borderColor = "transparent";
        document.getElementById("msg").style.display = "none";
    } else {
        document.getElementById("email").style.background = "#FFE5E4";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Email";
        return false;
    }
    // validate NIC
    var nid = /^[0-9]*$/;
    var nic = document.getElementById("nic").value;
    if (nic.length == 10) {
        if (nic.includes("V", 9) == true && nic.charAt(0).match(nid) && nic.charAt(1).match(nid) && nic.charAt(2).match(nid) && nic.charAt(3).match(nid) && nic.charAt(4).match(nid) && nic.charAt(5).match(nid) && nic.charAt(6).match(nid) && nic.charAt(7).match(nid) && nic.charAt(8).match(nid)) {
           
            document.getElementById("nic").style.background = "#f1f1f1";
            document.getElementById("nic").style.borderColor = "transparent";
            document.getElementById("msg").style.display = "none";
            return true;
        } else {
            document.getElementById("nic").style.background = "#FFE5E4";
            document.getElementById("nic").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid NIC";
            return false;
        }
    }

else if (nic.length == 12 && /^\d+$/.test(nic) == true) {

        document.getElementById("nic").style.background = "#f1f1f1";
        document.getElementById("nic").style.borderColor = "transparent";
        document.getElementById("msg").style.display = "none";

    } else {

        document.getElementById("nic").style.background = "#FFE5E4";
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid NIC";
        return false;
    }

    // validate contactNO
    var contactNumber = document.getElementById("contactNo").value;
    var phoneno = /^\+?([0-9]{4})\)?[-. ]?([0-9]{6})$/;
    var phoneno2 = /^\+?([0-9]{3})\)?[-. ]?([0-9]{7})$/;

    if (contactNumber.match(phoneno) || contactNumber.match(phoneno2)) {
        document.getElementById("contactNo").style.background = "#f1f1f1";
        document.getElementById("contactNo").style.borderColor = "transparent";
        document.getElementById("msg").style.display = "none";

    } else {
        document.getElementById("contactNo").style.background = "#FFE5E4";
        document.getElementById("contactNo").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Contact Number";
        return false;

    }
    //address
    var street = document.getElementById("street").value;
    if(street==""){
        document.getElementById("street").style.background = "#FFE5E4";
        document.getElementById("street").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Address";
        return false;
    }else{
            document.getElementById("street").style.background = "#f1f1f1";
            document.getElementById("street").style.borderColor = "transparent";
    } 

    if (userID.length == 9) {
        var userID = document.getElementById("officerid").value;
        if ((userID.charAt(0) == "O" && userID.charAt(1) == "F") || (userID.charAt(0) == "T" && userID.charAt(1) == "C")) {
            document.getElementById("nic").style.background = "#f1f1f1";
            document.getElementById("nic").style.borderColor = "transparent";
        } else {
            document.getElementById("nic").style.background = "#FFE5E4";
            document.getElementById("nic").style.borderColor = "red";
            return false;
        }
    } else {
        document.getElementById("nic").style.background = "#FFE5E4";
        document.getElementById("nic").style.borderColor = "red";
        return false;
    }


}

function validateRegistration() {


    var letters = /^[A-Za-z\s]+$/;
  
    var lname = document.getElementById("lname").value;
    if(lname.match(letters)){
        document.getElementById("lname").style.background = "#f1f1f1";
        document.getElementById("lname").style.borderColor = "transparent";
        
    } else {
        document.getElementById("lname").style.background = "#FFE5E4";
        document.getElementById("lname").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Last Name";
    return false;
    }

    var fname = document.getElementById("fname").value;
    if(fname.match(letters)){
        document.getElementById("fname").style.background = "#f1f1f1";
        document.getElementById("fname").style.borderColor = "transparent";
        
    } else {
        document.getElementById("fname").style.background = "#FFE5E4";
        document.getElementById("fname").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid First Name";
    return false;
    }

    var date = document.getElementById("date").value;
    var reg = /^(\d{4})\-(\d{1,2})\-(\d{1,2})$/;
    var { d1, g1 } = dates();
    var now = new Date(date);

    if (date != '') {
        if (regs = date.match(reg)) {
            if (now.getTime() < d1.getTime() || now.getTime() > g1.getTime()) {
                document.getElementById("date").style.background = "#FFE5E4";
                document.getElementById("date").style.borderColor = "red";
                document.getElementById("msg").style.display = "block";
                document.getElementById("msg").innerHTML = "Invalid Date of Birth";
                return false;

            } else {
                document.getElementById("date").style.background = "#f1f1f1";
                document.getElementById("date").style.borderColor = "transparent";
            }
        } else {
            document.getElementById("date").style.background = "#FFE5E4";
            document.getElementById("date").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid Date ";
            return false;
        }
    } else {
        document.getElementById("date").style.background = "#FFE5E4";
        document.getElementById("date").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Date ";
        return false;
    }

    function dates() {
        var d1 = new Date('Jul 12 1920');
        var g1 = new Date();
        return { d1, g1 };
    }

    var d1 = document.getElementById("d1").checked;
    var d2 = document.getElementById("d2").checked;
    var d3 = document.getElementById("d3").checked;
    var d4 = document.getElementById("d4").checked;
    var d5 = document.getElementById("d5").checked;
    var d6 = document.getElementById("d6").checked;


    if (d1 == false && d2 == false && d3 == false && d4 == false && d5 == false && d6 == false) {
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Select At least One duty";
        return false;
    }


    // Validate Email
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    var email = document.getElementById("email").value;
    if (email.match(pattern)) {
        document.getElementById("email").style.background = "#f1f1f1";
        document.getElementById("email").style.borderColor = "transparent";
        document.getElementById("msg").style.display = "none";
    } else {
        document.getElementById("email").style.background = "#FFE5E4";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Email";
        return false;
    }

    // validate NIC
    var nid = /^[0-9]*$/;
    var nic = document.getElementById("nic").value;
    if (nic.length == 10) {
        if (nic.includes("V", 9) == true && nic.charAt(0).match(nid) && nic.charAt(1).match(nid) && nic.charAt(2).match(nid) && nic.charAt(3).match(nid) && nic.charAt(4).match(nid) && nic.charAt(5).match(nid) && nic.charAt(6).match(nid) && nic.charAt(7).match(nid) && nic.charAt(8).match(nid)) {
            document.getElementById("nic").style.background = "#f1f1f1";
            document.getElementById("nic").style.borderColor = "transparent";
            document.getElementById("msg").style.display = "none";

            return true;
        } else {
            document.getElementById("nic").style.background = "#FFE5E4";
            document.getElementById("nic").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid NIC";
            return false;
        }
    }
    else if (nic.length == 12 && /^\d+$/.test(nic) == true) {

        document.getElementById("nic").style.background = "#f1f1f1";
        document.getElementById("nic").style.borderColor = "transparent";
        document.getElementById("msg").style.display = "none";

    } else {

        document.getElementById("nic").style.background = "#FFE5E4";
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid NIC";
        return false;
    }
    //address
    var street = document.getElementById("street").value;
    if(street==""){
         document.getElementById("street").style.background = "#FFE5E4";
         document.getElementById("street").style.borderColor = "red";
         document.getElementById("msg").style.display = "block";
     document.getElementById("msg").innerHTML = "Invalid Address";
         return false;
    }else{
            document.getElementById("street").style.background = "#f1f1f1";
            document.getElementById("street").style.borderColor = "transparent";
    } 

    // validate contactNO
    var contactNumber = document.getElementById("contactNo").value;
    var phoneno = /^\+?([0-9]{4})\)?[-. ]?([0-9]{6})$/;
    var phoneno2 = /^\+?([0-9]{3})\)?[-. ]?([0-9]{7})$/;

    if (contactNumber.match(phoneno) || contactNumber.match(phoneno2)) {
        document.getElementById("contactNo").style.background = "#f1f1f1";
        document.getElementById("contactNo").style.borderColor = "transparent";
        document.getElementById("msg").style.display = "none";

    } else {
        document.getElementById("contactNo").style.background = "#FFE5E4";
        document.getElementById("contactNo").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Contact Number";
        return false;

    }




}


function validateStudent() {

    var letters = /^[A-Za-z\s]+$/;
    //First Name
    var fname = document.getElementById("fname").value;
    if(fname.match(letters)){
        document.getElementById("fname").style.background = "#f1f1f1";
        document.getElementById("fname").style.borderColor = "transparent";
        
    } else {
        document.getElementById("fname").style.background = "#FFE5E4";
        document.getElementById("fname").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid First Name";
    return false;
    }


    //Middle Name
    var mname = document.getElementById("mname").value;
    if(mname.match(letters) || mname.match("-") ){
        document.getElementById("mname").style.background = "#f1f1f1";
        document.getElementById("mname").style.borderColor = "transparent";
    
    } else {
    document.getElementById("mname").style.background = "#FFE5E4";
    document.getElementById("mname").style.borderColor = "red";
    document.getElementById("msg").style.display = "block";
    document.getElementById("msg").innerHTML = "Invalid Middle name";
    return false;
    }

    //Last Name  
    var lname = document.getElementById("lname").value;
    if(lname.match(letters)){
        document.getElementById("lname").style.background = "#f1f1f1";
        document.getElementById("lname").style.borderColor = "transparent";
        
    } else {
        document.getElementById("lname").style.background = "#FFE5E4";
        document.getElementById("lname").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Last Name";
    return false;
    }

    function dates() {
        var d1 = new Date('Jul 12 1920');
        
        var g1 = new Date();
        return { d1, g1 };
    }
    //Date
    var date = document.getElementById("date").value;
    var now = new Date();
    var year = new Date(date);

    var thisYear = now.getFullYear();
    var dobYear = year.getFullYear();

    var max = 20;
    var min = 5;

    var dif = thisYear - dobYear;
    var reg = /^(\d{4})\-(\d{1,2})\-(\d{1,2})$/;
   // var { d1, g1 } = dates();

    if (date != '') {
        if (regs = date.match(reg)) {
            if (dif < min || dif > max || dif < 0) {
                document.getElementById("date").style.background = "#FFE5E4";
                document.getElementById("date").style.borderColor = "red";
                document.getElementById("msg").style.display = "block";
                document.getElementById("msg").innerHTML = "Invalid Date of Birth";
                return false;

            } else {
                document.getElementById("date").style.background = "#f1f1f1";
                document.getElementById("date").style.borderColor = "transparent";
            }
        } else {
            document.getElementById("date").style.background = "#FFE5E4";
            document.getElementById("date").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid Date ";
            return false;
        }
    } else {
        document.getElementById("date").style.background = "#FFE5E4";
        document.getElementById("date").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Date ";
        return false;
    }

  

        
    //District
    var district = document.getElementById("district").value;
            
    if(district.match(letters)){
            document.getElementById("district").style.background = "#f1f1f1";
            document.getElementById("district").style.borderColor = "transparent";
    } else {
        document.getElementById("district").style.background = "#FFE5E4";
        document.getElementById("district").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
    document.getElementById("msg").innerHTML = "Invalid District";
        return false;
    }

    var city = document.getElementById("city").value;
    if(city.match(letters)){
            document.getElementById("city").style.background = "#f1f1f1";
            document.getElementById("city").style.borderColor = "transparent";
    } else {
        document.getElementById("city").style.background = "#FFE5E4";
        document.getElementById("city").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
    document.getElementById("msg").innerHTML = "Invalid City";
        return false;
    }

    var street = document.getElementById("street").value;

    if(street == ""){
        document.getElementById("street").style.background = "#FFE5E4";
        document.getElementById("street").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
    document.getElementById("msg").innerHTML = "Invalid Street Address";
        return false;
    }
    else {
            document.getElementById("street").style.background = "#f1f1f1";
            document.getElementById("street").style.borderColor = "transparent";
    }


    //Religion
    var religion = document.getElementById("religion").value;
    if(religion.match(letters)){
        document.getElementById("religion").style.background = "#f1f1f1";
        document.getElementById("religion").style.borderColor = "transparent";

    } else {
        document.getElementById("religion").style.background = "#FFE5E4";
        document.getElementById("religion").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Religion";
        return false;
    }


    //Entered Grade
    var number = /^[0-9]*$/;
        
    var grade = document.getElementById("grade").value;
        
    if(grade == "") {
        document.getElementById("grade").style.background = "#FFE5E4";
        document.getElementById("grade").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Grade";
        return false;
    } if(grade.match(number)){
        document.getElementById("grade").style.background = "#f1f1f1";
        document.getElementById("grade").style.borderColor = "transparent";

    }else {
        document.getElementById("grade").style.background = "#FFE5E4";
        document.getElementById("grade").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Grade";
        return false;
    }
        
        // Validate Email
        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        var email = document.getElementById("email").value;
        if (email.match(pattern)) {
            document.getElementById("email").style.background = "#f1f1f1";
            document.getElementById("email").style.borderColor = "transparent";
            document.getElementById("msg").style.display = "none";
        } else {
            document.getElementById("email").style.background = "#FFE5E4";
            document.getElementById("email").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid Email";
            return false;
        }


        // validate contactNO
        var contactNumber = document.getElementById("contactNo").value;
        var phoneno = /^\+?([0-9]{4})\)?[-. ]?([0-9]{6})$/;
        var phoneno2 = /^\+?([0-9]{3})\)?[-. ]?([0-9]{7})$/;

        if (contactNumber.match(phoneno) || contactNumber.match(phoneno2)) {
            document.getElementById("contactNo").style.background = "#f1f1f1";
            document.getElementById("contactNo").style.borderColor = "transparent";
            document.getElementById("msg").style.display = "none";

        } else {
            document.getElementById("contactNo").style.background = "#FFE5E4";
            document.getElementById("contactNo").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid Contact Number";
            return false;

        }

        // validate NIC
        var nid = /^[0-9]*$/;
        var nic = document.getElementById("nic").value;
        if (nic.length == 10) {
            if (nic.includes("V", 9) == true && nic.charAt(0).match(nid) && nic.charAt(1).match(nid) && nic.charAt(2).match(nid) && nic.charAt(3).match(nid) && nic.charAt(4).match(nid) && nic.charAt(5).match(nid) && nic.charAt(6).match(nid) && nic.charAt(7).match(nid) && nic.charAt(8).match(nid)) {
                document.getElementById("nic").style.background = "#f1f1f1";
                document.getElementById("nic").style.borderColor = "transparent";
                document.getElementById("msg").style.display = "none";

            } else {
                document.getElementById("nic").style.background = "#FFE5E4";
                document.getElementById("nic").style.borderColor = "red";
                document.getElementById("msg").style.display = "block";
                document.getElementById("msg").innerHTML = "Invalid NIC";
                return false;
            }
        }

        else if (nic.length == 12 && /^\d+$/.test(nic) == true) {

            document.getElementById("nic").style.background = "#f1f1f1";
            document.getElementById("nic").style.borderColor = "transparent";
            document.getElementById("msg").style.display = "none";

        } else if (nic ==''){
            if(document.getElementById("showNIC").style.display == "none"){
                document.getElementById("nic").style.background = "#FFE5E4";
                document.getElementById("nic").style.borderColor = "red";
            }else if(document.getElementById("showNIC").style.display == "block"){

                document.getElementById("nic").style.background = "#FFE5E4";
                document.getElementById("nic").style.borderColor = "red";
                document.getElementById("msg").style.display = "block";
                document.getElementById("msg").innerHTML = "Invalid NIC";
                return false;
            }
        }else{
            document.getElementById("nic").style.background = "#FFE5E4";
            document.getElementById("nic").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid NIC";
            return false;
        }



}
function validateParent(){

    var letters = /^[A-Za-z\s]+$/;
  

    var pname = document.getElementById("pname").value;
    if(pname.match(letters)){
            document.getElementById("pname").style.background = "#f1f1f1";
            document.getElementById("pname").style.borderColor = "transparent";
            document.getElementById("msg").style.display = "none";
            
    } else {
        document.getElementById("pname").style.background = "#FFE5E4";
        document.getElementById("pname").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
    document.getElementById("msg").innerHTML = "Invalid Parent name";
   
        return false;
    }
        //parent NIc

        var nid = /^[0-9]*$/;
        var pNIC = document.getElementById("pNIC").value;
        if (pNIC.length == 10) {
            if (pNIC.includes("V", 9) == true && pNIC.charAt(0).match(nid) && pNIC.charAt(1).match(nid) && pNIC.charAt(2).match(nid) && pNIC.charAt(3).match(nid) && pNIC.charAt(4).match(nid) && pNIC.charAt(5).match(nid) && pNIC.charAt(6).match(nid) && pNIC.charAt(7).match(nid) && pNIC.charAt(8).match(nid)) {
                document.getElementById("pNIC").style.background = "#f1f1f1";
                document.getElementById("pNIC").style.borderColor = "transparent";
                document.getElementById("msg").style.display = "none";
    
            } else {
                document.getElementById("pNIC").style.background = "#FFE5E4";
                document.getElementById("pNIC").style.borderColor = "red";
                document.getElementById("msg").style.display = "block";
                document.getElementById("msg").innerHTML = "Invalid Gauardian's NIC";
                return false;
            }
        }
    
        else if (pNIC.length == 12 && /^\d+$/.test(pNIC) == true) {
    
            document.getElementById("pNIC").style.background = "#f1f1f1";
            document.getElementById("pNIC").style.borderColor = "transparent";
            document.getElementById("msg").style.display = "none";
    
        } else {
    
            document.getElementById("pNIC").style.background = "#FFE5E4";
            document.getElementById("pNIC").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid Gauardian's NIC";
            return false;
        }

    var occ = document.getElementById("occ").value;
    if(occ.match(letters)){
                document.getElementById("occ").style.background = "#f1f1f1";
                document.getElementById("occ").style.borderColor = "transparent";
                document.getElementById("msg").style.display = "none";
               
        } else {
            document.getElementById("occ").style.background = "#FFE5E4";
            document.getElementById("occ").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Parent Occupation";
            return false;
        }

           //parent contact
    var Pcontact = document.getElementById("Pcontact").value;
    var phoneno = /^\+?([0-9]{4})\)?[-. ]?([0-9]{6})$/;
    var phoneno2 = /^\+?([0-9]{3})\)?[-. ]?([0-9]{7})$/;

    if (Pcontact.match(phoneno) || Pcontact.match(phoneno2)) {
        document.getElementById("Pcontact").style.background = "#f1f1f1";
        document.getElementById("Pcontact").style.borderColor = "transparent";
        document.getElementById("msg").style.display = "none";

    } else {
        document.getElementById("Pcontact").style.background = "#FFE5E4";
        document.getElementById("Pcontact").style.borderColor = "red";
        document.getElementById("msg").style.display = "block";
        document.getElementById("msg").innerHTML = "Invalid Gauardian's Contact Number";
        return false;

    }


        //parent email
        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        var pEmail = document.getElementById("pEmail").value;
        if (pEmail.match(pattern)) {
            document.getElementById("pEmail").style.background = "#f1f1f1";
            document.getElementById("pEmail").style.borderColor = "transparent";
            document.getElementById("msg").style.display = "none";
        } else {
            document.getElementById("pEmail").style.background = "#FFE5E4";
            document.getElementById("pEmail").style.borderColor = "red";
            document.getElementById("msg").style.display = "block";
            document.getElementById("msg").innerHTML = "Invalid Gauardian's Email";
            return false;
        }
    

}

function checkDate(date) {

    var date = document.getElementById("date").value;
    var now = new Date();
    var year = new Date(date);
            
    var thisYear = now.getFullYear();
    var dobYear = year.getFullYear();
            
    var max = 65;
    var min = 18;
            
    var dif = thisYear - dobYear;
    var reg = /^(\d{4})\-(\d{1,2})\-(\d{1,2})$/;
               // var { d1, g1 } = dates();
            
    if (date != '') {
        if (regs = date.match(reg)) {
            if (dif < min || dif > max || dif < 0) {
                document.getElementById("date").style.background = "#FFE5E4";
                document.getElementById("date").style.borderColor = "red";
                return false;

            } else {
                document.getElementById("date").style.background = "#f1f1f1";
                document.getElementById("date").style.borderColor = "transparent";
            }
        } else {
            document.getElementById("date").style.background = "#FFE5E4";
            document.getElementById("date").style.borderColor = "red";
            return false;
        }
    } else {
        document.getElementById("date").style.background = "#FFE5E4";
        document.getElementById("date").style.borderColor = "red";
        return false;
    }

    function dates() {
        var d1 = new Date('Jul 12 1920');
        var g1 = new Date();
        return { d1, g1 };
    }
}

function checkStuDate(date) {

     
    var date = document.getElementById("date").value;
    var now = new Date();
    var year = new Date(date);
            
    var thisYear = now.getFullYear();
    var dobYear = year.getFullYear();
          
    var max = 20;
    var min = 5;
            
    var dif = thisYear - dobYear;
    var reg = /^(\d{4})\-(\d{1,2})\-(\d{1,2})$/;
               // var { d1, g1 } = dates();
            
    if (date != '') {
        if (regs = date.match(reg)) {
            if (dif < min || dif > max || dif < 0) {
                document.getElementById("date").style.background = "#FFE5E4";
                document.getElementById("date").style.borderColor = "red";
                document.getElementById("showNIC").style.display = "none";
                return false;

            } else if( dif >= 15) {
                document.getElementById("date").style.background = "#f1f1f1";
                document.getElementById("date").style.borderColor = "transparent";
                document.getElementById("showNIC").style.display = "block";
                document.getElementById("showNIC").style.borderColor = "transparent";
            }else{
                document.getElementById("date").style.background = "#f1f1f1";
                document.getElementById("date").style.borderColor = "transparent";
                document.getElementById("showNIC").style.display = "none";
            }
        } else {
            document.getElementById("date").style.background = "#FFE5E4";
            document.getElementById("date").style.borderColor = "red";
            document.getElementById("showNIC").style.display = "none";
            return false;
        }
    } else {
        document.getElementById("date").style.background = "#FFE5E4";
        document.getElementById("date").style.borderColor = "red";
        document.getElementById("showNIC").style.display = "none";
        return false;
    }

    function dates() {
        var d1 = new Date('Jul 12 1920');
        var g1 = new Date();
        return { d1, g1 };
    }
}


// function checkDate(date) {

//     var reg = /^(\d{4})\-(\d{1,2})\-(\d{1,2})$/;

//     if (date != '') {
//         if (regs = date.match(reg)) {

//             if (regs[1] < 1902 || regs[1] > (new Date()).getFullYear()) {
//                 alert("Invalid value for year: " + regs[3] + " - must be between 1902 and " + (new Date()).getFullYear());
//                 document.getElementById("date").style.background = "#FFE5E4";
//                 document.getElementById("date").style.borderColor = "red";
//                 return false;
//             } else {
//                 document.getElementById("date").style.background = "#f1f1f1";
//                 document.getElementById("date").style.borderColor = "transparent";
//             }
//         } else {
//             document.getElementById("date").style.background = "#FFE5E4";
//             document.getElementById("date").style.borderColor = "red";
//             return false;
//         }
//     } else {
//         document.getElementById("date").style.background = "#FFE5E4";
//         document.getElementById("date").style.borderColor = "red";
//         return false;
//     }
// }

function validateEmail(email) {

    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;


    if (email.match(pattern)) {
        document.getElementById("email").style.background = "#f1f1f1";
        document.getElementById("email").style.borderColor = "transparent";
        document.getElementById("Em").style.display = "none";
    } else {
        document.getElementById("email").style.background = "#FFE5E4";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("Em").style.display = "block";
        document.getElementById("Em").innerHTML = "Invalid Email";
        return false;
    }
}

function validateEmailP(email) {

    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;


    if (email.match(pattern)) {
        document.getElementById("pEmail").style.background = "#f1f1f1";
        document.getElementById("pEmail").style.borderColor = "transparent";
    } else {
        document.getElementById("pEmail").style.background = "#FFE5E4";
        document.getElementById("pEmail").style.borderColor = "red";
        return false;
    }
}

function contact(input) {

    var phoneno = /^\+?([0-9]{4})\)?[-. ]?([0-9]{6})$/;
    var phoneno2 = /^\+?([0-9]{3})\)?[-. ]?([0-9]{7})$/;
    //var phoneno2 = /^\+?([0-9]{3})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
    // || input.match(phoneno2) 
    if (input.match(phoneno) || input.match(phoneno2)) {
        document.getElementById("contactNo").style.background = "#f1f1f1";
        document.getElementById("contactNo").style.borderColor = "transparent";

    } else {
        document.getElementById("contactNo").style.background = "#FFE5E4";
        document.getElementById("contactNo").style.borderColor = "red";
        return false;

    }
}
function contactP(input) {

    var phoneno = /^\+?([0-9]{4})\)?[-. ]?([0-9]{6})$/;
    var phoneno2 = /^\+?([0-9]{3})\)?[-. ]?([0-9]{7})$/;
    //var phoneno2 = /^\+?([0-9]{3})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
    // || input.match(phoneno2) 
    if (input.match(phoneno) || input.match(phoneno2)) {
        document.getElementById("Pcontact").style.background = "#f1f1f1";
        document.getElementById("Pcontact").style.borderColor = "transparent";

    } else {
        document.getElementById("Pcontact").style.background = "#FFE5E4";
        document.getElementById("Pcontact").style.borderColor = "red";
        return false;
    }
}

function NIC(input) {

    var nid = /^[0-9]*$/;
    if (input.length == 10) {
        if (input.includes("V", 9) == true && input.charAt(0).match(nid) && input.charAt(1).match(nid) && input.charAt(2).match(nid) && input.charAt(3).match(nid) && input.charAt(4).match(nid) && input.charAt(5).match(nid) && input.charAt(6).match(nid) && input.charAt(7).match(nid) && input.charAt(8).match(nid)) {
            document.getElementById("nic").style.background = "#f1f1f1";
            document.getElementById("nic").style.borderColor = "transparent";
            document.getElementById("noNIC").style.display = "none";
            return true;
        } else {
            document.getElementById("nic").style.background = "#FFE5E4";
            document.getElementById("nic").style.borderColor = "red";
            document.getElementById("noNIC").style.display = "none";
            return false;
        }
    } else if (input.length == 12 && /^\d+$/.test(input) == true) {

        document.getElementById("nic").style.background = "#f1f1f1";
        document.getElementById("nic").style.borderColor = "transparent";
        document.getElementById("noNIC").style.display = "none";

    } else if (input ==''){

        document.getElementById("nic").style.background = "#FFE5E4";
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("noNIC").style.display = "block";
        document.getElementById("noNIC").innerHTML = "NIC of the student is not inserted";
        return false;
    }else{
        document.getElementById("nic").style.background = "#FFE5E4";
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("noNIC").style.display = "none";
        return false;
    }

}

function NICp(input) {

    var nid = /^[0-9]*$/;
    if (input.length == 10) {
        if (input.includes("V", 9) == true && input.charAt(0).match(nid) && input.charAt(1).match(nid) && input.charAt(2).match(nid) && input.charAt(3).match(nid) && input.charAt(4).match(nid) && input.charAt(5).match(nid) && input.charAt(6).match(nid) && input.charAt(7).match(nid) && input.charAt(8).match(nid)) {

            document.getElementById("pNIC").style.background = "#f1f1f1";
            document.getElementById("pNIC").style.borderColor = "transparent";
            return true;
        } else {
            document.getElementById("pNIC").style.background = "#FFE5E4";
            document.getElementById("pNIC").style.borderColor = "red";
            return false;
        }
    } else if (input.length == 12 && /^\d+$/.test(input) == true) {

        document.getElementById("pNIC").style.background = "#f1f1f1";
        document.getElementById("pNIC").style.borderColor = "transparent";

    } else {

        document.getElementById("pNIC").style.background = "#FFE5E4";
        document.getElementById("pNIC").style.borderColor = "red";
        return false;
    }

}

function checkLname(input) {

    var letters = /^[A-Za-z]+$/;
  
    if(input == null){
        document.getElementById("lname").style.background = "#FFE5E4";
        document.getElementById("lname").style.borderColor = "red";
        return false;
    }
    else if(input.match(letters)){
            document.getElementById("lname").style.background = "#f1f1f1";
            document.getElementById("lname").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("lname").style.background = "#FFE5E4";
        document.getElementById("lname").style.borderColor = "red";
        return false;
    }


}

function checkFname(input) {

    var letters = /^[A-Za-z]+$/;
 
    if(input== null){
        document.getElementById("fname").style.background = "#FFE5E4";
        document.getElementById("fname").style.borderColor = "red";
        return false;
    }
    else if(input.match(letters)){
            document.getElementById("fname").style.background = "#f1f1f1";
            document.getElementById("fname").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("fname").style.background = "#FFE5E4";
        document.getElementById("fname").style.borderColor = "red";
        return false;
    }

}
function checkMname(input) {

    var letters = /^[A-Za-z\s]+$/;
  
    if(input == null){
        document.getElementById("mname").style.background = "#FFE5E4";
        document.getElementById("mname").style.borderColor = "red";
        return false;
    }
    else if(input.match(letters)){
            document.getElementById("mname").style.background = "#f1f1f1";
            document.getElementById("mname").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("mname").style.background = "#FFE5E4";
        document.getElementById("mname").style.borderColor = "red";
        return false;
    }


}

function checkReligion(input) {

    var letters = /^[A-Za-z\s]+$/;
  
    if(input == null){
        document.getElementById("religion").style.background = "#FFE5E4";
        document.getElementById("religion").style.borderColor = "red";
        return false;
    }
    else if(input.match(letters)){
            document.getElementById("religion").style.background = "#f1f1f1";
            document.getElementById("religion").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("religion").style.background = "#FFE5E4";
        document.getElementById("religion").style.borderColor = "red";
        return false;
    }


}

function checkGrade(input) {

    var number = /^[0-9]*$/;
  
    if(input == ""){
        document.getElementById("grade").style.background = "#FFE5E4";
        document.getElementById("grade").style.borderColor = "red";
        return false;
    }
    else if(input.match(number)){
            document.getElementById("grade").style.background = "#f1f1f1";
            document.getElementById("grade").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("grade").style.background = "#FFE5E4";
        document.getElementById("grade").style.borderColor = "red";
        return false;
    }


}

function checkPname(input) {

    var letters = /^[A-Za-z\s]+$/;
  
    if(input == null){
        document.getElementById("pname").style.background = "#FFE5E4";
        document.getElementById("pname").style.borderColor = "red";
        return false;
    }
    else if(input.match(letters)){
            document.getElementById("pname").style.background = "#f1f1f1";
            document.getElementById("pname").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("pname").style.background = "#FFE5E4";
        document.getElementById("pname").style.borderColor = "red";
        return false;
    }


}
function checkOcc(input) {

    var letters = /^[A-Za-z\s]+$/;
  
    if(input == null){
        document.getElementById("occ").style.background = "#FFE5E4";
        document.getElementById("occ").style.borderColor = "red";
        return false;
    }
    else if(input.match(letters)){
            document.getElementById("occ").style.background = "#f1f1f1";
            document.getElementById("occ").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("occ").style.background = "#FFE5E4";
        document.getElementById("occ").style.borderColor = "red";
        return false;
    }


}

function checkDistrict(input) {

    var letters = /^[A-Za-z\s]+$/;
  
    if(input == null){
        document.getElementById("district").style.background = "#FFE5E4";
        document.getElementById("district").style.borderColor = "red";
        return false;
    }
    else if(input.match(letters)){
            document.getElementById("district").style.background = "#f1f1f1";
            document.getElementById("district").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("district").style.background = "#FFE5E4";
        document.getElementById("district").style.borderColor = "red";
        return false;
    }

}



function checkCity(input) {

    var letters = /^[A-Za-z\s]+$/;
  
    if(input == null){
        document.getElementById("city").style.background = "#FFE5E4";
        document.getElementById("city").style.borderColor = "red";
        return false;
    }
    else if(input.match(letters)){
            document.getElementById("city").style.background = "#f1f1f1";
            document.getElementById("city").style.borderColor = "transparent";
            return true;
    } else {
        document.getElementById("city").style.background = "#FFE5E4";
        document.getElementById("city").style.borderColor = "red";
        return false;
    }

}

function checkStreet(input) {
  
    if(input == ""){
        document.getElementById("street").style.background = "#FFE5E4";
        document.getElementById("street").style.borderColor = "red";
        return false;
    }
    else {
            document.getElementById("street").style.background = "#f1f1f1";
            document.getElementById("street").style.borderColor = "transparent";
            return true;

    }
}