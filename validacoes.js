		// Valida Campos
		function validaCampo(){
			if(document.cadastro.nome.value==""){
				alert("O Campo nome é obrigatório!");
				return false;
			} else if(document.cadastro.email.value==""){
				alert("O Campo email é obrigatório!");
				return false;
			} else if(document.cadastro.sexo.value==""){
				alert("O Campo endereço é obrigatório!");
				return false;
			} else if(document.cadastro.dtNasc.value==""){
				alert("O Campo Cidade é obrigatório!");
				return false;
			} else if(document.cadastro.telefone.value==""){
				alert("O Campo Estado é obrigatório!");
				return false;
			} else if(document.cadastro.endereco.value==""){
				alert("O Campo Bairro é obrigatório!");
				return false;
			} else if(document.cadastro.cidade.value==""){
				alert("O Campo CEP é obrigatório!");
				return false;
			} else if(document.uf.values==""){
				alert("O campo UF é obrigatório!");
				return false;
			} else if(document.bairro.values==""){
				alert("O campo Bairro é obrigatório!");
				return false;
			} else if(document.cep.vaules==""){
				alert("O campo CEP é obrigatório!");
				return false;
			} else if(document.cadastro.login.value==""){
				alert("O Campo Login é obrigatório!");
				return false;
			} else if(document.cadastro.senha.value==""){
				alert("Digite uma senha!"); 
				return false; 
			} else return true;
		}
		
		//mascara da data
		function Formatadata(Campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(Campo.value);
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				tam = vr.length + 1;
				if (tecla != 8 && tecla != 8)
				{
					if (tam > 0 && tam < 2)
						Campo.value = vr.substr(0, 2) ;
					if (tam > 2 && tam < 4)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
					if (tam > 4 && tam < 7)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
				}
			}
			
			
			
		
		
		
	
