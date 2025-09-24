console.log(`${baseUrl}/api/start_session`)

function iniciarSessao() {
    let email = document.getElementById("email_login").value;
    let senha = document.getElementById("senha_login").value;

    const data = {
        email: email,
        senha: senha
    }
    $.ajax({
        url: `${baseUrl}/api/start_session`,
        type: "POST",
        data: data
    }).done(function(response) {
        console.log(response);
    }).fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    })
}   

function cadastrarUsuario(){
    let email_cadastro = document.getElementById("email_cadastro");
    let senha_cadastro = document.getElementById("senha_cadastro");
    let confirmar_senha_cadastro = document.getElementById("confirmar_senha_cadastro");
    let nome_completo_cadastro = document.getElementById("nome_completo_cadastro");
    let telefone_cadastro = document.getElementById("telefone_cadastro");

    if (email_cadastro.value == ""){
        mostrarAlerta("Email Não Preenchido!");
    } else if (senha_cadastro.value == ""){
        mostrarAlerta("Senha Não Preenchida!");
    } else if (confirmar_senha_cadastro.value == ""){
        mostrarAlerta("Confirmação de Senha Não Preenchida!");
    } else if (nome_completo_cadastro.value == ""){
        mostrarAlerta("Nome Não preenchido!");
    } else if (telefone_cadastro.value == ""){
        mostrarAlerta("Telefone Não Preenchido!");
    } else if (senha_cadastro.value != confirmar_senha_cadastro.value){
        mostrarAlerta("Senha Incompatível!");
    } else {
        const data = {
            email: email_cadastro.value,
            senha: senha_cadastro.value,
            nome: nome_completo_cadastro.value,
            telefone: telefone_cadastro.value,
        }
        $.ajax({
            url: `${baseUrl}/api/cadastrar_usuario`,
            type: "POST",
            data: data
        }).done(function(response) {
            if (response == "email_existe"){
                mostrarAlerta("Email Já Cadastrado!");
            } 
            else if (response == "true"){
                header("Location: ./app/principal.php");
                exit();
            }
        }).fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        })
    }

}

function mostrarAlerta(msg) {
    const alerta = document.getElementById('alerta');
    const contador = document.getElementById('contador');
    const texto = document.getElementById('mensagemAlerta');

    // coloca a mensagem
    texto.innerText = msg;

    // mostra alerta e anima entrada
    alerta.style.opacity = '1';
    alerta.style.transform = 'translateX(0)';

    // anima contador
    setTimeout(() => {
        contador.style.width = '100%';
    }, 50);

    // quando o contador terminar, sai da tela
    setTimeout(() => {
        alerta.style.transform = 'translateX(-450px)';
        alerta.style.opacity = '0';
        contador.style.width = '0%';
    }, 3100);
}
