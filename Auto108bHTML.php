<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">
				tinymce.init({
					selector: "textarea",
                                        statusbar:false,
					plugins: [
						"advlist autolink lists link image charmap print preview anchor",
						"searchreplace visualblocks code fullscreen",
						"insertdatetime media table contextmenu paste "
					],
					toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
					autosave_ask_before_unload: false,
					//max_height: 200,
					//min_height: 160,
					//height : 180
					
					
				});
				</script>
<?php
	function verFormularioCriarAuto(){
		include_once('DataAccess.php');
		$da = new DataAccess();
		$res = $da->getTextoAuto(10);
		$row = mysql_fetch_object($res);
		$texto = $row->texto;
                $row = mysql_fetch_object($res);
                $texto1 = $row->texto;                
                $row = mysql_fetch_object($res);
                $texto2 = $row->texto;
                
                $da2 = new DataAccess();
                $res2 = $da2->getLastAuto();
                $row2 = mysql_fetch_object($res2);
		echo "
		<div class='large-75 medium-75 small-100'>
			<div class='ink-grid'>
				<form method='post' action='Auto108b.php' class='ink-form'>
					<fieldset>
						<legend> Criar Auto 108b</legend>
                                                N.º Auto: $row2->numeroAuto PCO N.º $row2->Descricao
						<div class='control-group'>
							<div class='control large-33'>
								<label>Número do Auto</label>
								<input type='text' name='numeroAuto' required>
							</div>					
							<div class='control large-33'>
								<label>Data</label>
								<input type='date' name='data' id='dataAuto' placeholder='dd-mm-aaaa' required>
							</div>
                                                        <div class='control large-33'>
                                                                <label for='name'>Processo de contraordenação nº</label>
                                                                <input type='text' name='numProcessoContraOrdenacao' placeholder='xxx/".date('Y')."' required>
                                                        </div>
						</div>
						<div class='control-group'>
							<div class='control large-90'>
								<label for='name'>Descrição (1ª parte)</label>
								<textarea id='area' cols='70' rows='30' name='descricao'>
								$texto
								</textarea>
							</div>
						</div>
                                                <div class='control-group'>
							<div class='control large-90'>
								<label for='name'>Descrição (2ª parte)</label>
								<textarea id='area2' cols='70' rows='30' name='descricao2'>
								$texto1
								</textarea>
							</div>
						</div>
                                                <div class='control-group'>
							<div class='control large-90'>
								<label for='name'>Descrição (3ª parte)</label>
								<textarea id='area3' cols='70' rows='30' name='descricao3'>
								$texto2
								</textarea>
							</div>
						</div>
						<div class='vertical-space'>
							<div class='control large-100'>
								<input type='submit' value='Criar' class='ink-button black pull-right'>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>";
	}
	
	function verFormularioEditarAuto($id){
		include_once('DataAccess.php');
		$da = new DataAccess();
		$res = $da->getAuto($id);
		$row = mysql_fetch_assoc($res);
		echo "<form method='post' action='Auto108b.php' class='ink-form'>
            <fieldset>
                <div class='large-100'>
                    <div class='ink-grid'>
                        <div class='control-group'>
                            <div class='large-75 medium-75 small-75'>
                                <legend> Editar Auto 108b</legend>
                                    <input type = 'hidden' name ='id' value ='$id'>
                            </div>
                        </div>
						<div class='control-group'>
							<div class='control large-33'>
								<input type='hidden' value='$id' name='id'/>
								<label>Número do Auto</label>
								<input type='text' value='".$row['Descricao']."' name='numeroAuto' required>
							</div>";
							$row = mysql_fetch_assoc($res); 
							echo "
							<div class='control large-33'>
								<label for='name'>Data</label>
								<input type='date' value='".$row['Descricao']."' name='data' placeholder='dd-mm-aaaa' required/>
							</div>";
							$row = mysql_fetch_assoc($res);//data por extenso. não se mostra
							$row = mysql_fetch_assoc($res);
                                                        echo "
                                                        <div class='control large-33'>
                                                        <label>Processo de Contraordenação</label>
								<input type='text' value='".$row['Descricao']."' name='numProcessoContraOrdenacao' required>
							</div>
                                                        </div>";
                                                        
                                                        $row = mysql_fetch_assoc($res);
							echo "
                                                        <div class='control-group'>
							<div class='control large-100'>
                                                                <label for='name'>Descrição (1ª parte)</label>
                                                                <textarea id='area' cols='70' rows='30' name='descricao' required>".$row['Descricao']."</textarea>
							</div>
                                                        </div>";
                                                         $row = mysql_fetch_assoc($res);
                                                        echo "
                                                        <div class='control-group'>
							<div class='control large-100'>
                                                                <label for='name'>Descrição (2ª parte)</label>
                                                                <textarea id='area2' cols='70' rows='30' name='descricao2' required>".$row['Descricao']."</textarea>
							</div>
                                                        </div>";
                                                         $row = mysql_fetch_assoc($res);
                                                        echo "
                                                        <div class='control-group'>
							<div class='control large-100'>
                                                                <label for='name'>Descrição (3ª parte)</label>
                                                                <textarea id='area3' cols='70' rows='30' name='descricao3' required>".$row['Descricao']."</textarea>
							</div>
                                                        </div>
						<div class='vertical-space'>
							<div class='control large-100'>
								<a target='_blank' href='pdfAuto108b.php?i=".$_GET['i']."' class='ink-button black'>PDF</a>
								<input type='submit' value='Editar' class='ink-button black pull-right'>
							</div>
						</div>
					<fieldset>
				</form>
			</div>
		</div>";
	}
	
	if (isset($_GET['i'])){
		verFormularioEditarAuto($_GET['i']);
	}else{
		verFormularioCriarAuto();
	}
?>