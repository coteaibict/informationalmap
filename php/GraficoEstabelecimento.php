<?php
	function Municipio(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PRODUÇÃO FLORESTAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PRODUÇÃO FLORESTAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PESCA E AQÜICULTURA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESCA E AQÜICULTURA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE CARVÃO MINERAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE CARVÃO MINERAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE MINERAIS METÁLICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE BEBIDAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE BEBIDAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DO FUMO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DO FUMO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS TÊXTEIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS TÊXTEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE MADEIRA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MADEIRA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS QUÍMICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS QUÍMICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'METALURGIA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'METALURGIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÓVEIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÓVEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DIVERSOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DIVERSOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ELETRICIDADE, GÁS E OUTRAS UTILIDADES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'LETRICIDADE, GÁS E OUTRAS UTILIDADES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ESGOTO E ATIVIDADES RELACIONADAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ESGOTO E ATIVIDADES RELACIONADAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CONSTRUÇÃO DE EDIFÍCIOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONSTRUÇÃO DE EDIFÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OBRAS DE INFRA-ESTRUTURA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OBRAS DE INFRA-ESTRUTURA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO VAREJISTA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO VAREJISTA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE TERRESTRE'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE TERRESTRE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE AQUAVIÁRIO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AQUAVIÁRIO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE AÉREO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AÉREO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALOJAMENTO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALIMENTAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALIMENTAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE RÁDIO E DE TELEVISÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE RÁDIO E DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TELECOMUNICAÇÕES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TELECOMUNICAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE SERVIÇOS FINANCEIROS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SERVIÇOS FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES IMOBILIÁRIAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES IMOBILIÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ARQUITETURA E ENGENHARIA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ARQUITETURA E ENGENHARIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PUBLICIDADE E PESQUISA DE MERCADO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PUBLICIDADE E PESQUISA DE MERCADO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES VETERINÁRIAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES VETERINÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRESTADOS ÀS EMPRESAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRESTADOS ÀS EMPRESAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EDUCAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDUCAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DOMÉSTICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS&'.$div.';';

		mysqli_close($con);
		echo $result;
	}

	function MesoRegiao(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PRODUÇÃO FLORESTAL'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PRODUÇÃO FLORESTAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PESCA E AQÜICULTURA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESCA E AQÜICULTURA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE CARVÃO MINERAL'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE CARVÃO MINERAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE MINERAIS METÁLICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE BEBIDAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE BEBIDAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DO FUMO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DO FUMO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS TÊXTEIS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS TÊXTEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE MADEIRA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MADEIRA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS QUÍMICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS QUÍMICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'METALURGIA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'METALURGIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÓVEIS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÓVEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DIVERSOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DIVERSOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ELETRICIDADE, GÁS E OUTRAS UTILIDADES'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'LETRICIDADE, GÁS E OUTRAS UTILIDADES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ESGOTO E ATIVIDADES RELACIONADAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ESGOTO E ATIVIDADES RELACIONADAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CONSTRUÇÃO DE EDIFÍCIOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONSTRUÇÃO DE EDIFÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OBRAS DE INFRA-ESTRUTURA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OBRAS DE INFRA-ESTRUTURA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO VAREJISTA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO VAREJISTA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE TERRESTRE'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE TERRESTRE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE AQUAVIÁRIO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AQUAVIÁRIO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE AÉREO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AÉREO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALOJAMENTO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALIMENTAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALIMENTAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE RÁDIO E DE TELEVISÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE RÁDIO E DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TELECOMUNICAÇÕES'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TELECOMUNICAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE SERVIÇOS FINANCEIROS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SERVIÇOS FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES IMOBILIÁRIAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES IMOBILIÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ARQUITETURA E ENGENHARIA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ARQUITETURA E ENGENHARIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PUBLICIDADE E PESQUISA DE MERCADO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PUBLICIDADE E PESQUISA DE MERCADO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES VETERINÁRIAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES VETERINÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRmesoregiaoS ÀS EMPRESAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRmesoregiaoS ÀS EMPRESAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EDUCAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDUCAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DOMÉSTICOS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS&'.$div.';';

		mysqli_close($con);
		echo $result;
	}

	function Estado(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PRODUÇÃO FLORESTAL'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PRODUÇÃO FLORESTAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PESCA E AQÜICULTURA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESCA E AQÜICULTURA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE CARVÃO MINERAL'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE CARVÃO MINERAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE MINERAIS METÁLICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE BEBIDAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE BEBIDAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DO FUMO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DO FUMO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS TÊXTEIS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS TÊXTEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE MADEIRA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MADEIRA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS QUÍMICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS QUÍMICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'METALURGIA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'METALURGIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE MÓVEIS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÓVEIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'FABRICAÇÃO DE PRODUTOS DIVERSOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DIVERSOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ELETRICIDADE, GÁS E OUTRAS UTILIDADES'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'LETRICIDADE, GÁS E OUTRAS UTILIDADES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ESGOTO E ATIVIDADES RELACIONADAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ESGOTO E ATIVIDADES RELACIONADAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CONSTRUÇÃO DE EDIFÍCIOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONSTRUÇÃO DE EDIFÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OBRAS DE INFRA-ESTRUTURA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OBRAS DE INFRA-ESTRUTURA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'COMÉRCIO VAREJISTA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO VAREJISTA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE TERRESTRE'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE TERRESTRE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE AQUAVIÁRIO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AQUAVIÁRIO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TRANSPORTE AÉREO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AÉREO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALOJAMENTO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALIMENTAÇÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALIMENTAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE RÁDIO E DE TELEVISÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE RÁDIO E DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'TELECOMUNICAÇÕES'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TELECOMUNICAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE SERVIÇOS FINANCEIROS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SERVIÇOS FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES IMOBILIÁRIAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES IMOBILIÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ARQUITETURA E ENGENHARIA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ARQUITETURA E ENGENHARIA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'PUBLICIDADE E PESQUISA DE MERCADO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PUBLICIDADE E PESQUISA DE MERCADO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES VETERINÁRIAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES VETERINÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRESTADOS ÀS EMPRESAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRESTADOS ÀS EMPRESAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'EDUCAÇÃO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDUCAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'SERVIÇOS DOMÉSTICOS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(dm.estabelecimentos)
							FROM divisoesrais_municipio dm 
							inner join municipio m on m.cod_municipio = dm.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join divisaorais dr on dm.cod_divisaorais = dr.cod_divisaorais
							where dr.descricao = 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS&'.$div.';';

		mysqli_close($con);
		echo $result;
	}

	if($_GET["tipoDivisao"] == "M")
		Municipio();
	else if	($_GET["tipoDivisao"] == "MR")
		MesoRegiao();
	else
		Estado();
?>