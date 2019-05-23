let errorMessages = document.querySelectorAll(".errorFormProjectMessage");
let errorPseudo = errorMessages[0];
let errorPassword = errorMessages[1];
document.getElementById('button-login').onclick = event =>{
    event.preventDefault();
    errorPassword.innerHTML = "";
    errorPseudo.innerHTML = "";



    const form = document.getElementById("form-login");
    let params = {};
    if(form.pseudo.value) params['pseudo-login'] = form.pseudo.value;
    if(form.password.value) params['password-login'] = form.password.value;
   console.log(params);
    
    
    let url = new URL("/projetWebS2/php/login-connect.php", "http://localhost");
 //   url.search = new URLSearchParams(params);
    console.log(url);

    fetch(url, {method: 'post',
               mode: "same-origin",
                credentials: "same-origin",
                headers: {
                  "Content-Type": "application/json"
                },
                body: JSON.stringify({
                                        pseudoLogin: params['pseudo-login'],
                                        passwordLogin: params['password-login']
                                        
                                    })
                })
        .then(response => {
            console.log(response)
            return response.json();
        }).then(data => {
            switch(data.code){
                case 1:
                    window.location = "http://localhost/projetWebS2/profile.php";
                    break;
                case 2:
                    errorPseudo.innerHTML = data.message;
                    break;
                case 3:
                    errorPassword.innerHTML = data.message;
                    break;
                case 4:
                    alert(data.message);
                    window.location = "http://localhost/projetWebS2/php/login-connect.php";
            }
        });
};