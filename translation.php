<?PHP

/*
 * Copyright (C) 2013 Vinodh Rajan vinodh@virtualvinodh.com This file is a part
 * of Avalokitam. Avalokitam is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version. This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General
 * Public License for more details. You should have received a copy of the GNU
 * General Public License along with this program. If not, see
 * <http://www.gnu.org/licenses/>.
 */

if (isset ( $_REQUEST ['txt'] )) {
	echo lanconTrn ( trim ( $_REQUEST ['txt'] ), $_REQUEST ['lang'] );
}
function lanconTrnL($text, $lang) 

{
	if ($lang == "en")
		return lanconTrn ( $text, $lang );
	else
		return $text;
}
function lanconTrn($text, $lang) {
	$transString = array (
			"முகப்பு" => "Home",
			"சீர்கள்" => "Metrical Feet",
			"வாய்ப்பாடு - அசை" => "Class - Metreme",
			"இதை ஆராய்க" => "Analyze this",
			"உயிரெழுத்துக்கள்:" => "Initial Vowels:",
			"மெய்யெழுத்துக்கள்:" => "Pure Consonants:",
			"உயிர்மெய்யெழுத்துக்கள்:" => "Conosonant-Vowels:",
			"சீர் மோனை" => "Foot Alliteration",
			"அடி மோனை" => "Line Alliteration",
			"சீர் எதுகை" => "Foot Rhyme",
			"அடி எதுகை" => "Line Rhyme",
			"இல்லை" => "doesn't exist",
			"ஆய்த எழுத்து:" => "Aytham:",
			"பா உதாரணங்கள்" => "Sample Verses",
			"யாப்பு மென்பொருள்" => "Tamil Prosody Analyzer",
			"செய்யுள் உள்ளிடவும்" => "Input Verse",
			"எழுத்து" => "Letter",
			"அசை - சீர்" => "Metreme & Metrical Feet",
			"அடி" => "Metrical Line",
			"விதி ஒப்பீடு" => "Rules Comparison",
			"ஆராய்க" => "Analyze",
			"தளை" => "Linkage",
			"மோனை" => "Alliteration",
			"எதுகை" => "Rhyme",
			"கருத்து" => "Feedback",
			"மற்ற கருவிகள்" => "Other Tools",
			"அக்ஷரமுகம்" => "Aksharamukha",
			"தமிழ் - IPA" => "Tamil - IPA",
			"வெண்பா விதிகளோடு ஒப்பிடுக" => "Compare with Veṇpā rules",
			"உயிர்முன் குற்றியலுகரத்தை அலகிடாது விடுக" => "Do not parse short-u before initial vowels",
			"விதி" => "Rule",
			"பொருத்தம்" => "Match",
			"XML வடிவில் காண" => "View as XML",
			"பதிவிறக்கம்:" => "Download:",
			"பதிவிறக்கம்" => "Download",
			"அவலோகிதம் குறித்து கருத்துக்கள், ஆலோசனைகள் ஏதேனும் இருப்பின் தெரியப்படுத்துக:" => "Please provide your feedback and suggestions about Avalokitam here:",
			"பெயர்:" => "Name:",
			"மின்னஞ்சல்:" => "E-mail:",
			"அனுப்புக" => "Send" 
	)
	;
	
	if ($lang == "en") {
		return $transString [$text];
	} else {
		$revTs = array_flip ( $transString );
		return $revTs [$text];
	}
}

?>