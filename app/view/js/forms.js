function formataNome(){
    let nomeInput = document.querySelector('#nomeInput')
    let nome = document.querySelector('#nomeInput').value;

    //retira os digitos e caracteres especiais
    nome = nome.replace(/[^A-z\s][\\\^]?/g, "")

    //observa se o usuario está entrando com a qntd de chars necessária
    nome.length <= 5 || nome.length == 40 ? nomeInput.classList.add("is-invalid") : nomeInput.classList.remove("is-invalid")
    nome.length > 5 ? nomeInput.classList.add("is-valid") : nomeInput.classList.remove("is-valid")

    return document.querySelector('#nomeInput').value = nome;
}

function formataCPF() {
    let cpfInput = document.querySelector('#cpfInput');
    let cpf = document.querySelector('#cpfInput').value;

    //retira os caracteres indesejados...
    cpf = cpf.replace(/([^\d])/g, "");

    //add os caracteres especiais utilizados pelo cpf
    let cpfFormatado = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");

    //observa se o usuario está entrando com a qntd de chars necessária
    cpf.length <= 10 ? cpfInput.classList.add("is-invalid") : cpfInput.classList.remove("is-invalid");
    cpf.length > 10 ? cpfInput.classList.add("is-valid") : cpfInput.classList.remove("is-valid");


    return document.querySelector('#cpfInput').value = cpfFormatado;
}
