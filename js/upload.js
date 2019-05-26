let input = document.querySelector('#fileUpload');
let label = document.querySelector("#import");


input.addEventListener('change', function(e) {
    //console.log("aaa");
    let oldNode = label.childNodes[0];
    let fileName = '';

    if (this.files && this.files.length > 1)
        alert("Vous ne pouvez pas upload plus d'un seul fichier à la fois");
    else
        fileName = this.files[0].name;
    //console.log(fileName);
    if (fileName !== undefined) {
        let node = document.createTextNode(fileName);
        label.replaceChild(node, oldNode);
    }
});