<?php
/**
 * @package I Motivazionali
 * @version 1.0
 */
/*
Plugin Name: I Motivazionali
Plugin URI:  http://wordpress.org/plugins/i-motivazionali/
Author: Simone Manni
Description: Simile al conosciuto plugin "Hello Dolly": aggiunge in alto a destra in ogni pagina di amministrazione, una frase casuale "Motivazionale": Aforismi incoraggianti per non mollare mai. Pensieri per dare forza e coraggio, nella vita e nel lavoro!
Version: 1.0
Author URI: http://smw-design.com
*/

function get_motivationals() {
	/** Una serie di frasi Motivazionali */
	$motivationals = '<em>"Che tu creda di farcela o di non farcela avrai comunque ragione</em>" <br>(Henry Ford)
	"<em>Porsi un obiettivo è la più forte forza umana di auto motivazione.</em>" <br>(Paul J. Meyer)
	"<em>E\' nel momento delle decisioni che si plasma il tuo destino.</em>" <br>(Anthony Robbins) 
	"<em>Non mi scoraggio perché ogni tentativo sbagliato scartato è un altro passo avanti.</em>" <br>(Thomas Edison)
	"<em>Non importa quante volte cadi, ma quante volte cadi e ti rialzi.</em>" <br>(Vince Lombardi)
	"<em>Il futuro appartiene a coloro che credono nella bellezza dei propri sogni.</em>" <br>(Eleanor Roosevelt)
	"<em>Un gruppo di persone che condivide un obiettivo comune può raggiungere l\'impossibile.</em>" <br>(Anonimo)
	"<em>Il segreto per andare avanti è iniziare.</em>" <br>(Sally Berger) 
	"<em>Io prendo delle decisioni. Forse non sono perfette, ma è meglio prendere decisioni imperfette che essere alla continua ricerca di decisioni perfette che non si troveranno mai.</em>" <br>(Charles De Gaulle)
	"<em>Le persone che progrediscono nella vita sono coloro che si danno da fare per trovare le circostanze che vogliono e, se non le trovano, le creano.</em>" <br>(George Bernard Shaw)
	"<em>La bontà è più facile da riconoscere che da definire." "Se vuoi cambiare il tuo destino, cambia il tuo atteggiamento.</em>" <br>(Amy Tan)
	"<em>Se guardi sempre il sole in faccia non potrai mai vedere l\'ombra!</em>" <br>(Anonimo) 
	"<em>Le catene della schiavitù legano soltanto le mani: è la mente che fa libero l\'uomo.</em>" <br>(Franz Grillparzer)
	"<em>Abbiamo quaranta milioni di ragioni per fallire, ma non una sola scusa.</em>" <br>(Rudyard Kipling)
	"<em>Chiunque smetta di imparare è vecchio, che abbia 20 o 80 anni. Chiunque continua ad imparare resta giovane. La più grande cosa nella vita è mantenere la propria mente giovane.</em>" <br>(Henry Ford)
	"<em>Qualsiasi avvenimento nella vita non ha alcun significato tranne quello che tu gli dai.</em>" <br>(Anonimo)
	"<em>Le persone che progrediscono nella vita sono coloro che si danno da fare per trovare le circostanze che vogliono e, se non le trovano, le creano.</em>" <br>(George Bernard Shaw)
	"<em>L\'unico handicap nella vita è un atteggiamento negativo.</em>" <br>(Scott Hamilton) 
	"<em>La perseveranza è il duro lavoro che fai dopo che ti sei stancato del duro lavoro che hai fatto.</em>" <br>(Newt Gingrich)
	"<em>L\'atteggiamento è una piccola cosa che fa una grande differenza.</em>" <br>(Anonimo) 
	"<em>Insistere è testardaggine. Perseverare è determinazione.</em>" <br>(Jacinto Benavente)
	"<em>Tre persone erano al lavoro in un cantiere edile. Avevano il medesimo compito, ma quando fu loro chiesto quale fosse il loro lavoro, le risposte furono diverse. "Spacco pietre" rispose il primo. "Mi guadagno da vivere" rispose il secondo. "Partecipo alla costruzione di una cattedrale" disse il terzo.</em>" <br>(Peter Schultz) 
	"<em>La ricchezza arriva a coloro che fanno accadere le cose non a coloro che lasciano che le cose accadano.</em>" <br>(John M. Capozzi)
	"<em>Il destino non è questione di fortuna; ma è questione di scelte. Non è qualcosa che va aspettato ma piuttosto qualcosa che deve essere raggiunto.</em>" <br>(William Jennings Bryan)
"<em>Cambia tre abitudini all\'anno e otterrai risultati fenomenali.</em>" <br>(Anonimo)';

	// Esplosione delle righe
	$motivationals = explode( "\n", $motivationals );

	// Ne viene scelta una random
	return wptexturize( $motivationals[ mt_rand( 0, count( $motivationals ) - 1 ) ] );
}

// Richiama la frase scelta
function SMW_motivationals() {
	$chosen = get_motivationals();
	echo "<p id='motiv'><strong>Motivazionale del momento:</strong> $chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'SMW_motivationals' );

// Aggiunge stile css per la formattazione
function motiv_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#motiv {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 13px;
		text-align: right;
	}
	</style>
	";
}

add_action( 'admin_head', 'motiv_css' );

?>
