/* Este SCRIPT foi gerado pela IA para poupar tempo, apenas para validação didática */

document.getElementById('form').addEventListener('submit', function (e) {
    let valido = true;

    // REGEX
    const regexNome = /^[A-Za-zÀ-ÿ\s]{3,}$/;
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const regexCep = /^[0-9]{5}-?[0-9]{3}$/;

    // CAMPOS
    const nome = document.getElementById('nome');
    const email = document.getElementById('email');
    const cep = document.getElementById('cep');
    const rua = document.getElementById('rua');
    const bairro = document.getElementById('bairro');
    const cidade = document.getElementById('cidade');
    const estado = document.getElementById('estado');

    // ERROS INDIVIDUAIS
    const erroNome = document.getElementById('erro-nome');
    const erroEmail = document.getElementById('erro-email');
    const erroCep = document.getElementById('erro-cep');
    const erroRua = document.getElementById('erro-rua');
    const erroBairro = document.getElementById('erro-bairro');
    const erroCidade = document.getElementById('erro-cidade');
    const erroEstado = document.getElementById('erro-estado');

    // MENSAGEM GERAL
    const mensagem = document.getElementById('mensagem');

    // LIMPA ERROS
    document.querySelectorAll('.erro').forEach(el => el.innerText = '');
    mensagem.innerText = '';
    mensagem.classList.remove('erro-geral', 'sucesso');

    // VALIDA NOME
    if (!regexNome.test(nome.value.trim())) {
        erroNome.innerText = 'Nome inválido (mínimo 3 letras)';
        valido = false;
    }

    // VALIDA EMAIL
    if (!regexEmail.test(email.value.trim())) {
        erroEmail.innerText = 'Email inválido';
        valido = false;
    }

    // VALIDA CEP
    if (!regexCep.test(cep.value.trim())) {
        erroCep.innerText = 'CEP deve conter 8 números';
        valido = false;
    }

    // CAMPOS OBRIGATÓRIOS
    if (rua.value.trim() === '') {
        erroRua.innerText = 'Rua é obrigatória';
        valido = false;
    }

    if (bairro.value.trim() === '') {
        erroBairro.innerText = 'Bairro é obrigatório';
        valido = false;
    }

    if (cidade.value.trim() === '') {
        erroCidade.innerText = 'Cidade é obrigatória';
        valido = false;
    }

    if (estado.value.trim() === '') {
        erroEstado.innerText = 'Estado é obrigatório';
        valido = false;
    }

    // RESULTADO FINAL
    if (!valido) {
        e.preventDefault();
        mensagem.innerText = 'Preencha todos os campos corretamente';
        mensagem.classList.add('erro-geral');
    } else {
        mensagem.innerText = 'Cadastro realizado com sucesso!';
        mensagem.classList.add('sucesso');
    }
});


// =============================
// AUTO PREENCHIMENTO VIA CEP
// =============================

document.getElementById('cep').addEventListener('input', function () {
    let cep = this.value.replace(/\D/g, '');

    if (cep.length === 8) {
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(r => r.json())
            .then(d => {
                if (d.erro) {
                    document.getElementById('erro-cep').innerText = 'CEP inválido';
                    return;
                }

                document.getElementById('rua').value = d.logradouro;
                document.getElementById('bairro').value = d.bairro;
                document.getElementById('cidade').value = d.localidade;
                document.getElementById('estado').value = d.uf;
            });
    }
});