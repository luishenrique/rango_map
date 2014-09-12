// JavaScript Document

try{
    xmlhttp = new XMLHttpRequest();
}catch(ee){
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(E){
            xmlhttp = false;
        }
    }
}


function mostraConteudo(cod,tipo,mostrar,aux){

	if(document.getElementById('btn_'+tipo+'_'+cod).title=="+"){
		document.getElementById('btn_'+tipo+'_'+cod).title="-";
		document.getElementById('btn_'+tipo+'_'+cod).innerHTML="<i class=\"icon-chevron-down\"></i>";
		document.getElementById('conteudo_'+tipo+'_'+cod).style.display="";

		if (mostrar=='unidade'){
			carregaUnidades(cod);	
		}

		if (mostrar=='cardapio'){
			carregaCardapios(cod, aux);	
		}
		
		if (mostrar=='categoria'){
			carregaCategorias(cod, aux);	
		}

		if (mostrar=='promocao'){
			carregaPromocao(cod, aux);	
		}
		
	}else{
		document.getElementById('btn_'+tipo+'_'+cod).title="+";
		document.getElementById('conteudo_'+tipo+'_'+cod).style.display="none";
		document.getElementById('btn_'+tipo+'_'+cod).innerHTML="<i class=\"icon-list-alt\"></i>";		
	}

}


function carregaPromocao(codigo, unidade){

	document.getElementById('conteudo_D_'+codigo).style.display = "";
	document.getElementById('conteudo_D_'+codigo).innerHTML = "Aguarde, pesquisando...!!!";	
	
	dadosDoFormulario = "id="+escape(codigo)+"&unidade="+escape(unidade);
	xmlhttp.open("POST", "../unidade_promocao/lista.php?"+dadosDoFormulario, true);
	xmlhttp.setRequestHeader('Content-Type','text/html');
	xmlhttp.setRequestHeader('encoding','utf-8');
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', dadosDoFormulario.lenght );
	xmlhttp.send(dadosDoFormulario);
	xmlhttp.onreadystatechange=function() {

		/*
		Verifica o estado do sistema
		0: Requisição não inicializada
		1: Conexão estabelecida com o servidor
		2: Requisição recebida
		3: Processando requisição 
		4: Requisição finalizada e resposta lida
		*/

        if (xmlhttp.readyState==4){
			//Recebe o código de retorno (100 a 500)
			if (xmlhttp.status == 200){
				//Resposta da Requisição
				var aResposta = (xmlhttp.responseText);
				//Insere a resposta da requisição dentro da tag com o ID selecionado 	
				document.getElementById('conteudo_D_'+codigo).innerHTML = aResposta;	
			}else{
				//Erro na resposta da requisição
				document.getElementById('conteudo_D_'+codigo).innerHTML = "Sua requisição não retornou um resultado válido.\nErro: "+xmlhttp.status;
			}
        }else{
			//Carregando resposta da requisição
			//alert("Carregando conteúdo");
		}
    }
}


function carregaCategorias(codigo, unidade){

	document.getElementById('conteudo_C_'+codigo).style.display = "";
	document.getElementById('conteudo_C_'+codigo).innerHTML = "Aguarde, pesquisando...!!!";	
	
	dadosDoFormulario = "id="+escape(codigo)+"&unidade="+escape(unidade);
	xmlhttp.open("POST", "../unidade_categoria/lista.php?"+dadosDoFormulario, true);
	xmlhttp.setRequestHeader('Content-Type','text/html');
	xmlhttp.setRequestHeader('encoding','utf-8');
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', dadosDoFormulario.lenght );
	xmlhttp.send(dadosDoFormulario);
	xmlhttp.onreadystatechange=function() {

		/*
		Verifica o estado do sistema
		0: Requisição não inicializada
		1: Conexão estabelecida com o servidor
		2: Requisição recebida
		3: Processando requisição 
		4: Requisição finalizada e resposta lida
		*/

        if (xmlhttp.readyState==4){
			//Recebe o código de retorno (100 a 500)
			if (xmlhttp.status == 200){
				//Resposta da Requisição
				var aResposta = (xmlhttp.responseText);
				//Insere a resposta da requisição dentro da tag com o ID selecionado 	
				document.getElementById('conteudo_C_'+codigo).innerHTML = aResposta;	
			}else{
				//Erro na resposta da requisição
				document.getElementById('conteudo_C_'+codigo).innerHTML = "Sua requisição não retornou um resultado válido.\nErro: "+xmlhttp.status;
			}
        }else{
			//Carregando resposta da requisição
			//alert("Carregando conteúdo");
		}
    }
}

function carregaUnidades(codigo){

	document.getElementById('conteudo_A_'+codigo).style.display = "";
	document.getElementById('conteudo_A_'+codigo).innerHTML = "Aguarde, pesquisando...!!!";	
	
	dadosDoFormulario = "restaurante_id="+escape(codigo);
	xmlhttp.open("POST", "../unidade/lista.php?"+dadosDoFormulario, true);
	xmlhttp.setRequestHeader('Content-Type','text/html');
	xmlhttp.setRequestHeader('encoding','utf-8');
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', dadosDoFormulario.lenght );
	xmlhttp.send(dadosDoFormulario);
	xmlhttp.onreadystatechange=function() {

		/*
		Verifica o estado do sistema
		0: Requisição não inicializada
		1: Conexão estabelecida com o servidor
		2: Requisição recebida
		3: Processando requisição 
		4: Requisição finalizada e resposta lida
		*/

        if (xmlhttp.readyState==4){
			//Recebe o código de retorno (100 a 500)
			if (xmlhttp.status == 200){
				//Resposta da Requisição
				var aResposta = (xmlhttp.responseText);
				//Insere a resposta da requisição dentro da tag com o ID selecionado 	
				document.getElementById('conteudo_A_'+codigo).innerHTML = aResposta;	
			}else{
				//Erro na resposta da requisição
				document.getElementById('conteudo_A_'+codigo).innerHTML = "Sua requisição não retornou um resultado válido.\nErro: "+xmlhttp.status;
			}
        }else{
			//Carregando resposta da requisição
			//alert("Carregando conteúdo");
		}
    }
}


function carregaCardapios(codigo, unidade){

	document.getElementById('conteudo_B_'+codigo).style.display = "";
	document.getElementById('conteudo_B_'+codigo).innerHTML = "Aguarde, pesquisando...!!!";	
	
	dadosDoFormulario = "id="+escape(codigo)+"&unidade="+escape(unidade);
	xmlhttp.open("POST", "../itens_cadapio/lista.php?"+dadosDoFormulario, true);
	xmlhttp.setRequestHeader('Content-Type','text/html');
	xmlhttp.setRequestHeader('encoding','utf-8');
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', dadosDoFormulario.lenght );
	xmlhttp.send(dadosDoFormulario);
	xmlhttp.onreadystatechange=function() {

		/*
		Verifica o estado do sistema
		0: Requisição não inicializada
		1: Conexão estabelecida com o servidor
		2: Requisição recebida
		3: Processando requisição 
		4: Requisição finalizada e resposta lida
		*/

        if (xmlhttp.readyState==4){
			//Recebe o código de retorno (100 a 500)
			if (xmlhttp.status == 200){
				//Resposta da Requisição
				var aResposta = (xmlhttp.responseText);
				//Insere a resposta da requisição dentro da tag com o ID selecionado 	
				document.getElementById('conteudo_B_'+codigo).innerHTML = aResposta;	
			}else{
				//Erro na resposta da requisição
				document.getElementById('conteudo_B_'+codigo).innerHTML = "Sua requisição não retornou um resultado válido.\nErro: "+xmlhttp.status;
			}
        }else{
			//Carregando resposta da requisição
			//alert("Carregando conteúdo");
		}
    }
}

function carregaItensCardapio(cardapio, unidade){

	document.getElementById('conteudo_B_'+codigo).style.display = "";
	document.getElementById('conteudo_B_'+codigo).innerHTML = "Aguarde, pesquisando...!!!";	
	
	dadosDoFormulario = "cardapio_id="+escape(codigo)+"&unidade_id="+escape(unidade);
	xmlhttp.open("POST", "../itens_cadapio/lista.php?"+dadosDoFormulario, true);
	xmlhttp.setRequestHeader('Content-Type','text/html');
	xmlhttp.setRequestHeader('encoding','utf-8');
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', dadosDoFormulario.lenght );
	xmlhttp.send(dadosDoFormulario);
	xmlhttp.onreadystatechange=function() {

		/*
		Verifica o estado do sistema
		0: Requisição não inicializada
		1: Conexão estabelecida com o servidor
		2: Requisição recebida
		3: Processando requisição 
		4: Requisição finalizada e resposta lida
		*/

        if (xmlhttp.readyState==4){
			//Recebe o código de retorno (100 a 500)
			if (xmlhttp.status == 200){
				//Resposta da Requisição
				var aResposta = (xmlhttp.responseText);
				//Insere a resposta da requisição dentro da tag com o ID selecionado 	
				document.getElementById('conteudo_B_'+codigo).innerHTML = aResposta;	
			}else{
				//Erro na resposta da requisição
				document.getElementById('conteudo_B_'+codigo).innerHTML = "Sua requisição não retornou um resultado válido.\nErro: "+xmlhttp.status;
			}
        }else{
			//Carregando resposta da requisição
			//alert("Carregando conteúdo");
		}
    }
}


function editaUnidadeCardapio(campo,unidade,cardapio){

	if(campo.checked==true){
		tipo = "S";
	}else{
		tipo = "R";
	}

	dadosDoFormulario = "unidade="+escape(unidade)+"&cardapio="+escape(cardapio)+"&tipo="+escape(tipo);
	xmlhttp.open("POST", "../unidade_cardapio/edita.php?"+dadosDoFormulario, true);
	xmlhttp.setRequestHeader('Content-Type','text/html');
	xmlhttp.setRequestHeader('encoding','utf-8');
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', dadosDoFormulario.lenght ); 
	xmlhttp.send(dadosDoFormulario);
	xmlhttp.onreadystatechange=function() {

		/*
		Verifica o estado do sistema
		0: Requisição não inicializada
		1: Conexão estabelecida com o servidor
		2: Requisição recebida
		3: Processando requisição 
		4: Requisição finalizada e resposta lida
		*/

        if (xmlhttp.readyState==4){
			//Recebe o código de retorno (100 a 500)
			if (xmlhttp.status == 200){
				//Resposta da Requisição
				var aResposta = (xmlhttp.responseText);
				//Insere a resposta da requisição dentro da tag com o ID selecionado
				//alert(aResposta);
			}else{
				//Erro na resposta da requisição
				alert("Erro");
			}
        }else{
			//Carregando resposta da requisição
			//alert("Carregando conteúdo");
		}
    }
}

function editaUnidadeCategoria(campo,unidade,categoria){

	if(campo.checked==true){
		tipo = "S";
	}else{
		tipo = "R";
	}

	dadosDoFormulario = "unidade="+escape(unidade)+"&categoria="+escape(categoria)+"&tipo="+escape(tipo);
	xmlhttp.open("POST", "../unidade_categoria/edita.php?"+dadosDoFormulario, true);
	xmlhttp.setRequestHeader('Content-Type','text/html');
	xmlhttp.setRequestHeader('encoding','utf-8');
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', dadosDoFormulario.lenght ); 
	xmlhttp.send(dadosDoFormulario);
	xmlhttp.onreadystatechange=function() {

		/*
		Verifica o estado do sistema
		0: Requisição não inicializada
		1: Conexão estabelecida com o servidor
		2: Requisição recebida
		3: Processando requisição 
		4: Requisição finalizada e resposta lida
		*/

        if (xmlhttp.readyState==4){
			//Recebe o código de retorno (100 a 500)
			if (xmlhttp.status == 200){
				//Resposta da Requisição
				var aResposta = (xmlhttp.responseText);
				//Insere a resposta da requisição dentro da tag com o ID selecionado
				//alert(aResposta);
			}else{
				//Erro na resposta da requisição
				alert("Erro");
			}
        }else{
			//Carregando resposta da requisição
			//alert("Carregando conteúdo");
		}
    }
}

function editaUnidadePromocao(campo,unidade,promocao){

	if(campo.checked==true){
		tipo = "S";
	}else{
		tipo = "R";
	}

	dadosDoFormulario = "unidade="+escape(unidade)+"&promocao="+escape(promocao)+"&tipo="+escape(tipo);
	xmlhttp.open("POST", "../unidade_promocao/edita.php?"+dadosDoFormulario, true);
	xmlhttp.setRequestHeader('Content-Type','text/html');
	xmlhttp.setRequestHeader('encoding','utf-8');
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', dadosDoFormulario.lenght ); 
	xmlhttp.send(dadosDoFormulario);
	xmlhttp.onreadystatechange=function() {

		/*
		Verifica o estado do sistema
		0: Requisição não inicializada
		1: Conexão estabelecida com o servidor
		2: Requisição recebida
		3: Processando requisição 
		4: Requisição finalizada e resposta lida
		*/

        if (xmlhttp.readyState==4){
			//Recebe o código de retorno (100 a 500)
			if (xmlhttp.status == 200){
				//Resposta da Requisição
				var aResposta = (xmlhttp.responseText);
				//Insere a resposta da requisição dentro da tag com o ID selecionado
				//alert(aResposta);
			}else{
				//Erro na resposta da requisição
				alert("Erro");
			}
        }else{
			//Carregando resposta da requisição
			//alert("Carregando conteúdo");
		}
    }
}