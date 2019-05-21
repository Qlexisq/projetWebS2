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

function postProject(e) {
    e.preventDefault();

    //Goodie
    let goodiesArray = [].slice.call(document.querySelectorAll("input[type='radio']"));
    let goodie = goodiesArray.find(function (elt) {
        if (elt.checked) {
            return elt;
        }
    });
    let projectGoodieId = goodie.value;

    // Title
    let inputTitle = document.querySelector(".inputProjectTitle");
    let projectTitle = inputTitle.value;

    // Description
    let inputDescription = document.querySelector(".inputProjectDescription");
    let projectDescription = inputDescription.value;

    let url = new URL("php/create-project.php", "http://localhost/projetWebS2/");
    //const form = document.querySelector('form');
    const files = document.querySelector('[type=file]').files;
    const formData = new FormData();

    let file = files[0];
    formData.append('projectPhoto', file);
    formData.append('projectGoodieId', projectGoodieId);
    formData.append('projectTitle', projectTitle);
    formData.append('projectDescription', projectDescription);

    fetch(url, {
        method: 'POST',
        body: formData,
    }).then(response => {
        return response.json();
    }).then(data => {
        console.log(data);
    });
}