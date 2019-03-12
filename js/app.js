$(document).ready(function() {


	//Aparecer conteudo da página do admin
	let home = document.getElementById("home");
	let filmes = document.getElementById("filmes");
	let top = document.getElementById("top");
	let ti = document.getElementById("ti");
	let im = document.getElementById("im");
	let te = document.getElementById("te");

	home.onclick = function(){
		ti.style.display = "block";
		im.style.display = "none";
		te.style.display = "none";
		requisitarArquivo("",);
	}
	filmes.onclick = function(){
		ti.style.display = "none";
		im.style.display = "block";
		te.style.display = "none";
	}
	top.onclick = function(){
		ti.style.display = "none";
		im.style.display = "none";
		te.style.display = "block";
	}
});