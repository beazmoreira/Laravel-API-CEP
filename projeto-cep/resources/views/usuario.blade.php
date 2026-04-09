<form method='POST' action='/usuario/salvar'>
    @csrf
    Nome:<input type='text' name='nome'>
    Email:<input type='text' name='email'>
    CEP:<input type='text' id='cep' name='cep'>
    Rua:<input type='text' id='rua' name='rua'>
    Bairro:<input type='text' id='bairro' name='bairro'>
    Cidade:<input type='text' id='cidade' name='cidade'>
    Estado:<input type='text' id='estado' name='estado'>
    <button>Salvar</button>
</form>

<!--Formulário, para o usuário digitar informações para o cadastro.
(input, cria elemento de entrada no formulário para informações e type text - resposta tipo texto) -->

<script>
    
    document.getElementById('cep').addEventListener('blur',function(){ //monitora quando o usuário sai do campo de texto
        let cep=this.value.replace(/\D/g,''); //remove o que foi digitado que não seja número
        if(cep.length==8){ //verifica se o cep tem exatamente 8 numeros
            fetch(`https://viacep.com.br/ws/${cep}/json/`) //requisição para o serviço, via cep
            .then(r=>r.json()) //converte para json
            .then(d=>{ //função que vai tratar dados recebidos
        if(d.erro){alert('CEP inválido'); //avisa o usuário se o cep estiver inválido
            return;} 
        document.getElementById('rua').value=d.logradouro;
        document.getElementById('bairro').value=d.bairro;
        document.getElementById('cidade').value=d.localidade;
        document.getElementById('estado').value=d.uf; //preenche os campos0

                }
            );
        }
    }
);
</script>