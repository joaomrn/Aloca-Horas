<div id="id_master_page"> </div>
    <div class="container-fluid">
        <div class="cabecalho">
            <div class="row">
                <div class="col col-md-2">
                    <img src="<?= base_url('img/usuario.png') ?>" class="rounded float-left" width="70px" alt="USUÁRIOS">
                </div>
                <div class="col col-md-3" style="margin-right: 150px;">
                    <h1 style="font-size: 40px;">USUÁRIOS</h1>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
		<button class="btn btn-danger bnt_per" id="bnt_Incluir" 
		, data-toggle="modal" data-target="#novoUsuario">INCLUIR</button>
        <button class="btn btn-danger bnt_per" id="bnt_Editar" disabled>EDITAR</button>
    </div>
    <hr>
    <div class="container-fluid">
        <!--GRID-->
        <div id="jsGrid"></div>
    </div>
	
	
	<!-- Modal -->
    <div class="modal fade" id="novoUsuario" tabindex="-1" role="dialog" aria-labelledby="novoUsuario" aria-hidden="true">
		
		<form id="createModal"  class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" style="font-family: HammersmithOne;color: #337ab7;">Novo Usuário</h2>
                </div>
                <div class="modal-body">
                    <div  style="margin-bottom: 40%;" >
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="iptnome">Nome completo:</label>
                                <input name="nome" type="text" class="form-control" id="iptnome">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="iptnome">Cargo</label>
                                <select id="slCargo" class="form-control">
                                    <option name="cargo" selected>Selecione</option>
									<!-- Options start -->
									<?php foreach ($cargos as $key => $cargo) { ?>
										<option value="<?= $cargo['ID_cargo'] ?>"> <?= $cargo['descricao'] ?></option>
									<?php } ?>
									<!-- Options end -->			
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="slPerfil">Perfil</label>
                                <select name="admin" id="slPerfil" class="form-control">
                                    <option selected>Selecione</option>
                                    <option value="1">Administrador</option>
                                    <option value="0">Usuário normal</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-check-label" for="checkAtivo">
                                    Ativo
                                </label>
                                <br>
                                <input type="checkbox" style="margin-left: 20px;" id="checkAtivo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email</label>
                                <input name="email" type="email" class="form-control" id="inputEmail">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input name="senha" type="password" class="form-control" id="inputPassword4">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bnt_per" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-primary bnt_per"  value="Salvar" id="bntSalvar"> 
                </div>
			</div>
		</form>
		
    </div>
	
	


    <script>

		$('#createModal').on('submit',function(e){
			e.preventDefault();
			 
			 // armazena os inputs de form em um objeto
			 
			 var data = {};

			 $('#createModal')
			 .serializeArray()
			 .forEach(function(e, i, a){
				 data[e['name']] = e['value'];
			 });

			 // gera uma requisição para o endpoint de criação de usuários
			 $.ajax({
				 url:'<?= base_url('api/usuarios/create')?>',
				 method:'post',
				 data:data
			 })
			 .success(function(r){ 
				atualizarTabela();
			 })
			 .fail(function(){
				 alert('Houve um erro ao criar o usuário');
			 })
			 .done(function(){
				$('#novoUsuario').modal('hide');
			 });
			 
			 
		})
       
		$(document).ready(function(){
			atualizarTabela();
		});

        
	function atualizarTabela(){

		$.ajax({
			url:'<?= base_url('api/usuarios/list') ?>',
			method:'get'
		})
		.success(function(r){
			r = JSON.parse(r);
			console.log(r);

			desenharTabela(r);
			
		})
		.fail(function(){

		})
	}

	function desenharTabela(content){
		$("#jsGrid").jsGrid({
            width: "100%",
            height: "400px",


            // inserting: true,
            //editing: true,
            sorting: true,
            paging: true,

            data: content,

            fields: [
                { name: 'ID_usuario', title: "ID", type: "number", width: 50, validate: "required" },
                { name: 'nome', title: "NOME", type: "text", width: 150 },
                { name: 'email', title: "E-MAIL", type: "time", width: 200 },
                { name: 'cargo', title: "PERFIL", type: "time", width: 200 },
                { name: '', title: "ATIVO", type: "text" }

            ],
            rowClick: function (args) {
                console.log(args)
                var getData = args.item;
                var keys = Object.keys(getData);
                var resultado = []
                $.each(keys, function (idx, value) {
                    resultado.push(value + " : " + getData[value])
                });

                alert(resultado);
            },

            loadComplete: function fontFormatter(cellValue, opts, rowObject) {
                switch (rowObject.col1) {
                    case "1":
                        return '<span style="color:red">' + cellValue + '</span>';
                        break;
                    case "2":
                        return '<span style="color:green">' + cellValue + '</span>';
                        break;
                }
            }
        });
	}
    </script>
