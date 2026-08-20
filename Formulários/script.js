const nome = document.querySelector("#nome");
const email = document.querySelector("#email");
const telefone = document.querySelector("#telefone");
const nascimento = document.querySelector("#data_nascimento");
const cidade = document.querySelector("#cidade");
const form = document.querySelector("form");
const regexEmail = /([a-z0-9\.]{2,})@([a-z0-9]{2,})(\.[a-z]{2,})(\.[a-z]{2,})?/i;

form.addEventListener('submit', function(event){

    event.preventDefault();

    const nomeValor = nome.value;

    const emailValido = regexEmail.test(email.value);
    console.log(email.value)
    console.log(emailValido)
});
