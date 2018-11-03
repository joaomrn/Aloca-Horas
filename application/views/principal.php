<div class="container-fluid">
        <div class="cabecalho">
            <div class="row">
                <div class="col col-md-2">
                    <img src="img/solicitacao.png" class="rounded float-left" width="70px" alt="Solicitação">
                </div>
                <div class="col col-md-3" style="margin-left: 8%">
                    <h1 style="font-size: 40px;">SOLICITAÇÕES</h1>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="container-fluid">
			<input id="btnAtualizar" class="btn btn-primary" type="button" value="atualizar" onclick="atualizarTabela()">
			<!--GRID-->
            <div id="jsGrid"></div>
    </div>

	<script>
  
		function atualizarTabela(){
			$.ajax({
				url:'api/tarefas/list',
				method:'GET'
			})
			.success(function(r){
				r = JSON.parse(r);

				// calcula o status
				r.forEach( (e, i, a)=>{

					if (r[i].pendente == true){
						r[i]['status'] = 'Pendente';

					} else if (r[i].aprovada == true){
						r[i]['status'] = 'Aprovada';

					} else if (r[i].reprovada == true){
						r[i]['status'] = 'Reprovada';

					} else if (r[i].finalizada == true){
						r[i]['status'] = 'Finalizada';

					}else if (r[i].iniciada == true){
						r[i]['status'] = 'Iniciada';

					}else if (r[i].em_andamento == true){
						r[i]['status'] = 'Em andamento';
					}
					else{
						r[i]['status'] = 'Não iniciada';
						
					}
					
				})
				
				desenharTabela(r);		 
				
				console.log(r);
				
			})
			.done(function(){
				console.log('done');
				
			})
		}

		function desenharTabela(content){
			$("#jsGrid").jsGrid({
            width: "100%",
            height: "400px",


            // inserting: true,
            editing: true,
            sorting: true,
            paging: true,

            data: content,

            fields: [
                { name: "ID_tarefa", type: "number", width: 50, validate: "required" , title:"ID"},
                { name: "nome", type: "text", width: 150, title:"TAREFA" },
                { name: "horas_atribuidas", type: "time", width: 200, title:"HORAS ATRIBUIDAS" },
                { name: "horas_gastas", type: "time", title:"HORAS GASTAS" },
                { name: "status", type: "text", title:"STATUS" },

            ],
            rowClick: function (args) {
                console.log(args	)
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
            } });
		}



       	 

       




    </script>
