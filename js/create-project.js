// document ready in ES6
Document.prototype.ready = callback => {
    if (callback && typeof callback === 'function') {
        document.addEventListener("DOMContentLoaded", () => {
            if (document.readyState === "interactive" || document.readyState === "complete") {
                return callback();
            }
        });
    }
};

let sendButton = document.querySelector(".projectSubmitButton");
sendButton.addEventListener("click", postProject);

//Error handling
let dots = document.querySelectorAll(".stepSticker");
let errorMessages = document.querySelectorAll(".errorFormProjectMessage")
let classes = dots[0].getAttribute("class");

function postProject(e) {
    e.preventDefault();
    //Remove previous errors
    for (let i = 0; i < dots.length; i++) {
        dots[i].setAttribute("class", classes);
        errorMessages[i].innerHTML = "";
    }

    //Goodie
    let goodiesArray = [].slice.call(document.querySelectorAll("input[type='radio']"));
    let goodie = goodiesArray.find(function(elt) {
        if (elt.checked) {
            return elt;
        }
    });
    if (goodie === undefined) {
        errorMessages[0].innerHTML = "Please select a goodie";
        dots[0].setAttribute("class", classes + " errorFormProject");
        return false;
    }
    let projectGoodieId = goodie.value;

    //File
    const files = document.querySelector('[type=file]').files;
    if (files.length === 0) {
        dots[1].setAttribute("class", classes + " errorFormProject");
        errorMessages[1].innerHTML = "Please select a design for your project";
        return false;
    }
    let file = files[0];

    // Title
    let inputTitle = document.querySelector(".inputProjectTitle");
    if (inputTitle.value === "") {
        dots[2].setAttribute("class", classes + " errorFormProject");
        errorMessages[2].innerHTML = "Please enter a title for your project";
        return false;
    }
    let projectTitle = inputTitle.value;


    // Description
    let inputDescription = document.querySelector(".inputProjectDescription");
    if (inputDescription.value === "") {
        dots[2].setAttribute("class", classes + " errorFormProject");
        errorMessages[2].innerHTML = "Please enter a description for your project";
        return false;
    }
    let projectDescription = inputDescription.value;


    const formData = new FormData();
    formData.append('projectPhoto', file);
    formData.append('projectGoodieId', projectGoodieId);
    formData.append('projectTitle', projectTitle);
    formData.append('projectDescription', projectDescription);

    let url = new URL("php/create-project.php", "https://imackickstarter.000webhostapp.com/");
    //let url = new URL("php/create-project.php", "http://localhost/projetWebS2/");
    fetch(url, {
        method: 'POST',
        body: formData,
    }).then(response => {
        return response.json();
    }).then(data => {
        let label = document.querySelector("#import");
        let oldNode = label.childNodes[0];
        let node = document.createTextNode("Importer");
        label.replaceChild(node, oldNode);
        /*
        Project created = 1
        Client Step1 error = 2
        Client Step2 error (file error) = 3
        Client Step3 error = 4
        Client Missing info
        Server error = 5
         */
        //console.log(data.Code);
        switch (data.Code) {
            case 1:
                window.location = "https://imackickstarter.000webhostapp.com/project.php";
                //window.location = "http://localhost/projetWebS2/project.php";
                break;
            case 2:
                dots[0].setAttribute("class", classes + " errorFormProject");
                errorMessages[0].innerHTML = data.Message;
                break;
            case 3:
                dots[1].setAttribute("class", classes + " errorFormProject");
                errorMessages[1].innerHTML = data.Message;
                //print error
                break;
            case 4:
                dots[2].setAttribute("class", classes + " errorFormProject");
                errorMessages[2].innerHTML = data.Message;
                break;
            case 5:
                alert("Server error");
                window.location = "https://imackickstarter.000webhostapp.com/project-creation";
                //window.location = "http://localhost/projetWebS2/project-creation";
                break;
        }
        //console.log(data);
    });
}