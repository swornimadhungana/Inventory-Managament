const password = document.getElementById("password");
const cpassword = document.getElementById("cpassword");
const message = document.getElementById("message");
const validate=()=> {
    if (password.value != cpassword.value){
    message.innerText = "Passwords do not match!";
    return false;
    }
    if(password.value.length < 6){
    message.innerText = "Password length is not enough!";
    return false;
    }
}