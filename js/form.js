document.getElementById('button-register').onclick = event =>{
    event.preventDefault();
    
    const form = document.getElementById("form-register");
    let params = {};
    if(form.name.value) params['name-register'] = form.name.value;
    if(form.firstname.value) params['firstname-register'] = form.firstname.value;
    if(form.pseudo.value) params['pseudo-register'] = form.pseudo.value;
    if(form.mail.value) params['mail-register'] = form.mail.value;
    if(form.password.value) params['password-register'] = form.password.value;
    
    let url = new URL("/projetWebS2/php/insert-register.php", "http://localhost");
    url.search = new URLSearchParams(params);
    console.log(url);
};