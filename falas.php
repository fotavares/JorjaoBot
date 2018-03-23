<?php

function in_arrayi($needle, $haystack) {
        return in_array(strtolower($needle), $haystack);
    }
    
function contem($palavra,$arrTexto){
	return in_arrayi($palavra,$arrTexto);
}    

function parseResposta($text,$replyTo = false )
{
    $resposta = "";
    $chamou_o_bot = false;
    $dia_de_furia = false;
    //https://apps.timwhitlock.info/emoji/tables/unicode
           
    $palavras = explode(' ',strtolower(Util::remove_acentos($text)));
            
    if ((contem('jorjao',$palavras))||(contem('jorjao?',$palavras))||(contem('jorjao!',$palavras))||(contem('jorjao,',$palavras))){
    	$chamou_o_bot = true;
    }
    if(isset($replyTo)){
    	if(strtolower($replyTo) === "jorjaobot"){
	    $chamou_o_bot = true;
        }
    }

	
    	            
    if ($chamou_o_bot)  {
      if($dia_de_furia)
      {
	      $a=array("Foda-se","Foooooooda-se","Não enche","Não quero saber","Não me perturbe","Vai tomar no cu",
	      "Vai se fuder","Vai pro caralho","vai tomar no meio do seu rabo","Vai chupar um rola","Vai pra puta que te paril");
		$resposta = $a[array_rand($a,1)];
      }
      else
      {
    	if(count($palavras) >= 1)
    	{
            $a=array("Eu","Oi","Fala","Late","Que","Hein?","Qual foi?","Wat","Eu","Eh noiz","\xF0\x9F\x91\x80");
			$resposta .= $a[array_rand($a,1)]."\n";
		}
		if ((contem('oi',$palavras))||(contem('koe',$palavras))||(contem('falae',$palavras))||(contem('eae',$palavras))) { 
				$resposta = "kkk eae man \xF0\x9F\x8C\x9A";
		}
		/*if (contem('piada',$palavras)) {
			$resposta .= "Piada? piu\n";
		}
		if (contem('bot',$palavras)) {
			$resposta .= "Bot? Isso não me parece verdade\n";
		}*/
		if ((contem('pinto',$palavras))||(contem('benes',$palavras))) {
				$a=array("\xF0\x9F\x90\xA3","\xF0\x9F\x90\xA4","\xF0\x9F\x90\xA5");
			$resposta .= "" . $a[array_rand($a,1)] ."\n";
		}
		if (contem('top',$palavras)) {
				$a=array("Topster","Topissimo","Topzeira","Topeira","HeliTOPtero","Topson");
			$resposta .= "Top? ".$a[array_rand($a,1)]."\n";
		}
		if ((contem('manda',$palavras))&&(contem('nudes',$palavras))) {
				$a=array("Mais tarde","Tah cedo ainda","Hoje não","Agora não",
						"Issaki eh grupo de familia, xovem","NEVAR","Nops",
						"Um dia quem sabe","Vai sonhando", "Sem vergonha","Sai exú");
			$resposta .= "Nudes? ".$a[array_rand($a,1)]."\n";
		}    
      }
    }
    else 
    {
	    if (contem('nudes',$palavras)) {
	        $a=array("Eu ouvi NUDES??","Nudes? Adoro!","Nudes? Também quero!");
		$resposta .= $a[array_rand($a,1)]."\n";
	    }
	   /* if (contem('puta',$palavras)) {
	        $a=array("Puta? Onde?","Puta? Quero!","Puta? Kd? Qto?");
		$resposta .= $a[array_rand($a,1)]."\n";
	    }   */ 
	    if ((contem('top',$palavras))||(contem('full lace',$palavras))) {
		$resposta .= "\xF0\x9F\x94\x9D\xF0\x9F\x94\x9D\xF0\x9F\x94\x9D"."\n";
	    }    
	    if ((contem('brotheragem',$palavras))||(contem('broderagem',$palavras))||(contem('broderagi',$palavras))) {
		$resposta = "https://www.campograndenews.com.br/lado-b/comportamento-23-08-2011-08/grupo-cria-festa-para-homens-que-curtem-homens-mas-que-garantem-ser-heteros";
	    }    
	    /*if (contem('swish swish',$palavras)) {
		$resposta = "Bish";
	    }   */ 
	    if (contem('sacanagem',$palavras)) {
		$resposta .= "Sacanagem boa é no @solteafranga"."\n";
	    }
		if ((contem('chuca',$palavras))&&(contem('reversa',$palavras))) {
		$resposta = "rosca";
	    }
		if (contem('/more',$palavras)) {
	        $a=array("Oi Gatx","Oi lindx","Fala mais, moreco");
		$resposta .= $a[array_rand($a,1)]."\n";
	    }
	}

    
    return $resposta;
}
?>