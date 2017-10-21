<?php
    if (isset($_SESSION['logget_ind'])) {
        $query = "SELECT SlideID,Slidetekst FROM Slide2 WHERE (SangID = " . $intSongId . ") ORDER BY SlideID";
        $result = doSQLQuery($query);
        $slide_arr = array();
        while ($res_arr = db_fetch_array($result)) {
            $tmp = $res_arr["SlideID"];
            array_push($slide_arr, $res_arr["Slidetekst"]);
        }
?>
<div id="slides_input">
    <span class="stamdata">Afspilningsrækkefølge: </span><br />
    <input name="slides" id="slides" type="text" value="<?php echo $strSlides; ?>" size="18" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button name="send" value="Kopier tekst fra sangtekst" class="submit_btn" onclick="javascript:copyToSlides();return false;"> Kopier tekst fra sangtekst </button>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <!--<button name="send" value="Gem slides" class="submit_btn_2" onClick="javascript:saveSlides();return false;"> Gem slides </button>-->
    <button name="send" value="Generer præsentation" class="submit_btn" onclick="javascript:window.location = 'odp-handler/createSlides.php?songcount=1&Song0=<?php echo $intSongId; ?>';return false;"> <img src="img/oo-impress.gif" alt="Udskriv" width="18" height="19" border="0" align="absmiddle" /> Generer præsentation </button>
    <button name="send" value="Vis nu" class="submit_btn" onclick="javascript:window.open('odf-viewer/#../odp-handler/createSlides.php?songcount=1&Song0=<?php echo $intSongId; ?>&ext=.odp', '', 'width=800, height=640');return false;"> <img src="img/slide_show_48.png" alt="Vis nu" width="18" height="19" border="0" align="absmiddle" /> Vis nu </button>

    <br />
    <span class="stamdata">Slide A: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideA"><?php print(stripslashes($slide_arr[0])); ?></textarea><br />
    <span class="stamdata">Slide B: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideB"><?php print(stripslashes($slide_arr[1])); ?></textarea><br />
    <span class="stamdata">Slide C: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideC"><?php print(stripslashes($slide_arr[2])); ?></textarea><br />
    <span class="stamdata">Slide D: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideD"><?php print(stripslashes($slide_arr[3])); ?></textarea><br />
    <span class="stamdata">Slide E: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideE"><?php print(stripslashes($slide_arr[4])); ?></textarea><br />
    <span class="stamdata">Slide F: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideF"><?php print(stripslashes($slide_arr[5])); ?></textarea><br />
    <span class="stamdata">Slide G: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideG"><?php print(stripslashes($slide_arr[6])); ?></textarea><br />
    <span class="stamdata">Slide H: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideH"><?php print(stripslashes($slide_arr[7])); ?></textarea><br />
    <span class="stamdata">Slide I: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideI"><?php print(stripslashes($slide_arr[8])); ?></textarea><br />
    <span class="stamdata">Slide J: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideJ"><?php print(stripslashes($slide_arr[9])); ?></textarea><br />
    <span class="stamdata">Slide K: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideK"><?php print(stripslashes($slide_arr[10])); ?></textarea><br />
    <span class="stamdata">Slide L: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideL"><?php print(stripslashes($slide_arr[11])); ?></textarea><br />
    <span class="stamdata">Slide M: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideM"><?php print(stripslashes($slide_arr[12])); ?></textarea><br />
    <span class="stamdata">Slide N: (maximum 11 linier)</span><br />
    <textarea cols="60" rows="8" id="slideN"><?php print(stripslashes($slide_arr[13])); ?></textarea><br />
    <div id="refresh">
        <p>	&nbsp;<br />&nbsp;</p>
    </div>
</div>

<?php
    } // session
?>
<script>
    (function () {
        document.getElementById('slides_input')
            .addEventListener('keydown', function (e) {
            if (e.keyCode !== 13) { return; }
            var result = e.target.value.match(/\n/g);
            if (!result || result.length < 11) { return; }

            e.preventDefault();
        })
    } ());
</script>
