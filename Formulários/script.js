// retorna os elementos escolhidos
const nome = document.querySelector("#nome");
const email = document.querySelector("#email");
const telefone = document.querySelector("#telefone");
const nascimento = document.querySelector("#data_nascimento");
const cpf = document.querySelector("#cpf");

//Seleciona o formulario para manipular posteriormente
const form = document.querySelector("form");

//Constante com regex para padronizar as informações coletadas do formulario
const regexNome = /^\w+\s+\w+$/;
const regexEmail = /([a-z0-9\.]{2,})@([a-z0-9]{2,})(\.[a-z]{2,})(\.[a-z]{2,})?/i;
const regexTelefone = /\([0-9]{2}\)\s([0-9]{1})?([0-9]{4}\-[0-9]{4})/;
const regexData = /^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/;
const regexCpf = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;

//Seleciona o span para eu testar a validação 
const erroEmail = document.querySelector("#erroEmail");
const erroTelefone = document.querySelector("#erroTelefone");
const erroData = document.querySelector("#erroData");
const erroCpf = document.querySelector("#erroCpf");
const erroNome = document.querySelector("#erroNome");



//Verifica o que acontece com o submit e da uma função
form.addEventListener('submit', function(event)
{
    //Cancela um comportamento padrao que o navegador teria
event.preventDefault();
console.log(nascimento.value);

// testando se o email digitado está dentro do padrao
    const emailValido = regexEmail.test(email.value);
    if (!emailValido) 
    {
        erroEmail.textContent = "Email fora do padrão";
    } else {
        erroEmail.textContent = "";
    }

// tesando se o telefone segue o padrao 
const telefoneValido = regexTelefone.test(telefone.value);
if (!telefoneValido)
{
    erroTelefone.textContent = "telefone fora do padrão";
} else {
    erroTelefone.textContent = "";
}

// tesando se a data de nascimento segue o padrao 
const dataValida = regexData.test(nascimento.value);
if (!dataValida)
{
    erroData.textContent = "Data fora do padrão";
} else {
    erroData.textContent = "";
}

// tesando se o cpf  segue o padrao 
const cpfValido = regexCpf.test(cpf.value);
if (!cpfValido)
{
    erroCpf.textContent = "CPF fora do padrão";
} else {
    erroCpf.textContent = "";
}


// tesando se o Nome segue o padrao 
const nomeValido = regexNome.test(nome.value);
if (!nomeValido)
{
    erroNome.textContent = "Nome fora do padrão";
} else {
    erroNome.textContent = "";
}

});
