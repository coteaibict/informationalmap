<?php
	function Municipio(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'Total'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'PRODUÇÃO FLORESTAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PRODUÇÃO FLORESTAL&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'PESCA E AQÜICULTURA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESCA E AQÜICULTURA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'EXTRAÇÃO DE CARVÃO MINERAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE CARVÃO MINERAL&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'EXTRAÇÃO DE MINERAIS METÁLICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS METÁLICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE BEBIDAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE BEBIDAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS DO FUMO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DO FUMO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS TÊXTEIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS TÊXTEIS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS DE MADEIRA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MADEIRA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS QUÍMICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS QUÍMICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'METALURGIA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'METALURGIA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE MÓVEIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÓVEIS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'FABRICAÇÃO DE PRODUTOS DIVERSOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DIVERSOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ELETRICIDADE, GÁS E OUTRAS UTILIDADES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'LETRICIDADE, GÁS E OUTRAS UTILIDADES&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ESGOTO E ATIVIDADES RELACIONADAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ESGOTO E ATIVIDADES RELACIONADAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'CONSTRUÇÃO DE EDIFÍCIOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONSTRUÇÃO DE EDIFÍCIOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'OBRAS DE INFRA-ESTRUTURA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OBRAS DE INFRA-ESTRUTURA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'COMÉRCIO VAREJISTA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO VAREJISTA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'TRANSPORTE TERRESTRE'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE TERRESTRE&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'TRANSPORTE AQUAVIÁRIO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AQUAVIÁRIO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'TRANSPORTE AÉREO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AÉREO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ALOJAMENTO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ALIMENTAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALIMENTAÇÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE RÁDIO E DE TELEVISÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE RÁDIO E DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'TELECOMUNICAÇÕES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TELECOMUNICAÇÕES&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE SERVIÇOS FINANCEIROS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SERVIÇOS FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES IMOBILIÁRIAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES IMOBILIÁRIAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'SERVIÇOS DE ARQUITETURA E ENGENHARIA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ARQUITETURA E ENGENHARIA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'PUBLICIDADE E PESQUISA DE MERCADO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PUBLICIDADE E PESQUISA DE MERCADO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES VETERINÁRIAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES VETERINÁRIAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRESTADOS ÀS EMPRESAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRESTADOS ÀS EMPRESAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'EDUCAÇÃO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDUCAÇÃO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'SERVIÇOS DOMÉSTICOS'
							and m.cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS'
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
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'Total'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'PRODUÇÃO FLORESTAL'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PRODUÇÃO FLORESTAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'PESCA E AQÜICULTURA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESCA E AQÜICULTURA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'EXTRAÇÃO DE CARVÃO MINERAL'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE CARVÃO MINERAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'EXTRAÇÃO DE MINERAIS METÁLICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE BEBIDAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE BEBIDAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DO FUMO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DO FUMO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS TÊXTEIS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS TÊXTEIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DE MADEIRA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MADEIRA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS QUÍMICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS QUÍMICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'METALURGIA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'METALURGIA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE MÓVEIS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÓVEIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DIVERSOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DIVERSOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ELETRICIDADE, GÁS E OUTRAS UTILIDADES'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'LETRICIDADE, GÁS E OUTRAS UTILIDADES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ESGOTO E ATIVIDADES RELACIONADAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ESGOTO E ATIVIDADES RELACIONADAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'CONSTRUÇÃO DE EDIFÍCIOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONSTRUÇÃO DE EDIFÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'OBRAS DE INFRA-ESTRUTURA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OBRAS DE INFRA-ESTRUTURA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'COMÉRCIO VAREJISTA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO VAREJISTA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'TRANSPORTE TERRESTRE'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE TERRESTRE&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'TRANSPORTE AQUAVIÁRIO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AQUAVIÁRIO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'TRANSPORTE AÉREO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AÉREO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ALOJAMENTO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ALIMENTAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALIMENTAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE RÁDIO E DE TELEVISÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE RÁDIO E DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'TELECOMUNICAÇÕES'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TELECOMUNICAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE SERVIÇOS FINANCEIROS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SERVIÇOS FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES IMOBILIÁRIAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES IMOBILIÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'SERVIÇOS DE ARQUITETURA E ENGENHARIA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ARQUITETURA E ENGENHARIA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'PUBLICIDADE E PESQUISA DE MERCADO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PUBLICIDADE E PESQUISA DE MERCADO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES VETERINÁRIAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES VETERINÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRmesoregiaoS ÀS EMPRESAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRmesoregiaoS ÀS EMPRESAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'EDUCAÇÃO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDUCAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'SERVIÇOS DOMÉSTICOS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS'
							and m.cod_mesoregiao =".$_GET["cod"]."
							group by e.cod_mesoregiao;");
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
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'Total'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGRICULTURA, PECUÁRIA E SERVIÇOS RELACIONADOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'PRODUÇÃO FLORESTAL'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PRODUÇÃO FLORESTAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'PESCA E AQÜICULTURA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESCA E AQÜICULTURA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'EXTRAÇÃO DE CARVÃO MINERAL'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE CARVÃO MINERAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE PETRÓLEO E GÁS NATURAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'EXTRAÇÃO DE MINERAIS METÁLICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EXTRAÇÃO DE MINERAIS NÃO-METÁLICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE APOIO À EXTRAÇÃO DE MINERAIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS ALIMENTÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE BEBIDAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE BEBIDAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DO FUMO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DO FUMO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS TÊXTEIS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS TÊXTEIS&'.$div.';';

		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONFECÇÃO DE ARTIGOS DO VESTUÁRIO E ACESSÓRIOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PREPARAÇÃO DE COUROS E FABRICAÇÃO DE ARTEFATOS DE COURO, ARTIGOS PARA VIAGEM E CALÇADOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DE MADEIRA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MADEIRA&'.$div.';';

		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE CELULOSE, PAPEL E PRODUTOS DE PAPEL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'IMPRESSÃO E REPRODUÇÃO DE GRAVAÇÕES&'.$div.';';

		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE COQUE, DE PRODUTOS DERIVADOS DO PETRÓLEO E DE BIOCOMBUSTÍVEIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS QUÍMICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS QUÍMICOS&'.$div.';';


		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS FARMOQUÍMICOS E FARMACÊUTICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE BORRACHA E DE MATERIAL PLÁSTICO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE MINERAIS NÃO-METÁLICOS&'.$div.';';
//=================================================================================================================
///*
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'METALURGIA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'METALURGIA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DE METAL, EXCETO MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA, PRODUTOS ELETRÔNICOS E ÓPTICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS, APARELHOS E MATERIAIS ELÉTRICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE VEÍCULOS AUTOMOTORES, REBOQUES E CARROCERIAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE OUTROS EQUIPAMENTOS DE TRANSPORTE, EXCETO VEÍCULOS AUTOMOTORES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE MÓVEIS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE MÓVEIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'FABRICAÇÃO DE PRODUTOS DIVERSOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'FABRICAÇÃO DE PRODUTOS DIVERSOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'MANUTENÇÃO, REPARAÇÃO E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ELETRICIDADE, GÁS E OUTRAS UTILIDADES'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'LETRICIDADE, GÁS E OUTRAS UTILIDADES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ESGOTO E ATIVIDADES RELACIONADAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ESGOTO E ATIVIDADES RELACIONADAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COLETA, TRATAMENTO E DISPOSIÇÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'DESCONTAMINAÇÃO E OUTROS SERVIÇOS DE GESTÃO DE RESÍDUOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'CONSTRUÇÃO DE EDIFÍCIOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CONSTRUÇÃO DE EDIFÍCIOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'OBRAS DE INFRA-ESTRUTURA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OBRAS DE INFRA-ESTRUTURA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS ESPECIALIZADOS PARA CONSTRUÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO E REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO POR ATACADO, EXCETO VEÍCULOS AUTOMOTORES E MOTOCICLETAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'COMÉRCIO VAREJISTA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'COMÉRCIO VAREJISTA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'TRANSPORTE TERRESTRE'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE TERRESTRE&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'TRANSPORTE AQUAVIÁRIO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AQUAVIÁRIO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'TRANSPORTE AÉREO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TRANSPORTE AÉREO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ARMAZENAMENTO E ATIVIDADES AUXILIARES DOS TRANSPORTES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'CORREIO E OUTRAS ATIVIDADES DE ENTREGA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ALOJAMENTO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ALIMENTAÇÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALIMENTAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDIÇÃO E EDIÇÃO INTEGRADA À IMPRESSÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES CINEMATOGRÁFICAS, PRODUÇÃO DE VÍDEOS E DE PROGRAMAS DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE RÁDIO E DE TELEVISÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE RÁDIO E DE TELEVISÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'TELECOMUNICAÇÕES'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'TELECOMUNICAÇÕES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DOS SERVIÇOS DE TECNOLOGIA DA INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE PRESTAÇÃO DE SERVIÇOS DE INFORMAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE SERVIÇOS FINANCEIROS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SERVIÇOS FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SEGUROS, RESSEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES AUXILIARES DOS SERVIÇOS FINANCEIROS, SEGUROS, PREVIDÊNCIA COMPLEMENTAR E PLANOS DE SAÚDE&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES IMOBILIÁRIAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES IMOBILIÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES JURÍDICAS, DE CONTABILIDADE E DE AUDITORIA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE SEDES DE EMPRESAS E DE CONSULTORIA EM GESTÃO EMPRESARIAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'SERVIÇOS DE ARQUITETURA E ENGENHARIA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ARQUITETURA E ENGENHARIA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PESQUISA E DESENVOLVIMENTO CIENTÍFICO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'PUBLICIDADE E PESQUISA DE MERCADO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'PUBLICIDADE E PESQUISA DE MERCADO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES VETERINÁRIAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES VETERINÁRIAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ALUGUÉIS NÃO-IMOBILIÁRIOS E GESTÃO DE ATIVOS INTANGÍVEIS NÃO-FINANCEIROS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SELEÇÃO, AGENCIAMENTO E LOCAÇÃO DE MÃO-DE-OBRA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'AGÊNCIAS DE VIAGENS, OPERADORES TURÍSTICOS E SERVIÇOS DE RESERVAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE VIGILÂNCIA, SEGURANÇA E INVESTIGAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS PARA EDIFÍCIOS E ATIVIDADES PAISAGÍSTICAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRESTADOS ÀS EMPRESAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ESCRITÓRIO, DE APOIO ADMINISTRATIVO E OUTROS SERVIÇOS PRESTADOS ÀS EMPRESAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'EDUCAÇÃO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'EDUCAÇÃO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ATENÇÃO À SAÚDE HUMANA INTEGRADAS COM ASSISTÊNCIA SOCIAL, PRESTADAS EM RESIDÊNCIAS COLETIVAS E PARTICULARES&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DE ASSISTÊNCIA SOCIAL SEM ALOJAMENTO&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ARTÍSTICAS, CRIATIVAS E DE ESPETÁCULOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES LIGADAS AO PATRIMÔNIO CULTURAL E AMBIENTAL&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE EXPLORAÇÃO DE JOGOS DE AZAR E APOSTAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES ESPORTIVAS E DE RECREAÇÃO E LAZER&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ATIVIDADES DE ORGANIZAÇÕES ASSOCIATIVAS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA E COMUNICAÇÃO E DE OBJETOS PESSOAIS E DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'OUTRAS ATIVIDADES DE SERVIÇOS PESSOAIS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'SERVIÇOS DOMÉSTICOS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'SERVIÇOS DOMÉSTICOS&'.$div.';';
		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where re.informacao = 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS'
							and m.cod_estado =".$_GET["cod"]."
							group by e.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS&'.$div.';';
//*/
//=================================================================================================================

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