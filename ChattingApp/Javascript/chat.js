const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".text-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (s) => {
    s.preventDefault(); //Preventing form from submitting
} 

sendBtn.onclick = () => {
    // connect to Ajax 
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200){
                inputField.value = ""; // clear the text field when insert in database
            }
        }
    }
        //to send the form data through ajax to php
    let formData = new FormData(form); //creat new formData Object
    xhr.send(formData); //send form data to php 
} 

setInterval(() => {
    // connect to Ajax 
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }
    //to send the form data through ajax to php
    let formData = new FormData(form); //creat new formData Object
    xhr.send(formData); //send form data to php 
}, 500); //this function will run frequently after 500ms