//Método para usar ajax
function iniciarAjax(){
	let objetoAjax =false; //variável que vai armazenar o objeto
	if(window.XMLHttpRequest){ //Firefox e demais Browsers
		objetoAjax = new XMLHttpRequest();
	}else if(window.ActiveXObject){ // Verifica se é o tolete
		try{
			//Tolete mais novo
			objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
			//O Msxml2.XMLHTTP é para verificar se o ajax está na
			//versão mais atualizada.
		}catch(e){
			try{
				//Tolete mais velho
				objetoAjax= new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				objetoAjax = false;
			}
		}
	}else{
		alert("Seu browser é uma merda e não suporta Ajax.");
	}
	return objetoAjax;
}
function mostrarResposta(elemento,ajax){
	if(ajax.readyState == 4){
		if(ajax.status == 200){
			elemento.innerHTML = ajax.responseText;
		}else if(ajax.status == 503 ){
			alert("Servidor não encontrado.");
		}else{
			alert("página não encontrada.");
		}
	}
}
function requisitarArquivo(arquivo,elemento){
	let ajax = iniciarAjax();
	if(ajax){
		ajax.onreadystatechange = function(){ //evento executado quando o estado muda
			mostrarResposta(elemento,ajax);
		}
	}
	ajax.open("GET", arquivo);//abrindo requisição e dizendo o que eu quero.
	ajax.send(null);
}





