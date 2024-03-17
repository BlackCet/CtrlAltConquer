function validation() {
    if (document.formfill.Username.value == "") {
        document.getElementById("result").innerHTML = "Enter Username*";
        return false;
    }
    else if (document.formfill.Username.value.length < 6) {
        document.getElementById("result").innerHTML = "Atleast six letters";
        return false;
    }
    else if (document.formfill.Email.value == "") {
        document.getElementById("result").innerHTML = "Enter your Email*";
        return false;
    }
    else if (document.formfill.Password.value == "") {
        document.getElementById("result").innerHTML = "Enter your Password*";
        return false;
    }

    else if (document.formfill.Password.value.length<6) {
        document.getElementById("result").innerHTML = "Password must be six digits";
        return false;
    }

    else if (document.formfill.Cpassword.value == "") {
        document.getElementById("result").innerHTML = "Enter confirm Password*";
        return false;
    }

    else if (document.formfill.Cpassword.value!== document.formfill.Password.value) {
        document.getElementById("result").innerHTML = "Password doesn't match";
        return false;
    }
    else if (document.formfill.Cpassword.value==document.formfill.Password.value) {
        popup.classList.add("open-slide");
        return false;
    }

}
// ----------------------------------------------
// var popup=document.getElementById("popup");

// function CloseSlide(){
//     popup.classList.remove("open-slide");
// }
// ----------------------------------------------

function navigateTo(url)
 {
    window.location.href = url;
}