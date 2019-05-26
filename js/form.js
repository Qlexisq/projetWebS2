document.getElementById('button-register').onclick = event => {
    event.preventDefault();

    // Collect data of the form register
    const form = document.getElementById("form-register");
    let params = {};
    if (form.name.value) params['name-register'] = form.name.value;
    if (form.firstname.value) params['firstname-register'] = form.firstname.value;
    if (form.pseudo.value) params['pseudo-register'] = form.pseudo.value;
    if (form.mail.value) params['mail-register'] = form.mail.value;
    if (form.password.value) params['password-register'] = form.password.value;
    //console.log(params);

    // Send data to the insert-register.php file
    let url = new URL("php/insert-register.php", "https://imackickstarter.000webhostapp.com/");

    //console.log(url);

    // Use the method POST to send data
    fetch(url, {
            method: 'post',
            mode: "same-origin",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                nameRegister: params['name-register'],
                firstnameRegister: params['firstname-register'],
                pseudoRegister: params['pseudo-register'],
                mailRegister: params['mail-register'],
                passwordRegister: params['password-register']
            })
        })
        .then(response => {
            //console.log(response)
            return response.json();
        }).then(data => {
            //console.log(data);
            if (data.code == 1) {
                window.location = "https://imackickstarter.000webhostapp.com/login.php";
                // window.location =  "http://localhost/projetWebS2/profile.php";
            }
            if (data.code == 3) {
                alert("Email not valid");
                window.location = "https://imackickstarter.000webhostapp.com/register.php";
                // window.location =  "http://localhost/projetWebS2/profile.php";
            } else {
                alert(data.Message);
                window.location = "https://imackickstarter.000webhostapp.com/register.php";
                // window.location = "http://localhost/projetWebS2/register.php";
            }
        });
};