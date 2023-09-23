const form = document.querySelector(".login form"),
continueBtn = document.querySelector(".button input"),
errorText = document.querySelector(".error-txt");

form.onsubmit = (s) => {
   s.preventDefault(); //Preventing form from submitting
}  

continueBtn.onclick = () => {
    // connect to Ajax 
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);

                if (data == "success") {
                    location.href = "users.php";
                } else {
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    //to send the form data through ajax to php
    let formData = new FormData(form); //creat new formData Object
    xhr.send(formData); //send form data to php 
}