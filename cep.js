

function buscarcep(){
    let cep = document.getElementById('cep').value; //busca o valor do cep
    if(cep !== ""){
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep; //variavel com api que busca a informação

        let request = new XMLHttpRequest(); // variavel que puxa a informação
        request.open("GET", url);
        request.send();

        //tratar a resposta do request
        request.onload = function(){
            if(request.status === 200){
                let endereco = JSON.parse(request.response);
                document.getElementById("logradouro").value = endereco.street;
                document.getElementById("bairro").value = endereco.neighborhood;
                document.getElementById("cidade").value = endereco.city;
                document.getElementById("estado").value = endereco.state;
            }
            else if(request.status === 404){
                alert("CEP Invalido");
            }
            else{
            alert("Erro ao fazer a requisição");
            }
        }
    }
}

window.onload = function(){
    let cep = document.getElementById("cep"); //inicia a função e ativa o evento quando sai da area com a informação
    cep.addEventListener("blur", buscarcep);
}