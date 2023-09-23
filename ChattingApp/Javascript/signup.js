const form = document.querySelector(".signup form"),
continueBtn = document.querySelector(".button input"),
errorText = document.querySelector(".error-txt");

form.onsubmit = (s) => {
   s.preventDefault(); //Preventing form from submitting
}  

continueBtn.onclick = () => {
    // connect to Ajax 
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200){
                let data = xhr.response;
                if (data == "success") {
                    location.href = "users.php";
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    //to send the form data through ajax to php
    let formData = new FormData(form); //creat new formData Object
    xhr.send(formData); //send form data to php 
}