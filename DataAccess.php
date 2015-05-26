<?php

class DataAccess{
    private $connection;
    
    function connect(){
        /*$bd = "alfandega";
        $user = "root";
        $pwd = "";
        $server = "localhost";
*/
        $bd = "clinic11_sco";
        $user = "clinic11_fmv";
        $pwd = "serodio";
        $server = "localhost";

        $this->connection = mysql_connect($server, $user, $pwd);

        //verificar se a conexão está bem aberta        
        if($this->connection<0 || 
                mysql_select_db($bd, $this->connection) == false){
            //erro
            die("não conseguiu ligar-se à base de dados".mysql_error());            
        }else{
            mysql_query("set names 'utf8'");
            mysql_query("set character_set_connection=utf8");
            mysql_query("set character_set_client=utf8");
            mysql_query("set character_set_results=utf8");
        }        
    }

    function execute($query){
        $res = mysql_query($query);
        if(!$res){
            die("Comando inválido".mysql_error());
        }else
            return $res;
    }

    function disconnect(){
        mysql_close($this->connection);
    }

    function getNacionalidade($id){
        $this->connect();
        $query = "select nacionalidade from nacionalidades where id = $id";
        $res = $this->execute($query);
        $this ->disconnect();
        $row = mysql_fetch_object($res);
        return $row->nacionalidade;
    }
    
    function inserirNacionalidade($nacionalidade){
        $query = "insert into nacionalidades (nacionalidade) values
                                         ('$nacionalidade')";
        $this->connect();
        $this->execute($query);
        $this->disconnect();       
    }
    
    function editarNacionalidade($id, $nacionalidade){
        $query = "update nacionalidades set nacionalidade = '$nacionalidade' where id = $id";
        $this->connect();
        $this->execute($query);
        $this->disconnect();       
    }
    
    function getIdNacionalidades($id){
        $query = "select id from nacionalidades where id = $id";
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        $row = mysql_fetch_object($res);
        return $row->id;
    }
    
    function eliminarNacionalidade($id){
            $query = "update nacionalidades set idEstado = 2 where id = $id";

            $this->connect();
            $this->execute($query);
            $this->disconnect();
    }
    
    function nacionalidadeVisivel($id){
        $query = "update nacionalidades set idEstado = 3 where id = $id";
        $this->connect();
        $this->execute($query);
        $this->disconnect();
        } 
        
    function getIdEstadoNacionalidade($id){
        $query = "select idEstado from nacionalidades where id = $id";
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        return $res;
    }
    
    function nacionalidadeNaoVisivel($id){ 
        $query = "update nacionalidades set idEstado = 1 where id = $id"; 
        $this->connect(); 
        $this->execute($query);
        $this->disconnect();
        }
    
    function getNacionalidadesVisiveis(){
    $query = "select * from nacionalidades where idEstado = 3 order by nacionalidade";
    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;    
    }
    
    function getNacionalidades(){
    $query = "select * from nacionalidades where idEstado = 1 or 3 order by nacionalidade";
    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;    
    }
    
    function pesquisarNacionalidade($nacionalidade){
        $this->connect();
        $query = "select * from nacionalidades where nacionalidade like '%$nacionalidade%'";
        $res = $this->execute($query);
        $this->disconnect();    
        return $res;
    }
    
    function numeroCigarros($idAuto){
        $this->connect();
        $query = "select IA.Descricao from informacaoautos IA inner join autos A where A.id = IA.idAuto and IA.idCampo = 47 and A.id = $idAuto";
        $res = $this->execute($query);
        $this->disconnect();    
        return $res;
    }
    function lowerN(){
        $query = "select * from nacionalidades";
        $this->connect();
        $res = $this->execute($query);
        while($row = mysql_fetch_object($res)){
            $query = "update nacionalidades set nacionalidade = LOWER('$row->nacionalidade') where id = $row->id";
            $this->execute($query);
        }
        $this->disconnect(); 
    }
    
    function getTiposUtilizadores(){
        $query = "select * from tiposutilizadores";
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        return $res;
    }
    
    
    function getCategoriasTecnicos(){
    $query = "select * from categoriatecnicos";
    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;
    }

    function getNomesUtilizadores(){
    $query = "select * from utilizadores";
    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;    
    }
    
    function getNumeroTecnico($id){
    $query = "select numeroTecnico from utilizadores where id= $id";
    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;
}

    function getId($numAuto){
        $query = "select id from autos where numeroAuto = $numAuto";
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        $row = mysql_fetch_object($res);
        return $row->id;
    }
    
    function getTiposAutos(){
    $query = "select * from tiposautos";
    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;
    }

    function inserirUtilizador($nome, $pwd, $email, $numTecnico,$idTipoUtilizador, $idCategoriaTecnico){
    $query = "insert into utilizadores(nome, password, email, numeroTecnico, idTipoUtilizador, idCategoriaTecnico) values
                                     ('$nome', '$pwd', '$email', '$numTecnico', '$idTipoUtilizador', '$idCategoriaTecnico')";
    $this->connect();
    $this->execute($query);
    $this->disconnect();       
}

    function atualizarUtilizador($id, $nome, $pwd, $email, $numTecnico,$idTipoUtilizador, $idCategoriaTecnico){
    $query = "update utilizadores set  nome = '$nome', email='$email', numeroTecnico = $numTecnico, 
                                                                            idTipoUtilizador = $idTipoUtilizador, idCategoriaTecnico = $idCategoriaTecnico 
                                                                            where id = $id";
            $this->connect();
    $this->execute($query);

            if ($pwd != ""){
                    $query = "update utilizadores set password = '$pwd' where id = $id";
                    $this->execute($query);
            }        
    $this->disconnect();       
}

    function getUtilizadores(){
    $query = "select u.*, ct.categoria as cat 
                    from utilizadores u inner join categoriatecnicos ct
                    where u.idCategoriaTecnico = ct.id ";
    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;
}

    function getUtilizador($id){
    $query = "select u.*, ct.categoria as cat 
                    from utilizadores u inner join categoriatecnicos ct
                    where u.idCategoriaTecnico = ct.id and u.id=$id";
    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;
}

    function pesquisarUtilizador($nome, $num){
    $query = "select * from utilizadores where 1=1 ";

    if ($nome != "" )
        $query .= " and nome like '%".$nome."%'";

    if ($num != "" )
        $query .= " and numeroTecnico = ".$num;

    $this->connect();
    $res = $this->execute($query);
    $this->disconnect();
    return $res;
}

    function login($email, $pwd){
		$query = "select * from utilizadores where email = '$email' and password = '$pwd'";
		$this->connect();
		$res = $this->execute($query);
		$this->disconnect();
		return $res;
    }

    function getMes($num){
            switch($num){
                    case 1: return "Janeiro"; break;
                    case 2: return "Fevereiro"; break;
                    case 3: return "Março"; break;
                    case 4: return "Abril"; break;
                    case 5: return "Maio"; break;
                    case 6: return "Junho"; break;
                    case 7: return "Julho"; break;
                    case 8: return "Agosto"; break;
                    case 9: return "Setembro"; break;
                    case 10: return "Outubro"; break;
                    case 11: return "Novembro"; break;
                    case 12: return "Dezembro"; break;
            }
    }

    function tratarData($data){
		/*
		//dd-mm-aaaa

		//"13 dias do mês de novembro de 2014"

		$dia = substr($data, 0, 2);
		if ($dia == "1-" || $dia == "01"){
				$res = "Ao primeiro dia ";
		}else{	
				if($dia[0] == "0")
						$dia = $dia[1];

				$res = "Aos ".$dia." dias ";
		}
		$mes = substr($data, 3, 2);		
		$ano = substr($data, 6, 4);
		$res .= "do mês de ".$this->getMes($mes)." de ".$ano;	
		return $res;
		*/
		//aaaa-mm-dd

		//"13 dias do mês de novembro de 2014"
		$ano = substr($data, 0, 4);
		$mes = substr($data, 5,2);
		$dia = substr($data, 8, 2);
		if($dia[0] == "0") $dia = $dia[1];
		if($mes[0] == "0") $mes = $mes[1];		
		if ($dia == "1"){
			$res = "Ao primeiro dia ";
		}else{	
			$res = "Aos ".$dia." dias ";
		}
				
		$res .= "do mês de ".$this->getMes($mes)." de ".$ano;	
		return $res;
    }
    	
    function getAutos(){
            $query = "select distinct A.id, A.numeroAuto, A.idUtilizador, A.idTipoAuto, A.idEstado
                        from autos A 
                        inner join informacaoautos IA 
                        where A.idEstado = 1 ORDER BY A.id DESC";
            $this->connect();
            $res = $this->execute($query);
            $this->disconnect();
            return $res;
    }
	
    function getDataAuto($numAuto){
        $query = "select Descricao from autos A inner join informacaoautos IA where IA.idAuto = A.id and
            A.numeroAuto = $numAuto and IA.idCampo = 2";
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        $row = mysql_fetch_object($res);
        return $row->Descricao;
    }
    
    function getLastAuto(){
        $query = "SELECT IA.Descricao, A.numeroAuto
                    FROM autos A
                    INNER JOIN informacaoautos IA
                    WHERE IA.idAuto = A.id
                    AND IA.idCampo = 12
                    AND A.id = ( 
                    SELECT MAX( id ) from autos )";
        
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        return $res;
    }
    
    function getNomeAutoado($numAuto){
        $query = "select Descricao from autos A inner join informacaoautos IA where IA.idAuto = A.id and
            A.numeroAuto = $numAuto and IA.idCampo = 5 order by A.id desc";
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        $row = mysql_fetch_object($res);
        return $row->Descricao;
    }
    
    function getNomeTecnico($numAuto){
        $query = "select U.nome from autos A inner join utilizadores U where U.id = A.idUtilizador and
            A.numeroAuto = $numAuto";
        $this->connect();
        $res = $this->execute($query);
        $this->disconnect();
        $row = mysql_fetch_object($res);
        return $row->nome;
    }

    function getAuto($id){
            $query = "select * from autos A inner join informacaoautos IA 
                                    where A.id = IA.idauto and A.id = $id";
            $this->connect();
            $res = $this->execute($query);
            $this->disconnect();
            return $res;
    }
		
    function getTecnico($numAuto){
       $query = "select U.nome, CT.categoria from autos A inner join utilizadores U inner join 
			categoriatecnicos CT where CT.id = U.idcategoriatecnico and U.id = A.idutilizador and
           A.id = $numAuto";
       $this->connect();
       $res = $this->execute($query);
       $this->disconnect();
       return $res;
   }
   
    function eliminarAuto($id){
        $query = "update autos set idEstado = 2 where id = $id";
        $this->connect();
        $this->execute($query);
        $this->disconnect();
    }
   
    function recuperarAuto($id){
            $query = "update autos set idEstado = 1 where id = $id";

            $this->connect();
            $this->execute($query);
            $this->disconnect();
        }
		
    function PesquisarEliminados($numAuto, $data, /*$nomeAutoado,*/ $idTecnico){
        /*
         * data - 2
         * nome autoado- 5
         */
        
        $query = "select distinct A.numeroAuto, A.idUtilizador, A.idTipoAuto, A.idEstado from autos A 
            inner join informacaoautos IA 
            where IA.idAuto = A.id ";
        
        if ($numAuto != ""){
            $query .= " and A.numeroAuto = $numAuto ";
        }
        
        if ($data != ""){
            $query .= " and (IA.Descricao = '$data' and IA.idCampo = 2) ";   
        }
        
        if ($idTecnico != -1){
            $query .= " and A.idUtilizador = $idTecnico";
        }
        $query .= "  and A.idEstado = 2";
        /*  
        if ($nomeAutoado != ""){
            $query .= " and (IA.Descricao like '%$nomeAutoado%' and IA.idCampo = 5) ";   
        }
        */
        $this->connect();
        //echo $query;
        $res = $this->execute($query);
        $this->disconnect();
        return $res;
    }
	
    function PesquisarFiltros($numAuto, $data, /*$nomeAutoado,*/ $idTecnico){
        /*
         * data - 2
         * nome autoado- 5
         */
        
        $query = "select distinct A.numeroAuto, A.idUtilizador, A.idTipoAuto, A.idEstado from autos A 
            inner join informacaoautos IA 
            where IA.idAuto = A.id ";
        
        if ($numAuto != ""){
            $query .= " and A.numeroAuto = $numAuto ";
        }
        
        if ($data != ""){
            $query .= " and (IA.Descricao = '$data' and IA.idCampo = 2) ";   
        }
        
        if ($idTecnico != -1){
            $query .= " and A.idUtilizador = $idTecnico";
        }
        $query .= "  and A.idEstado = 1";
        /*  
        if ($nomeAutoado != ""){
            $query .= " and (IA.Descricao like '%$nomeAutoado%' and IA.idCampo = 5) ";   
        }
        */
        $this->connect();
        //echo $query;
        $res = $this->execute($query);
        $this->disconnect();
        return $res;
        }
        
    //IPHONES - FEITO
    function inserirAutoIphones ($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte,
            $dataEmissaoPassaporte, $dataNascimento, $localResidente, $localProcedente,
            $numeroVoo, $contramarcaFiscal, $descricao, $numProcessoContraOrdenacao, $separadorBagagem, 
            $revisorBagagem, $idUtilizador){
        
            $this->connect();
            //criar um auto de um determinado tipo
            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ('".$numeroAuto."', 1, $idUtilizador)";
            $this->execute($query);
            $idAuto = mysql_insert_id();

            //numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$numeroAuto."', 1,$idAuto)";
            $this->execute($query);

            //data
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
            $this->execute($query);

            //data Extenso
            $dataExtenso = $this->tratarData($data);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataExtenso."',3,$idAuto)";
            $this->execute($query);

            //hora
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$hora."',4,$idAuto)";
            $this->execute($query);

            //Nome do Autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$nomeAutoado."',5,$idAuto)";
            $this->execute($query);
            
            //Nacionalidade
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$nacionalidade."',24,$idAuto)";
            $this->execute($query);

            //numero Passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$numPassaporte."',30,$idAuto)";
            $this->execute($query);

            //Data Emissao Passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataEmissaoPassaporte."',31,$idAuto)";
            $this->execute($query);

            //Data de Nascimento
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataNascimento."',8,$idAuto)";
            $this->execute($query);

            //Local Residente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$localResidente."',14,$idAuto)";
            $this->execute($query);

            //Local Procedente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$localProcedente."',22,$idAuto)";
            $this->execute($query);

            //Número do voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$numeroVoo."',9,$idAuto)";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$contramarcaFiscal."',10, $idAuto)";    
            $this->execute($query);
            
            //Técnico Separador de Bagagem
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$separadorBagagem."',43,$idAuto)";
            $this->execute($query);
            
            //Técnico Revisor de Bagagem
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$revisorBagagem."',44,$idAuto)";
            $this->execute($query);

            //Descrição
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$descricao."',11,$idAuto)";
            $this->execute($query);

            //Número de Processo de Contraordenação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$numProcessoContraOrdenacao."',12,$idAuto)";
            $this->execute($query);
            
            
            
            
            $this->disconnect();       
    }

    function editarAutoIphones ($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
            $dataNascimento, $localResidente, $localProcedente, $numeroVoo, $contramarcaFiscal, $descricao, 
            $numProcessoContraOrdenacao, $separadorBagagem, $revisorBagagem){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
            $this->execute($query);

            //data
            $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
            $this->execute($query);

            //data Extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
            $this->execute($query);

            //hora
            $query = "update informacaoautos set Descricao = '$hora' where idCampo = 4 and idAuto = $id";
            $this->execute($query);

            //Nome do Autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
            $this->execute($query);
            
            //Nacionalidade
            $query = "update informacaoautos set Descricao = '$nacionalidade' where idCampo = 24 and idAuto = $id";
            $this->execute($query);
            
            //numero Passaporte
            $query = "update informacaoautos set Descricao = '$numPassaporte' where idCampo = 30 and idAuto = $id";
            $this->execute($query);

            //Data de emissão Passaporte
            $query = "update informacaoautos set Descricao = '$dataEmissaoPassaporte' where idCampo = 31 and idAuto = $id";
            $this->execute($query);

            //Data de Nascimento
            $query = "update informacaoautos set Descricao = '$dataNascimento' where idCampo = 8 and idAuto = $id";
            $this->execute($query);

            //Local Residente
            $query = "update informacaoautos set Descricao = '$localResidente' where idCampo = 14 and idAuto = $id";
            $this->execute($query);

            //Local Procedente
            $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
            $this->execute($query);

            //Número do voo
            $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "update informacaoautos set Descricao = '$contramarcaFiscal' where idCampo = 10 and idAuto = $id";
            $this->execute($query);

            //Técnico Separador de Bagagem
            $query = "update informacaoautos set Descricao = '$separadorBagagem' where idCampo = 43 and idAuto = $id";
            $this->execute($query);
            
            //Técnico Revisor de Bagagem
            $query = "update informacaoautos set Descricao = '$revisorBagagem' where idCampo = 44 and idAuto = $id";
            $this->execute($query);
            
            //Descrição
            $query = "update informacaoautos set Descricao = '$descricao' where idCampo = 11 and idAuto = $id";
            $this->execute($query);

            //Número de Processo de Contraordenação
            $query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
            $this->execute($query);
            
            $this->disconnect();       
    }

    //CIGARROS - FEITO
    function inserirAutoCigarros ($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
            $dataNascimento, $localResidente, $localProcedente, $numeroVoo, $contramarcaFiscal, $separadorBagagem, $revisorBagagem, $descricao, $numProcessoContraOrdenacao, $numeroCigarros, $idUtilizador){
            $this->connect();
            
            //criar um auto de um determinado tipo

            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ($numeroAuto, 2, $idUtilizador)";;
            $this->execute($query);
            $idAuto = mysql_insert_id();

            //numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto',1,$idAuto)";
            $this->execute($query);

            //data
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
            $this->execute($query);

            //data Extenso
            $dataExtenso = $this->tratarData($data);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataExtenso."',3,$idAuto)";
            $this->execute($query);

            //hora
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$hora',4,$idAuto)";
            $this->execute($query);

            //Nome do Autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nomeAutoado',5,$idAuto)";
            $this->execute($query);
			
			//Nacionalidade
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nacionalidade',24,$idAuto)";
            $this->execute($query);

            //Nº do Passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numPassaporte',30,$idAuto)";
            $this->execute($query);

            //Data de emissão do Passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataEmissaoPassaporte',31,$idAuto)";
            $this->execute($query);

            //Data de Nascimento
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataNascimento',8,$idAuto)";
            $this->execute($query);

            //Local Residente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localResidente',14,$idAuto)";
            $this->execute($query);

            //Local Procedente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localProcedente',22,$idAuto)";
            $this->execute($query);

            //Número do voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroVoo',9,$idAuto)";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$contramarcaFiscal',10,$idAuto)";
            $this->execute($query);
            
            //Separador de bagagem
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$separadorBagagem',43,$idAuto)";
            $this->execute($query);
            
            //Revisor bagagem
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$revisorBagagem',44,$idAuto)";
            $this->execute($query);

            //Descrição
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricao',11,$idAuto)";
            $this->execute($query);

            //Número de Processo de Contraordenação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numProcessoContraOrdenacao',12,$idAuto)";
            $this->execute($query);
            
            //Número de Cigarros
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroCigarros',47,$idAuto)";
            $this->execute($query);

            $this->disconnect();       
    }
    
    function editarAutoCigarros ($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte, 
	$dataNascimento, $localResidente, $localProcedente, $numeroVoo, $contramarcaFiscal, $separadorBagagem, $revisorBagagem, $descricao, $numProcessoContraordenacao, $numeroCigarros){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
            $this->execute($query);

            //data
            $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
            $this->execute($query);

            //data Extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
            $this->execute($query);

            //hora
            $query = "update informacaoautos set Descricao = '$hora' where idCampo = 4 and idAuto = $id";
            $this->execute($query);

            //Nome do Autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
            $this->execute($query);
			
			//Nacionalidade
            $query = "update informacaoautos set Descricao= '$nacionalidade' where idCampo = 24 and idAuto = $id";
            $this->execute($query);

            //numero Passaporte
            $query = "update informacaoautos set Descricao = '$numPassaporte' where idCampo = 30 and idAuto = $id";
            $this->execute($query);

            //Data de emissão Passaporte
            $query = "update informacaoautos set Descricao = '$dataEmissaoPassaporte' where idCampo = 31 and idAuto = $id";
            $this->execute($query);

            //Data de Nascimento
            $query = "update informacaoautos set Descricao = '$dataNascimento' where idCampo = 8 and idAuto = $id";
            $this->execute($query);

            //Local residente
            $query = "update informacaoautos set Descricao = '$localResidente' where idCampo = 14 and idAuto = $id";
            $this->execute($query);

            //Local Procedente
            $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
            $this->execute($query);

            //Número do voo
            $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "update informacaoautos set Descricao = '$contramarcaFiscal' where idCampo = 10 and idAuto = $id";
            $this->execute($query);

            //Separador Bagagem
            $query = "update informacaoautos set Descricao = '$separadorBagagem' where idCampo = 43 and idAuto = $id";
            $this->execute($query);
            
            //Revisor Bagagem
            $query = "update informacaoautos set Descricao = '$revisorBagagem' where idCampo = 44 and idAuto = $id";
            $this->execute($query);
            
            //Descrição
            $query = "update informacaoautos set Descricao = '$descricao' where idCampo = 11 and idAuto = $id";
            $this->execute($query);
			
            //Númro do Processo de Contraordenação
            $query = "update informacaoautos set Descricao = '$numProcessoContraordenacao' where idCampo = 12 and idAuto = $id";
            $this->execute($query);
            
            //Número de Cigarros
            $query = "update informacaoautos set Descricao = '$numeroCigarros' where idCampo = 47 and idAuto = $id";
            $this->execute($query);
	
            $this->disconnect();       
    }
    
    //DINHEIRO M - FEITO
    function inserirAutoDinheiroM($numeroAuto, $data, $hora, $nomeAutoado,  $nacionalidade, $numPassaporte,
        $dataNascimento, $morada, $localProcedente, $numeroVoo, $separadorBagagem, $revisorBagagem, $dinheiroQueTransportava, $numProcessoContraOrdenacao, $idUtilizador)
        {
        $this->connect();
        //criar um auto de um determinado tipo

        $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ($numeroAuto, 3, $idUtilizador)";;
        $this->execute($query);
        $idAuto = mysql_insert_id();

        //numero Auto
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto',1,$idAuto)";
        $this->execute($query);

        //data 
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
        $this->execute($query);

        //data  Extenso
        $dataExtenso = $this->tratarData($data);
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataExtenso."',3,$idAuto)";
        $this->execute($query);

        //hora
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$hora',4,$idAuto)";
        $this->execute($query);

        //Nome do Autoado
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nomeAutoado',5,$idAuto)";
        $this->execute($query);
        
        //Nacionalidade
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nacionalidade',24,$idAuto)";
        $this->execute($query);
        
        //Passaporte N.º
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numPassaporte',30,$idAuto)";
        $this->execute($query);
        
         //dataNascimento
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataNascimento',8,$idAuto)";
        $this->execute($query);
        
        //morada
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$morada',21,$idAuto)";
        $this->execute($query);
        
        //Local procedente
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localProcedente',22,$idAuto)";
        $this->execute($query);

        //Número de voo
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroVoo',9,$idAuto)";
        $this->execute($query);

        //Técnico Separador de Bagagem
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$separadorBagagem."',43,$idAuto)";
        $this->execute($query);
            
        //Técnico Revisor de Bagagem
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$revisorBagagem."',44,$idAuto)";
        $this->execute($query);
            
        //Dinheiro que Transportava
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dinheiroQueTransportava',25,$idAuto)";
        $this->execute($query);
        
        //nº pco
        $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numProcessoContraOrdenacao',12,$idAuto)";
        $this->execute($query);
        
        $this->disconnect();       
    }
    function editarAutoDinheiroM($id, $numeroAuto, $data, $hora, $nomeAutoado,  $nacionalidade, $numPassaporte,
        $dataNascimento, $morada, $localProcedente, $numeroVoo, $separadorBagagem, $revisorBagagem,$dinheiroQueTransportava, $numProcessoContraOrdenacao)
        {
	$this->connect();

        //criar um auto de um determinado tipo

        $query = "update autos set numeroAuto = $numeroAuto where id = $id";
        $this->execute($query);

        //numero Auto
        $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
        $this->execute($query);

        //data
        $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
        $this->execute($query);

        //data Extenso
        $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
        $this->execute($query);

        //hora
        $query = "update informacaoautos set Descricao = '$hora' where idCampo = 4 and idAuto = $id";
        $this->execute($query);

        //Nome do Autoado
        $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
        $this->execute($query);

        //Nacionalidade
        $query = "update informacaoautos set Descricao = '$nacionalidade' where idCampo = 24 and idAuto = $id";
        $this->execute($query);
        
        //numero Passaporte
        $query = "update informacaoautos set Descricao = '$numPassaporte' where idCampo = 30 and idAuto = $id";
        $this->execute($query);
        
        //Data de Nascimento
        $query = "update informacaoautos set Descricao = '$dataNascimento' where idCampo = 8 and idAuto = $id";
        $this->execute($query);
        
        //Morada
        $query = "update informacaoautos set Descricao = '$morada' where idCampo = 21 and idAuto = $id";
        $this->execute($query);

        //Local Procedente
        $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
        $this->execute($query);

        //Número do voo
        $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
        $this->execute($query);

        //Técnico Separador de Bagagem
        $query = "update informacaoautos set Descricao = '$separadorBagagem' where idCampo = 43 and idAuto = $id";
        $this->execute($query);
            
        //Técnico Revisor de Bagagem
        $query = "update informacaoautos set Descricao = '$revisorBagagem' where idCampo = 44 and idAuto = $id";
        $this->execute($query);
            
        //Dinheiro que Transportava
        $query = "update informacaoautos set Descricao = '$dinheiroQueTransportava' where idCampo = 25 and idAuto = $id";
        $this->execute($query);
        
        //nº pco
        $query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
        $this->execute($query);
        
        $this->disconnect();       
    }
    
   //RELÓGIO PULSO - WIP
    function inserirAutoRelogioPulso ($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numDocIdentificacao, $validadeDocIdentificacao, $dataNascimento,
            $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $separadorBagagem, $revisorBagagem, $descricao, $numProcessoContraOrdenacao, $idUtilizador){
            $this->connect();
            //criar um auto de um determinado tipo
            
            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ('$numeroAuto', 4, $idUtilizador)";
            $this->execute($query);
            $idAuto = mysql_insert_id();
            
            //numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto', 1,$idAuto)";
            $this->execute($query);

            //data  
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
            $this->execute($query);

            //data  Extenso
            $dataExtenso = $this->tratarData($data);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataExtenso."',3,$idAuto)";
            $this->execute($query);

            //Hora
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$hora."', 4, $idAuto)";
            $this->execute($query);

            //nome do autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$nomeAutoado."',5,$idAuto)";
            $this->execute($query);

            //Nacionalidade
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nacionalidade',24,$idAuto)";
            $this->execute($query);
            
            //Número do Documento de Identificação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values(' $numDocIdentificacao',6,$idAuto)";
            $this->execute($query);

            //Validade do Documento de Identificação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values(' $validadeDocIdentificacao',41,$idAuto)";
            $this->execute($query);

            //Data de Nascimento
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataNascimento',8,$idAuto)";
            $this->execute($query);

            //Morada
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$morada',21,$idAuto)";
            $this->execute($query);

            //Local procedente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localProcedente',22,$idAuto)";
            $this->execute($query);

            //Número de voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroVoo',9,$idAuto)";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$contramarcaFiscal',10,$idAuto)";
            $this->execute($query);
            
            //Separador de bagagem
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$separadorBagagem',43,$idAuto)";
            $this->execute($query);
            
            //Revisor bagagem
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$revisorBagagem',44,$idAuto)";
            $this->execute($query);
            
            //Descrição
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricao',11,$idAuto)";
            $this->execute($query);

            //Processo de Contraordenação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numProcessoContraOrdenacao',12,$idAuto)";
            $this->execute($query);


            $this->disconnect();       
    }

    function editarAutoRelogioPulso ($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numDocIdentificacao, $validadeDocIdentificacao, $dataNascimento,
            $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $separadorBagagem, $revisorBagagem, $descricao, $numProcessoContraOrdenacao){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
            $this->execute($query);

            //data 
            $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
            $this->execute($query);

            //data  Extenso
            $dataExtenso = $this->tratarData($data);
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
            $this->execute($query);

            //Hora
            $query = "update informacaoautos set Descricao = '$hora' where idCampo = 4 and idAuto = $id";
            $this->execute($query);

            //nome do autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
            $this->execute($query);
            
            //Nacionalidade
            $query = "update informacaoautos set Descricao = '$nacionalidade' where idCampo = 24 and idAuto = $id";
            $this->execute($query);
        
            //Número do Documento de Identificação
            $query = "update informacaoautos set Descricao = '$numDocIdentificacao' where idCampo = 6 and idAuto = $id";
            $this->execute($query);

            //Validade do Documento de Identificação
            $query = "update informacaoautos set Descricao = '$validadeDocIdentificacao' where idCampo = 41 and idAuto = $id";
            $this->execute($query);

            //Data de Nascimento
            $query = "update informacaoautos set Descricao = '$dataNascimento' where idCampo = 8 and idAuto = $id";
            $this->execute($query);

            //Morada
            $query = "update informacaoautos set Descricao = '$morada' where idCampo = 21 and idAuto = $id";
            $this->execute($query);

            //Local procedente
            $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
            $this->execute($query);

            //Número de voo
            $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "update informacaoautos set Descricao = '$contramarcaFiscal' where idCampo = 10 and idAuto = $id";
            $this->execute($query);

            //Técnico Separador de Bagagem
            $query = "update informacaoautos set Descricao = '$separadorBagagem' where idCampo = 43 and idAuto = $id";
            $this->execute($query);

            //Técnico Revisor de Bagagem
            $query = "update informacaoautos set Descricao = '$revisorBagagem' where idCampo = 44 and idAuto = $id";
            $this->execute($query);
            
            //Descrição
            $query = "update informacaoautos set Descricao = '$descricao' where idCampo = 11 and idAuto = $id";
            $this->execute($query);

            //Processo de Contraordenação
            $query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
            $this->execute($query);

             $this->disconnect();  		
    }

    //CITES MARFIM - FEITO
    function inserirAutoCitesMarfim($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
                                    $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $revisorBagagem, $materialQueTransportava,
                                    $tituloDeposito, $dataTituloDeposito, $idUtilizador){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ($numeroAuto, 5, $idUtilizador)";;
            $this->execute($query);
            $idAuto = mysql_insert_id();

            //numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto',1,$idAuto)";
			$this->execute($query);

            //data 
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
            $this->execute($query);

            //data  Extenso
            $dataExtenso = $this->tratarData($data);
            $query = "insert into  informacaoautos(Descricao, idCampo, idAuto) values('".$dataExtenso."',3,$idAuto)";
            $this->execute($query);
			
            //hora
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$hora',4,$idAuto)";
			$this->execute($query);

            //Nome do Autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nomeAutoado',5,$idAuto)";
			$this->execute($query);

            //Nacionalidade
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nacionalidade',24,$idAuto)";
			$this->execute($query);

            //Nº do passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numPassaporte',30,$idAuto)";
			$this->execute($query);

            //Data de emissão da Identificação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataEmissaoPassaporte',31,$idAuto)";
			$this->execute($query);

            //Data de Nascimento
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataNascimento',8,$idAuto)";
			$this->execute($query);
                            
            //Morada
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$morada',21,$idAuto)";
			$this->execute($query); 
                        
            //Local Procedente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localProcedente',22,$idAuto)";
			$this->execute($query);
        
            //Número do voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroVoo',9,$idAuto)";
			$this->execute($query);

            //Contramarca Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$contramarcaFiscal',10,$idAuto)";
			$this->execute($query);
                        
            //Técnico Revisor de Bagagem$n
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$revisorBagagem',44,$idAuto)";
            $this->execute($query);

            //Material que transportava
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$materialQueTransportava',32,$idAuto)";
			$this->execute($query);
                        
            //Titulo de Deposito
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$tituloDeposito',39,$idAuto)";
			$this->execute($query);

            //Data do titulo de deposito
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataTituloDeposito',40,$idAuto)";
			$this->execute($query);

			$this->disconnect();
			}			
    function editarAutoCitesMarfim ($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
                                $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $revisorBagagem, $materialQueTransportava,
                                $tituloDeposito, $dataTituloDeposito){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
            $this->execute($query);

            //data
            $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
            $this->execute($query);

            //data Extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
            $this->execute($query);

            //hora
            $query = "update informacaoautos set Descricao = '$hora' where idCampo = 4 and idAuto = $id";
            $this->execute($query);

            //Nome do Autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
            $this->execute($query);
            
            //Nacionalidade
            $query = "update informacaoautos set Descricao = '$nacionalidade' where idCampo = 24 and idAuto = $id";
            $this->execute($query);
        
            //numero Passaporte
            $query = "update informacaoautos set Descricao = '$numPassaporte' where idCampo = 30 and idAuto = $id";
            $this->execute($query);

            //Data de emissão Passaporte
            $query = "update informacaoautos set Descricao = '$dataEmissaoPassaporte' where idCampo = 31 and idAuto = $id";
            $this->execute($query);

            //Data de Nascimento
            $query = "update informacaoautos set Descricao = '$dataNascimento' where idCampo = 8 and idAuto = $id";
            $this->execute($query);

            //morada
            $query = "update informacaoautos set Descricao = '$morada' where idCampo = 21 and idAuto = $id";
            $this->execute($query);

            //Local Procedente
            $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
            $this->execute($query);
            
            //Número do voo
            $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "update informacaoautos set Descricao = '$contramarcaFiscal' where idCampo = 10 and idAuto = $id";
            $this->execute($query);
            
            //Revisor Bagagem
            $query = "update informacaoautos set Descricao = '$revisorBagagem' where idCampo = 44 and idAuto = $id";
            $this->execute($query);

            //Material que Transportava
            $query = "update informacaoautos set Descricao = '$materialQueTransportava' where idCampo = 32 and idAuto = $id";
            $this->execute($query);
            
            //Titulo de depósito
            $query = "update informacaoautos set Descricao = '$tituloDeposito' where idCampo = 39 and idAuto = $id";
            $this->execute($query);
			
            //Data do título de Depósito
            $query = "update informacaoautos set Descricao = '$dataTituloDeposito' where idCampo = 40 and idAuto = $id";
            $this->execute($query);

            $this->disconnect();       
    }
    //110A - REVER TUDO
    ////Feito
    function inserirAuto110a ($numeroAuto, $data, $dataocorrencia, $nomeAutoado, $contribuinteFiscal, $localResidente, 
                              $nomeEmpresa, $contribuinteFiscalEmpresa, $sedeSocialEmpresa, $dataEntregaDeclaracao,
                              $numDeclaracao, $numProcessoContraOrdenacao, $idUtilizador){
            $this->connect();
            //criar um auto de um determinado tipo
            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ('".$numeroAuto."', 6, $idUtilizador)";
            $this->execute($query);
            $idAuto = mysql_insert_id();

            //numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$numeroAuto."', 1,$idAuto)";
            $this->execute($query);

            //data
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
            $this->execute($query);

            //data Extenso
            $dataExtenso = $this->tratarData($data);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataExtenso."',3,$idAuto)";
            $this->execute($query);

            //dataocorrencia
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataocorrencia."',45,$idAuto)";
            $this->execute($query);
            
            //dataocorrenciaextenso«
            $dataOcorrenciaExtenso = $this->tratarData($dataocorrencia);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataOcorrenciaExtenso."',46,$idAuto)";
            $this->execute($query);
            
            //Nome do Autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$nomeAutoado."',5,$idAuto)";
            $this->execute($query);

            //Contribuinte Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$contribuinteFiscal."',13,$idAuto)";
            $this->execute($query);

            //Local Residente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$localResidente."',14,$idAuto)";
            $this->execute($query);

            //Nome da Empresa
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$nomeEmpresa."',15,$idAuto)";
            $this->execute($query);

            //Contribuinte Fiscal da Empresa
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$contribuinteFiscalEmpresa."',16,$idAuto)";
            $this->execute($query);

            //Sede Social da Empresa
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$sedeSocialEmpresa."',17,$idAuto)";
            $this->execute($query);

            //Data da entrega da declaração
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$dataEntregaDeclaracao."',18, $idAuto)";
            $this->execute($query);

            //Número da declaração
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$numDeclaracao."',19,$idAuto)";
            $this->execute($query);		

            //nº pco
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$numProcessoContraOrdenacao."',12,$idAuto)";
            $this->execute($query);
            
            $this->disconnect();       
    }
	////Feito
    function editarAuto110a ($id, $numeroAuto, $data, $dataocorrencia, $nomeAutoado, $contribuinteFiscal, $localResidente,
                    $nomeEmpresa, $contribuinteFiscalEmpresa, $sedeSocialEmpresa, $dataEntregaDeclaracao, $numDeclaracao, $numProcessoContraOrdenacao){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
            $this->execute($query);

            //data
            $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
            $this->execute($query);

            //data Extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
            $this->execute($query);
            
            //dataocorrencia
            $query = "update informacaoautos set Descricao = '$dataocorrencia' where idCampo = 45 and idAuto = $id";
            $this->execute($query);
            
            //data Ocorrencia Extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($dataocorrencia)."' where idCampo = 46 and idAuto = $id";
            $this->execute($query);

            //Nome do Autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
            $this->execute($query);

            //Contribuinte Fiscal
            $query = "update informacaoautos set Descricao = '$contribuinteFiscal' where idCampo = 13 and idAuto = $id";
            $this->execute($query);

            //Local Residente
            $query = "update informacaoautos set Descricao = '$localResidente' where idCampo = 14 and idAuto = $id";
            $this->execute($query);

            //Nome da Empresa
            $query = "update informacaoautos set Descricao = '$nomeEmpresa' where idCampo = 15 and idAuto = $id";
            $this->execute($query);

            //Contribuinte Fiscal da Empresa
            $query = "update informacaoautos set Descricao = '$contribuinteFiscalEmpresa' where idCampo = 16 and idAuto = $id";
            $this->execute($query);

            //Sede Social da Empresa
            $query = "update informacaoautos set Descricao = '$sedeSocialEmpresa' where idCampo = 17 and idAuto = $id";
            $this->execute($query);

            //Data da entrega da declaração
            $query = "update informacaoautos set Descricao = '$dataEntregaDeclaracao' where idCampo = 18 and idAuto = $id";
            $this->execute($query);

            //Número da declaração
            $query = "update informacaoautos set Descricao = '$numDeclaracao' where idCampo = 19 and idAuto = $id";
            $this->execute($query);
            
            //nº pco
            $query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
            $this->execute($query);

            $this->disconnect();       
    }
    //108n6 - REVER
    function inserirAutoDinheiro108n6 ($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte, $dataNascimento,
            $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $dataVoo, $tecnicoSeparador, $tecnicoRevisor, $numProcessoContraOrdenacao, $descricao, $idUtilizador){
            $this->connect();
	
            //Criar um auto de um determinado tipo

            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ($numeroAuto, 7, $idUtilizador)";
            $this->execute($query);
            $idAuto = mysql_insert_id();

            //Numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto',1,$idAuto)";
			$this->execute($query);

            //Data 
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
			$this->execute($query);

            //Data por extenso
            $data = $this->tratarData($data);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',3,$idAuto)";
			$this->execute($query);

            //Hora
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$hora',4,$idAuto)";
			$this->execute($query);

            //Nome do Autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nomeAutoado',5,$idAuto)";
			$this->execute($query);
			
            //Nacionalidade
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nacionalidade',24,$idAuto)";
            $this->execute($query);

            //Nº de Passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numPassaporte',30,$idAuto)";
			$this->execute($query);

            //Data de Emissão Passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataEmissaoPassaporte',31,$idAuto)";
			$this->execute($query);

            //Data de Nascimento
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataNascimento',8,$idAuto)";
			$this->execute($query);

            //Morada
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$morada',21,$idAuto)";
			$this->execute($query);

            //Local Procedente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localProcedente',22,$idAuto)";
			$this->execute($query);

            //Número do voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroVoo',9,$idAuto)";
			$this->execute($query);

            //Contramarca Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$contramarcaFiscal',10,$idAuto)";
			$this->execute($query);

            //Data Voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataVoo',27,$idAuto)";
			$this->execute($query);
                        
             //Técnico Separador
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$tecnicoSeparador',44,$idAuto)";
            $this->execute($query);
            
             //Técnico Revisor
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$tecnicoRevisor',43,$idAuto)";
            $this->execute($query);

            //Descrição
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricao',11,$idAuto)";
            $this->execute($query);

            //Número de Processo de Contraordenação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numProcessoContraOrdenacao',12,$idAuto)";
            $this->execute($query);	

            $this->disconnect();  

            }

    function editarDinheiro108n6 ($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte, 
            $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $dataVoo, $tecnicoSeparador, $tecnicoRevisor,
            $numProcessoContraOrdenacao, $descricao){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
            $this->execute($query);

            //data
            $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
            $this->execute($query);

            //data Extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
            $this->execute($query);

            //hora
            $query = "update informacaoautos set Descricao = '$hora' where idCampo = 4 and idAuto = $id";
            $this->execute($query);

            //Nome do Autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
            $this->execute($query);
			
            //Nacionalidade
            $query = "update informacaoautos set Descricao = '$nacionalidade' where idCampo = 24 and idAuto = $id";
            $this->execute($query);

            //numero Passaporte
            $query = "update informacaoautos set Descricao = '$numPassaporte' where idCampo = 30 and idAuto = $id";
            $this->execute($query);

            //Data de emissão Passaporte
            $query = "update informacaoautos set Descricao = '$dataEmissaoPassaporte' where idCampo = 31 and idAuto = $id";
            $this->execute($query);

            //Data de Nascimento
            $query = "update informacaoautos set Descricao = '$dataNascimento' where idCampo = 8 and idAuto = $id";
            $this->execute($query);

            //morada
            $query = "update informacaoautos set Descricao = '$morada' where idCampo = 21 and idAuto = $id";
            $this->execute($query);

            //Local Procedente
            $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
            $this->execute($query);

            //Número do voo
            $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "update informacaoautos set Descricao = '$contramarcaFiscal' where idCampo = 10 and idAuto = $id";
            $this->execute($query);
			
            //Data do Voo
            $query = "update informacaoautos set Descricao = '$dataVoo' where idCampo = 27 and idAuto = $id";
            $this->execute($query);
            
            //Técnico Separador
            $query = "update informacaoautos set Descricao = '$tecnicoSeparador' where idCampo = 44 and idAuto = $id";
            $this->execute($query);
            
             //Técnico Revisor
            $query = "update informacaoautos set Descricao = '$tecnicoRevisor' where idCampo = 43 and idAuto = $id";
            $this->execute($query);
            	
            //Descrição
            $query = "update informacaoautos set Descricao = '$descricao' where idCampo = 11 and idAuto = $id";
            $this->execute($query);	
            
	    //Número de Processo de Contraordenação
            $query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
            $this->execute($query);	
		

            $this->disconnect();       
    }
    
//111 - REVER
    ////Feito
    function inserirAuto111 ($numeroAuto, $data, $nomeAutoado, $contribuinteFiscal, $morada, $localProcedente, $numeroVoo, 
            $materialQueTransportava, $reexportacaoInutilizacao, $numAutoRetencao, $respostaEntidade, $numOficio, $dataOficio, 
            $dataRececaoOficio, $numProcessoContraOrdenacao, $idUtilizador){
            $this->connect();
            //Criar auto do tipo 111

            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ($numeroAuto, 8, $idUtilizador)";
            $this->execute($query);
            $idAuto = mysql_insert_id();

            //Numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto',1,$idAuto)";
			$this->execute($query);

            //Data
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
			$this->execute($query);

            //Data por extenso
            $dataExtenso = $this->tratarData($data);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataExtenso',3,$idAuto)";
			$this->execute($query);

            //Nome do Autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nomeAutoado',5,$idAuto)";
			$this->execute($query);

            //Contribuinte Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$contribuinteFiscal',13,$idAuto)";
			$this->execute($query);

            //Morada
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$morada',21,$idAuto)";
			$this->execute($query);

            //Local Procedente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localProcedente',22,$idAuto)";
			$this->execute($query);

            //Número do voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroVoo',9,$idAuto)";
			$this->execute($query);

            //Material que Transportava
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$materialQueTransportava',32,$idAuto)";
			$this->execute($query);

            //Escolher entre reexportação e inutilização
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$reexportacaoInutilizacao',33,$idAuto)";
			$this->execute($query);

            //N.º de Auto de Retenção
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numAutoRetencao',34,$idAuto)";
			$this->execute($query);

            //Resposta de Entidade
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$respostaEntidade',35,$idAuto)";
			$this->execute($query);

            //N.º do Ofício
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numOficio',36,$idAuto)";
			$this->execute($query);

            //Data do Ofício
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataOficio',37,$idAuto)";
			$this->execute($query);

            //Data da rececao do oficio
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataRececaoOficio',23,$idAuto)";
			$this->execute($query);

            //nº pco
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numProcessoContraOrdenacao',12,$idAuto)";
			$this->execute($query);
                        
            $this->disconnect();

            }
	
	////Feito
    function editarAuto111 ($id, $numeroAuto, $data, $nomeAutoado, $contribuinteFiscal, $morada, $localProcedente, $numeroVoo, 
            $materialQueTransportava, $reexportacaoInutilizacao, $numAutoRetencao, $respostaEntidade, $numOficio, $dataOficio, 
            $dataRececaoOficio, $numProcessoContraOrdenacao){
            $this->connect();
            //Actualizar as informações do auto atravez do seu numero de id

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
			$this->execute($query);

            //data
            $query = "update informacaoautos set Descricao = '".$data."' where idCampo = 2 and idAuto = $id";
			$this->execute($query);

            //data por extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
			$this->execute($query);

            //Nome do Autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
			$this->execute($query);

            //Contribuinte Fiscal
            $query = "update informacaoautos set Descricao = '$contribuinteFiscal' where idCampo = 13 and idAuto = $id";
			$this->execute($query);

            //Morada
            $query = "update informacaoautos set Descricao = '$morada' where idCampo = 21 and idAuto = $id";
			$this->execute($query);

            //Local Procedente
            $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
			$this->execute($query);

            //Número do voo
            $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
			$this->execute($query);

            //Material que transportava
            $query = "update informacaoautos set Descricao = '$materialQueTransportava' where idCampo = 32 and idAuto = $id";
			$this->execute($query);

            //Escolher entre reexportação e inutilização
            $query = "update informacaoautos set Descricao = '$reexportacaoInutilizacao' where idCampo = 33 and idAuto = $id";
			$this->execute($query);

            //N.º de Auto de Retenção
            $query = "update informacaoautos set Descricao = '$numAutoRetencao' where idCampo = 34 and idAuto = $id";
			$this->execute($query);

            //Resposta de Entidade
            $query = "update informacaoautos set Descricao = '$respostaEntidade' where idCampo = 35 and idAuto = $id";
			$this->execute($query);

            //N.º do Ofício
            $query = "update informacaoautos set Descricao = '$numOficio' where idCampo = 36 and idAuto = $id";
			$this->execute($query);

            //Data do Ofício
            $query = "update informacaoautos set Descricao = '$dataOficio' where idCampo = 37 and idAuto = $id";
			$this->execute($query);

            //Data da rececao do oficio
            $query = "update informacaoautos set Descricao = '$dataRececaoOficio' where idCampo = 23 and idAuto = $id";
			$this->execute($query);
                        
            //nº pco
            $query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
			$this->execute($query);
                        
            $this->disconnect();

    }
    //108A - WIP
    function inserirAuto108a($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, 
                            $dataEmissaoPassaporte,	$dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, 
                            $dataVoo, $separadorBagagem, $revisorBagagem, $descricao, $numProcessoContraOrdenacao, 
                            $descricaoEspecificoDescaminho, $idTecnico){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ($numeroAuto, 9, $idTecnico)";;
            $this->execute($query);
            $idAuto = mysql_insert_id();

            //numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto',1,$idAuto)";
			$this->execute($query);

            //Data 
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
			$this->execute($query);

            //Data por extenso
            $data = $this->tratarData($data);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',3,$idAuto)";
			$this->execute($query);

            //hora
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$hora',4,$idAuto)";
			$this->execute($query);

            //Nome do Autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nomeAutoado',5,$idAuto)";
			$this->execute($query);
			
			//Nacionalidade
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nacionalidade',24,$idAuto)";
			$this->execute($query);

            //Passaporte Nº
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numPassaporte',30,$idAuto)";
			$this->execute($query);

            //Data de emissão do Passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataEmissaoPassaporte',31,$idAuto)";
			$this->execute($query);

            //Data de Nascimento
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataNascimento',8,$idAuto)";
			$this->execute($query);

            //Morada
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$morada',21,$idAuto)";
			$this->execute($query);

            //Local Procedente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localProcedente',22,$idAuto)";
			$this->execute($query);

            //Número do voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroVoo',9,$idAuto)";
			$this->execute($query);

            //Contramarca Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$contramarcaFiscal',10,$idAuto)";
			$this->execute($query);
            
			//Data do Voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataVoo',27,$idAuto)";
			$this->execute($query);
			
			//Separador
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$separadorBagagem',43,$idAuto)";
			$this->execute($query);
			
			//Revisor
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$revisorBagagem',44,$idAuto)";
			$this->execute($query);
            
			//Descrição
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricao',11,$idAuto)";
			$this->execute($query);
			
			//Número de Processo de Contraordenação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numProcessoContraOrdenacao',12,$idAuto)";
			$this->execute($query);

            //Descrição Especifica Descaminho
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricaoEspecificoDescaminho',42,$idAuto)";
			$this->execute($query);

			$this->disconnect();       
    }
		
////Feito
    function editarAuto108a($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
                            $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $dataVoo, 
                            $separadorBagagem, $revisorBagagem, $descricao,
                            $numProcessoContraOrdenacao, $descricaoEspecificoDescaminho){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
            $this->execute($query);

            //data
            $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
            $this->execute($query);

            //data Extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
            $this->execute($query);

            //hora
            $query = "update informacaoautos set Descricao = '$hora' where idCampo = 4 and idAuto = $id";
            $this->execute($query);

            //Nome do Autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
            $this->execute($query);
			
			 //nacionalidade
            $query = "update informacaoautos set Descricao = '$nacionalidade' where idCampo = 24 and idAuto = $id";
            $this->execute($query);

            //numero Passaporte
            $query = "update informacaoautos set Descricao = '$numPassaporte' where idCampo = 30 and idAuto = $id";
            $this->execute($query);

            //Data de emissão Passaporte
            $query = "update informacaoautos set Descricao = '$dataEmissaoPassaporte' where idCampo = 31 and idAuto = $id";
            $this->execute($query);

            //Data de Nascimento
            $query = "update informacaoautos set Descricao = '$dataNascimento' where idCampo = 8 and idAuto = $id";
            $this->execute($query);

            //Morada
            $query = "update informacaoautos set Descricao = '$morada' where idCampo = 21 and idAuto = $id";
            $this->execute($query);

            //Local Procedente
            $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
            $this->execute($query);

            //Número do voo
            $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "update informacaoautos set Descricao = '$contramarcaFiscal' where idCampo = 10 and idAuto = $id";
            $this->execute($query);

			//Data de voo
            $query = "update informacaoautos set Descricao = '$dataVoo' where idCampo = 22 and idAuto = $id";
            $this->execute($query);
			
			//Separador
            $query = "update informacaoautos set Descricao = '$separadorBagagem' where idCampo = 43 and idAuto = $id";
            $this->execute($query);
			
			//Revisor
            $query = "update informacaoautos set Descricao = '$revisorBagagem' where idCampo = 44 and idAuto = $id";
            $this->execute($query);
			
            //Descrição
            $query = "update informacaoautos set Descricao = '$descricao' where idCampo = 11 and idAuto = $id";
            $this->execute($query);
			
			//Número de Processo de Contraordenação
            $query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
            $this->execute($query);

			//Descrição específica descaminho
            $query = "update informacaoautos set Descricao = '$descricaoEspecificoDescaminho' where idCampo = 42 and idAuto = $id";
            $this->execute($query);			

            $this->disconnect();       
    }
    //108B - FEITO
    function inserirAuto108b($numeroAuto, $data, $descricao, $descricao2, $descricao3, $numProcessoContraOrdenacao, $idUtilizador){
		$this->connect();
		//criar um auto de um determinado tipo

		$query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ($numeroAuto, 10, $idUtilizador)";;
		$this->execute($query);
		$idAuto = mysql_insert_id();

		//numero Auto
		$query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto',1,$idAuto)";
		$this->execute($query);

		//data
		$query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
		$this->execute($query);

		//data extenso
		$data = $this->tratarData($data);
		$query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',3,$idAuto)";
		$this->execute($query);
		
                //numero de pco
                $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$numProcessoContraOrdenacao."',12,$idAuto)";
		$this->execute($query);
                
		//Descrição
		$query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricao',11,$idAuto)";
		$this->execute($query);
                
                $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricao2',48,$idAuto)";
		$this->execute($query);
                
                $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricao3',49,$idAuto)";
		$this->execute($query);

		$this->disconnect();       
    }
	 
    function editarAuto108b($id, $numeroAuto, $data, $descricao,$descricao2,$descricao3, $numProcessoContraOrdenacao){
		$this->connect();
		
		$query = "update autos set numeroAuto = $numeroAuto where id = $id";
		$this->execute($query);

		//numero Auto
		$query = "update informacaoautos set Descricao='$numeroAuto' where idCampo = 1 and idAuto = $id"; 
		$this->execute($query);

		//data
		$query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
		$this->execute($query);

		//data extenso
		$data = $this->tratarData($data);
		$query = "update informacaoautos set Descricao = '$data' where idCampo = 3 and idAuto = $id";
		$this->execute($query);
		
                //nº PCO
		$query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
		$this->execute($query);
                
		//Descrição
		$query = "update informacaoautos set Descricao = '$descricao' where idCampo = 11 and idAuto = $id";
		$this->execute($query);
                
                $query = "update informacaoautos set Descricao = '$descricao2' where idCampo = 48 and idAuto = $id";
		$this->execute($query);
                
                $query = "update informacaoautos set Descricao = '$descricao3' where idCampo = 49 and idAuto = $id";
		$this->execute($query);

		$this->disconnect();       
    }
    
    function getTextoAuto($idTipoAuto){
        $this->connect();
        $query = "select * from textoautos where idTipoAuto = $idTipoAuto";
        $res = $this->execute($query);
        $this->disconnect();       		
        return $res;
    }
        
    function inserirAutoMercadoriaA($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, 
                            $dataEmissaoPassaporte, $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, 
                            $dataVoo, $separadorBagagem, $revisorBagagem, $descricao, $numProcessoContraOrdenacao, 
                            $descricaoEspecificaMercadoria, $SeparadoBagagem, $idTecnico){
         
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "insert into autos(numeroAuto, idTipoAuto, idUtilizador) values ($numeroAuto, 11, $idTecnico)";;
            $this->execute($query);
            $idAuto = mysql_insert_id();

            //numero Auto
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroAuto',1,$idAuto)";
			$this->execute($query);

            //Data 
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',2,$idAuto)";
			$this->execute($query);

            //Data por extenso
            $data = $this->tratarData($data);
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('".$data."',3,$idAuto)";
			$this->execute($query);

            //hora
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$hora',4,$idAuto)";
			$this->execute($query);

            //Nome do Autoado
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nomeAutoado',5,$idAuto)";
			$this->execute($query);
			
			//Nacionalidade
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$nacionalidade',24,$idAuto)";
			$this->execute($query);

            //Passaporte Nº
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numPassaporte',30,$idAuto)";
			$this->execute($query);

            //Data de emissão do Passaporte
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataEmissaoPassaporte',31,$idAuto)";
			$this->execute($query);

            //Data de Nascimento
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataNascimento',8,$idAuto)";
			$this->execute($query);

            //Morada
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$morada',21,$idAuto)";
			$this->execute($query);

            //Local Procedente
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$localProcedente',22,$idAuto)";
			$this->execute($query);

            //Número do voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numeroVoo',9,$idAuto)";
			$this->execute($query);

            //Contramarca Fiscal
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$contramarcaFiscal',10,$idAuto)";
			$this->execute($query);
            
			//Data do Voo
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$dataVoo',27,$idAuto)";
			$this->execute($query);
			
			//Separador
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$separadorBagagem',43,$idAuto)";
			$this->execute($query);
			
			//Revisor
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$revisorBagagem',44,$idAuto)";
			$this->execute($query);
            
			//Descrição
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricao',11,$idAuto)";
			$this->execute($query);
			
			//Número de Processo de Contraordenação
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$numProcessoContraOrdenacao',12,$idAuto)";
			$this->execute($query);

            //Descrição Especifica Mercadoria
            
          $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$descricaoEspecificaMercadoria',42,$idAuto)";
			$this->execute($query);

			  
            $query = "insert into informacaoautos(Descricao, idCampo, idAuto) values('$SeparadoBagagem',45,$idAuto)";
          $this->execute($query);
           
           $this->disconnect();    
                            
    }
	
////falta data e data extenso
    function editarAutoMercadoriaA($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
                            $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $dataVoo, 
                            $separadorBagagem, $revisorBagagem, $descricao,
                            $numProcessoContraOrdenacao, $descricaoEspecificaMercadoria,$SeparadoBagagem){
            $this->connect();
            //criar um auto de um determinado tipo

            $query = "update autos set numeroAuto = $numeroAuto where id = $id";
            $this->execute($query);

            //numero Auto
            $query = "update informacaoautos set Descricao = '$numeroAuto' where idCampo = 1 and idAuto = $id";
            $this->execute($query);

            //data
            $query = "update informacaoautos set Descricao = '$data' where idCampo = 2 and idAuto = $id";
            $this->execute($query);

            //data Extenso
            $query = "update informacaoautos set Descricao = '".$this->tratarData($data)."' where idCampo = 3 and idAuto = $id";
            $this->execute($query);

            //hora
            $query = "update informacaoautos set Descricao = '$hora' where idCampo = 4 and idAuto = $id";
            $this->execute($query);

            //Nome do Autoado
            $query = "update informacaoautos set Descricao = '$nomeAutoado' where idCampo = 5 and idAuto = $id";
            $this->execute($query);
			
			 //nacionalidade
            $query = "update informacaoautos set Descricao = '$nacionalidade' where idCampo = 24 and idAuto = $id";
            $this->execute($query);

            //numero Passaporte
            $query = "update informacaoautos set Descricao = '$numPassaporte' where idCampo = 30 and idAuto = $id";
            $this->execute($query);

            //Data de emissão Passaporte
            $query = "update informacaoautos set Descricao = '$dataEmissaoPassaporte' where idCampo = 31 and idAuto = $id";
            $this->execute($query);

            //Data de Nascimento
            $query = "update informacaoautos set Descricao = '$dataNascimento' where idCampo = 8 and idAuto = $id";
            $this->execute($query);

            //Morada
            $query = "update informacaoautos set Descricao = '$morada' where idCampo = 21 and idAuto = $id";
            $this->execute($query);

            //Local Procedente
            $query = "update informacaoautos set Descricao = '$localProcedente' where idCampo = 22 and idAuto = $id";
            $this->execute($query);

            //Número do voo
            $query = "update informacaoautos set Descricao = '$numeroVoo' where idCampo = 9 and idAuto = $id";
            $this->execute($query);

            //Contramarca Fiscal
            $query = "update informacaoautos set Descricao = '$contramarcaFiscal' where idCampo = 10 and idAuto = $id";
            $this->execute($query);

			//Data de voo
            $query = "update informacaoautos set Descricao = '$dataVoo' where idCampo = 22 and idAuto = $id";
            $this->execute($query);
			
			//Separador
            $query = "update informacaoautos set Descricao = '$separadorBagagem' where idCampo = 43 and idAuto = $id";
            $this->execute($query);
			
			//Revisor
            $query = "update informacaoautos set Descricao = '$revisorBagagem' where idCampo = 44 and idAuto = $id";
            $this->execute($query);
			
            //Descrição
            $query = "update informacaoautos set Descricao = '$descricao' where idCampo = 11 and idAuto = $id";
            $this->execute($query);
			
			//Número de Processo de Contraordenação
            $query = "update informacaoautos set Descricao = '$numProcessoContraOrdenacao' where idCampo = 12 and idAuto = $id";
            $this->execute($query);

			//Descrição específica Mercadoria
            $query = "update informacaoautos set Descricao = '$descricaoEspecificaMercadoria' where idCampo = 42 and idAuto = $id";
            $this->execute($query);			

                  
             $query = "update informacaoautos set descricao ='$SeparadoBagagem' where idCampo =45 and idAuto = $id";
             $this->execute($query);

            $this->disconnect();       
    }
	
}

?>
