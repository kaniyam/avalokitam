<?PHP

/*
 * Avalokitam - Tamil Prosody Analyzer Avalokitam is a Tamil Prosody Analyzer.
 * Given a Tamil Prosody Text, it analyzes all the Metrical information (yāppu)
 * such as acai, cīr, vāypāṭu, taḷai, aṭi etc and displays them. It
 * also attempts to find the metre of the Text. It can recognize all the 4 major
 * types of Tamil metre namely, veṇpā, āciriyappā, kalippā & vañcippā &
 * the corresponding pāviṉam-s : veṇpāviṉam, āciriyappāviṉam,
 * kalippāviṉam & vañcippāviṉam Copyright (C) 2013 Vinodh Rajan
 * vinodh@virtualvinodh.com This program is free software: you can redistribute
 * it and/or modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation, either version 3 of the License,
 * or (at your option) any later version. This program is distributed in the
 * hope that it will be useful, but WITHOUT ANY WARRANTY; without even the
 * implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See
 * the GNU General Public License for more details. You should have received a
 * copy of the GNU General Public License along with this program. If not, see
 * <http://www.gnu.org/licenses/>.
 */

require_once "menu.php";
require_once "parsetreeclass.php";
require_once "yapparungalaparsetree.php";

global $lang;

$lang = $_SESSION ['lang'];

$formsubmit = ! empty ( $_POST ['ttxt'] );

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:image" content="http://www.avalokitam.com/css/images/Avalokitesvara.gif"/>
<meta property="og:title" content="Avalokitam - Tamil Prosody Analyzer"/>
<meta property="og:url" content="http://www.avalokitam.com"/>
<meta property="og:site_name" content="Avalokitam"/>

<title>Avalokitam - Tamil Prosody Analyzer</title>

<?PHP echo $jscss?>

<?PHP if($formsubmit) { ?>

<script type="text/javascript">
		$(function(){
		
		$("#accordion").accordion({active: false});
		
		});
		</script>
<?PHP } ?>
</head>
<body>

<?PHP echo $head?>

<?PHP echo $menu?>

<div class="container">
		<div class="inp" id="accordion">
			<h3>
				<a href="#"><span class="uiTran"><?PHP echo lanconTrnL("செய்யுள் உள்ளிடவும்",$_SESSION['lang']); ?></span></a>
			</h3>
			<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
				<p>
					<textarea cols="80" rows="8" id="itext" name="ttxt">
<?PHP if(!$formsubmit) { ?>
மாதவா போதி வரதா வருளமலா
பாதமே யோத சுரரைநீ - தீதகல
மாயா நெறியளிப்பா யின்றன் பகலாச்சீர்த்
தாயே யலகில்லா டாம்
<?PHP

} else {
	
	if (isset ( $_POST ['kurilU'] ))
		$uyirU = TRUE;
	
	$ptree = new ProsodyParseTree ( $_POST ['ttxt'], $lang, $uyirU );
	
	echo $_POST ['ttxt'];
}
?>
</textarea>
				
				
				<p>
					<input type="submit"
						value=<?PHP echo lanconTrnL("ஆராய்க",$_SESSION['lang']); ?>
						id="submit" class="uiTran" />
				</p>

				<div id="checkbox">
					<p>
						<input type="checkbox" id="ck" name="kurilU"
							<?PHP if(isset($_POST['kurilU'])) echo "checked"; ?>> <span
							class="uiTran"><?PHP echo lanconTrnL("உயிர்முன் குற்றியலுகரத்தை அலகிடாது விடுக",$_SESSION['lang']); ?> </span></input>
					</p>
					<p>
						<input type="checkbox" id="ck" name="venRules"
							<?PHP if(isset($_POST['venRules'])) echo "checked"; ?>> <span
							class="uiTran"><?PHP echo lanconTrnL("வெண்பா விதிகளோடு ஒப்பிடுக",$_SESSION['lang']); ?> </span></input>
					</p>

				</div>

				<!-- 
<div id="checkbox">
	<input type="checkbox" id="radio1" name="aytham" /><label for="aytham"><small><span class="uiTran">ஆய்தம் குற்றெழுத்தாக",$lang) ?></small></label>
	<input type="checkbox" id="radio2" name="alabedai" /><label for="alabedai"><small><span class="uiTran">அளபெடை ஓரெழுத்தாக",$lang) ?></small></label>	
</div>
 -->
				<!--  <div id="checkbox">
	<input type="checkbox" id="radio1" name="aytham" /><label for="yv"><small><span class="uiTran">பழைய யாப்பு வாய்ப்பாடுகளையும் காட்டுக",$lang) ?></small></label>
 </div>  -->
			</form>
		</div>

<?PHP

if ($formsubmit) {
	
	$_SESSION ['xml'] = $ptree->DisplayXML ();
	
	?>
<div id="accord">
			<div>
				<!--				<h3><a href="#">பகுக்கப்பட்டது</a></h3> -->
				<!--	<div> <?PHP // $ptree->analyze() ?>  </div> -->
				<div id="uruppu">
					<ul>
						<li><a href="#ezhuttu"><span class="uiTran"><?PHP echo lanconTrnL("எழுத்து",$_SESSION['lang']); ?></span>
						</a>
						
						<li><a href="#asaiceer"><span class="uiTran"><?PHP echo lanconTrnL("அசை - சீர்",$_SESSION['lang']); ?></span>
						</a>
						
						<li><a href="#talai"><span class="uiTran"><?PHP echo lanconTrnL("தளை",$_SESSION['lang']); ?></span></a>
						
						<li><a href="#adi"><span class="uiTran"><?PHP echo lanconTrnL("அடி",$_SESSION['lang']); ?></span></a>
						
						<li><a href="#monai"><span class="uiTran"><?PHP echo lanconTrnL("மோனை",$_SESSION['lang']); ?></span></a>
						
						<li><a href="#etukai"><span class="uiTran"><?PHP echo lanconTrnL("எதுகை",$_SESSION['lang']); ?></span></a>	
						
	<?PHP if(isset($_POST['venRules'])) { ?>
	
						<li><a href="#analysis"><span class="uiTran"><?PHP echo lanconTrnL("விதி ஒப்பீடு",$_SESSION['lang']); ?></span></a>
							
	<?PHP } ?>
	
<!-- 	<li><a href="#pazhayappu"><span class="uiTran">பழம்யாப்பு</span></a>  -->
							<!--	<li><a href="#paa"><span class="uiTran">பா</span></a>	-->
							<!--	<li><a href="#XML"><span class="uiTran">XML</span></a> -->
					
					</ul>
					<div id="ezhuttu">
<?PHP $ptree->DisplayLetterCount(); ?>

</div>

					<div id="asaiceer">
						<div class="ui-state-highlight ui-corner-all"
							style="margin-top: 5px; padding: 0 .7em;">
							<p>
								<span class="ui-icon ui-icon-info"
									style="float: left; margin-right: .3em;"></span>
								<!-- <strong> <span
	class="ner-asai">நேரசை</span> </strong><?php echo($ptree->ner);?> <strong><span
	class="nirai-asai">நிரையசை</span> </strong><?php echo($ptree->nirai); ?></p>  -->
	
	<?php
	
	if ($ptree->MetreType != NULL)
		echo "<span class=\"uiTrant\">" . lancon ( lat2tam ( $ptree->MetreType ), $lang ) . "</span>";
	else
		// Translate below
		echo "<span class=\"uiTrant\">" . lancon ( lat2tam ( "_e_nta pA vakYyu_m poru_ntavi_llY" ), $lang ) . "</span>"; // Translate
		                                                                                                      // this
	
	?>
	
	<span style="float: right;"><a href="/xml" target="_blank"><span
										class="uiTran"><?PHP echo lanconTrnL("XML வடிவில் காண",$_SESSION['lang']); ?></span></a></span>
						
						</div>
						<br />
<?PHP $ptree->DisplaySyllableWordClass() ?> 

<br/>

</div>

					<div id="adi">
						<div class="ui-state-highlight ui-corner-all"
							style="margin-top: 5px; padding: 0 .7em;">
							<p>
								<span class="ui-icon ui-icon-info"
									style="float: left; margin-right: .3em;"></span> <strong><span
									class="comon"><span class="uiTran"><?PHP echo lanconTrnL("அடி",$_SESSION['lang']); ?></span></strong><?php echo " ".($ptree->TotalLines);?></p>
						</div>

						<br />

<?PHP $ptree->DisplayLineClass()?>


</div>

					<div id="talai">

						<div><?PHP $ptree->DisplayWordBond() ?></div>

					</div>

					<div id="monai">

						<div><?PHP $ptree->DisplayTodai("mOVY") ?></div>

					</div>

					<div id="etukai">

						<div><?PHP $ptree->DisplayTodai("_etukY") ?></div>

					</div>

<?PHP if(isset($_POST['venRules'])) { ?>

<div id="analysis">

<?PHP echo $ptree->displayError($ptree->VenpaError); ?>

</div>

<?PHP } ?>

<!--
<div id="pazhayappu">
<div class="ui-state-highlight ui-corner-all"
	style="margin-top: 5px; padding: 0 .7em;">
<p><span class="ui-icon ui-icon-info"
	style="float: left; margin-right: .3em;"></span><span
	class="comon">
<span class="uiTran">யாப்பருங்கல விருத்தியின் பழைய யாப்பு வாய்ப்பாடு",$lang) ?>
</span>
</div>
<?php  $ytree=new YapparungalaParseTree($_POST['ttxt'],$lang);

$ytree->DisplaySyllableWordClass();

?>

<div></div>

</div>
-->

				</div>
			</div>


		</div>
<?PHP } ?>

<?PHP echo $foot ?>



</body>
</html>