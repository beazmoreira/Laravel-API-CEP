<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
    @vite('resources/js/script.js')
</head>

<body>
    <nav>
        <form method='POST' action='/usuario/salvar' id="form">
            @csrf
            <h1>CADASTRO</h1>
            <div class="center">
                <label for="nome">Nome:</label>
                <input type='text' name='nome' id="nome">
                <span class="erro" id="erro-nome"></span>
            </div>

            <div class="center">
                <label for="email">Email:</label>
                <input type='text' name='email' id="email">
                <span class="erro" id="erro-email"></span>
            </div>

            <div class="center">
                <label for="cep">CEP:</label>
                <input type='text' name='cep' id="cep">
                <span class="erro" id="erro-cep"></span>
            </div>

            <div class="center">
                <label for="rua">Rua:</label>
                <input type='text' name='rua' id="rua">
                <span class="erro" id="erro-rua"></span>
            </div>

            <div class="center">
                <label for="bairro">Bairro:</label>
                <input type='text' name='bairro' id="bairro">
                <span class="erro" id="erro-bairro"></span>
            </div>

            <div class="center">
                <label for="cidade">Cidade:</label>
                <input type='text' name='cidade' id="cidade">
                <span class="erro" id="erro-cidade"></span>
            </div>

            <div class="center">
                <label for="estado">Estado:</label>
                <input type='text' name='estado' id="estado">
                <span class="erro" id="erro-estado"></span>
            </div>

            <button id="cadastrar">SALVAR</button>
            <span id="mensagem"></span>
        </form>
    </nav>
</body>
</html>

<!--Formulário, para o usuário digitar informações para o cadastro.
(input, cria elemento de entrada no formulário para informações e type text - resposta tipo texto) -->

<script>
    document.getElementById('cep').addEventListener('input', function() { //monitora quando o usuário sai do campo de texto
        let cep = this.value.replace(/\D/g, ''); //remove o que foi digitado que não seja número
        if (cep.length == 8) { //verifica se o cep tem exatamente 8 numeros
            fetch(`https://viacep.com.br/ws/${cep}/json/`) //requisição para o serviço, via cep
                .then(r => r.json()) //converte para json
                .then(d => { //função que vai tratar dados recebidos
                    if (d.erro) {
                        alert('CEP inválido'); //avisa o usuário se o cep estiver inválido
                        return;
                    }
                    document.getElementById('rua').value = d.logradouro;
                    document.getElementById('bairro').value = d.bairro;
                    document.getElementById('cidade').value = d.localidade;
                    document.getElementById('estado').value = d.uf; //preenche os campos0

                });
        }
    });
</script>