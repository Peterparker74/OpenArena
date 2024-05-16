<?php
    /*ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require_once '../config.php'; // On inclu la connexion à la bdd
    require("../requetes.php");

    session_start();
    
    verifierconnexionpersonne(); */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Configuration Commande</title>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        .header {
            color: #007bff;
            font-size: 24px;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .sub-header {
            color: #007bff;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .controls, .actions {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .control {
            margin: 0 10px;
            padding: 10px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .title {
            background-color: #ff6347; /* Tomato red */
            color: white;
            padding: 5px;
            margin-bottom: 5px;
        }
        button {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:active {
            transform: scale(0.98);
        }
        .advanced-options {
            margin-top: 20px;
            background-color: #8a2be2;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .advanced-options:hover {
            background-color: #7a1be0;
        }
</style>
</head>
<body>
<form onsubmit="return validerFormulaire();">
<div class="header">Configuration commande</div>
<div class="sub-header">Configuration des commandes de base</div>
<div class="controls">
<div class="control">
<div class="title">Fleche Gauche</div>
<button onclick="changeKey('left', -1);">←</button>
<span id="key-left">Fleche Gauche</span>
<button onclick="changeKey('left', 1)">→</button>
</div>
<div class="control">
<div class="title">Fleche Haut</div>
<button onclick="changeKey('up', -1)">←</button>
<span id="key-up">Fleche Haut</span>
<button onclick="changeKey('up', 1)">→</button>
</div>
<div class="control">
<div class="title">Fleche Bas</div>
<button onclick="changeKey('down', -1)">←</button>
<span id="key-down">Fleche Bas</span>
<button onclick="changeKey('down', 1)">→</button>
</div>
<div class="control">
<div class="title">Fleche Droite</div>
<button onclick="changeKey('right', -1)">←</button>
<span id="key-right">Fleche Droite</span>
<button onclick="changeKey('right', 1)">→</button>
</div>
</div>

<div class="controls" style="margin-top: 60px;">
<div class="control">
<img src="/openarena/game2.jpg" style="height: 40px;width: 40px" />
</div>
<div class="control">
<div class="title" style="background-color: yellow;color: red;">Tirer</div>
<button onclick="changeKeytir('right', -1)">←</button>
<span id="keytir">a</span>
<button onclick="changeKeytir('right', 1)">→</button>
</div>
</div>


<button class="advanced-options" style="height: 40px;">Options avancées</button>
<button id="resetButton" onclick="redirectioncommandedefaut();" style="background-color: red; color: white; margin-top: 50px; margin-bottom: 50px;height: 40px;">
 
      Revenir aux commandes par défaut
 
</button>
 
<div id="error" style="color: red;"></div>
 
<button id="Valider" type="submit" onclick="verifiertoucheduplique();afficherconfiguration();soumission(event);">Valider</button>
</form>
<script>
        const valider = document.querySelector("#Valider");
        const keys = ['Fleche Gauche', 'Fleche Haut', 'Fleche Bas', 'Fleche Droite'];
        const keystir = ['a', 'b', 'c', 'd', 'x'];
 
        var valeur1 = document.createElement('div');
        valeur1.id = 'valeur1';
        valeur1.setAttribute('style','visibility: hidden;');
        document.body.appendChild(valeur1);
 
        var valeur2 = document.createElement('div');
        valeur2.id = 'valeur2';
        valeur2.setAttribute('style','visibility: hidden;');
        document.body.appendChild(valeur2);
 
        var valeur3 = document.createElement('div');
        valeur3.id = 'valeur3';
        valeur3.setAttribute('style','visibility: hidden;');
        document.body.appendChild(valeur3);
 
        var valeur4 = document.createElement('div');
        valeur4.id = 'valeur4';
        valeur4.setAttribute('style','visibility: hidden;');
        document.body.appendChild(valeur4);
        
        var valeur5 = document.createElement('div');
        valeur5.id = 'valeur5';
        valeur5.setAttribute('style','visibility: hidden;');
        document.body.appendChild(valeur5);

 
        function validerFormulaire() {
            // Ajoutez ici votre logique de validation
            // Retournez false pour empêcher la soumission du formulaire
            return false;
        }
 
        function changeKey(direction, delta) {
            const keyElement = document.getElementById('key-' + direction);
            let currentIndex = keys.indexOf(keyElement.textContent);
            currentIndex = (currentIndex + delta + keys.length) % keys.length;
            keyElement.textContent = keys[currentIndex];
        }
        function changeKeytir(direction, delta) {
            const keyElement = document.getElementById('keytir');
            let currentIndex = keystir.indexOf(keyElement.textContent);
            currentIndex = (currentIndex + delta + keystir.length) % keystir.length;
            keyElement.textContent = keystir[currentIndex];
        }
        function afficherconfiguration() {
            const keys = {
                left: document.getElementById('key-left').textContent,
                up: document.getElementById('key-up').textContent,
                down: document.getElementById('key-down').textContent,
                right: document.getElementById('key-right').textContent
            };
 
       
            if (keys.left === 'Fleche Gauche') {
                console.log(`bind LEFTARROW "+left"`);
                valeur1.innerHTML=`bind LEFTARROW "+left"`;
            }
            else if(keys.left === 'Fleche Bas'){
                console.log(`bind LEFTARROW "+back"`);
                valeur1.innerHTML=`bind LEFTARROW "+back"`;
            }
            else if(keys.left === 'Fleche Droite'){
                console.log(`bind LEFTARROW "+right"`);
                valeur1.innerHTML=`bind LEFTARROW "+right"`;
            }
            else if(keys.left === 'Fleche Haut'){
                console.log(`bind LEFTARROW "+forward"`);
                valeur1.innerHTML=`bind LEFTARROW "+forward"`;
            }
 
            if (keys.right === 'Fleche Droite') {
                console.log(`bind RIGHTARROW "+right"`);
                valeur2.innerHTML=`bind RIGHTARROW "+right"`;
            }
            else if(keys.right === 'Fleche Bas'){
                console.log(`bind RIGHTARROW "+back"`);
                valeur2.innerHTML=`bind RIGHTARROW "+back"`;
            }
            else if(keys.right === 'Fleche Gauche'){
                console.log(`bind RIGHTARROW "+left"`);
                valeur2.innerHTML=`bind RIGHTARROW "+left"`;
            }
            else if(keys.right === 'Fleche Haut'){
                console.log(`bind RIGHTARROW "+forward"`);
                valeur2.innerHTML=`bind LEFTARROW "+forward"`;
            }
 
            if (keys.up === 'Fleche Haut') {
                console.log(`bind UPARROW "+forward"`);
                valeur3.innerHTML=`bind UPARROW "+forward"`;
            }
            else if(keys.up === 'Fleche Bas'){
                console.log(`bind UPARROW "+back"`);
                valeur3.innerHTML=`bind UPARROW "+back"`;
            }
            else if(keys.up === 'Fleche Gauche'){
                console.log(`bind UPARROW "+left"`);
                valeur3.innerHTML=`bind UPARROW "+left"`;
            }
            else if(keys.up === 'Fleche Droite'){
                console.log(`bind UPARROW "+right"`);
                valeur3.innerHTML=`bind UPARROW "+right"`;
            }
 
            if (keys.down === 'Fleche Bas') {
                console.log(`bind DOWNARROW "+back"`);
                valeur4.innerHTML=`bind DOWNARROW "+back"`;
            }
            else if(keys.down === 'Fleche Haut'){
                console.log(`bind DOWNARROW "+forward"`);
                valeur4.innerHTML=`bind DOWNARROW "+forward"`;
            }
            else if(keys.down === 'Fleche Gauche'){
                console.log(`bind DOWNARROW "+left"`);
                valeur4.innerHTML=`bind DOWNARROW "+left"`;
            }
            else if(keys.down === 'Fleche Droite'){
                console.log(`bind DOWNARROW "+right"`);
                valeur4.innerHTML=`bind DOWNARROW "+right"`;
            }
            
            const keytir = document.getElementById('keytir').textContent
            
            if(keytir === 'a'){
            	console.log(`bind a "+right"`);
            	valeur5.innerHTML=`bind a "+attack"`;
            }else if(keytir === 'b'){
                console.log(`bind b "+right"`);
                valeur4.innerHTML=`bind b "+right"`;
            }else if(keytir === 'c'){
                console.log(`bind c "+right"`);
                valeur4.innerHTML=`bind c "+right"`;
            }else if(keytir === 'd'){
                console.log(`bind d "+right"`);
                valeur4.innerHTML=`bind d "+right"`;
            }else if(keytir === 'x'){
                console.log(`bind  "+right"`);
                valeur4.innerHTML=`bind x "+right"`;
            }
            
            
            /*bashCommands += `echo "seta +forward \\"${keys.up}\\"" >> ~/.openarena/baseoa/q3config.cfg\n`;
            bashCommands += `echo "seta +back \\"${keys.down}\\"" >> ~/.openarena/baseoa/q3config.cfg\n`;
            bashCommands += `echo "seta +right \\"${keys.right}\\"" >> ~/.openarena/baseoa/q3config.cfg\n`;*/
 
 
        }
        function verifiertoucheduplique() {
            const error=document.querySelector("#error");
            const keyLeft = document.getElementById('key-left').textContent;
            const keyUp = document.getElementById('key-up').textContent;
            const keyDown = document.getElementById('key-down').textContent;
            const keyRight = document.getElementById('key-right').textContent;
 
            // Créer un tableau des valeurs de touches
            const keys = [keyLeft, keyUp, keyDown, keyRight];
 
            // Trouver des valeurs en double
            const keySet = new Set(keys);
            if (keySet.size !== keys.length) {
                error.innerHTML="Attention certaines touches que vous configurés sont dupliqués. Veuillez effectuer des mofifications";
            } else {
                error.innerHTML="";
            }
        }
 
        function soumission(event) {
            const error=document.querySelector("#error");
            const keyLeft = document.getElementById('key-left').textContent;
            const keyUp = document.getElementById('key-up').textContent;
            const keyDown = document.getElementById('key-down').textContent;
            const keyRight = document.getElementById('key-right').textContent;
            const keyTir = document.getElementById('keytir').textContent;
 
            // Créer un tableau des valeurs de touches
            const keys = [keyLeft, keyUp, keyDown, keyRight];
 
            // Trouver des valeurs en double
            const keySet = new Set(keys);
            if (keySet.size !== keys.length) {
                error.innerHTML="Attention certaines touches que vous configurez sont dupliqués. Veuillez effectuer des changements";
            }else{
            
            // Collecter les valeurs des divs
            var valeur1 = document.getElementById('valeur1').textContent;
            var valeur2 = document.getElementById('valeur2').textContent;
            var valeur3 = document.getElementById('valeur3').textContent;
            var valeur4 = document.getElementById('valeur4').textContent;
            var valeur5 = document.getElementById('valeur5').textContent;
 
            // Utiliser un Set pour vérifier l'unicité
            var valeurs = [valeur1, valeur2, valeur3, valeur4, valeur5];
 
            // S'il n'y a pas de doublons, procéder avec la soumission
            fetch('traitementconfiguration.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'data=' + encodeURIComponent(valeurs.join("\n"))
            })
            .then(response =>{
            	if(response.ok){
            		window.location.href='configurationcommandesucces.php';
            	}
            })
            .then(data => {
                console.log(data); // Afficher la réponse du serveur
            })
            .catch(error => console.error('Erreur:', error));
            }
        }
 
        function redirectioncommandedefaut(event) {
const montexte = `// generated by quake, do not modify
unbindall
bind TAB "+scores"
bind ENTER "+button2"
bind ESCAPE "togglemenu"
bind SPACE "+moveup"
bind + "sizeup"
bind - "sizedown"
bind / "weapnext"
bind 0 "weapon 10"
bind 1 "weapon 1"
bind 2 "weapon 2"
bind 3 "weapon 3"
bind 4 "weapon 4"
bind 5 "weapon 5"
bind 6 "weapon 6"
bind 7 "weapon 7"
bind 8 "weapon 8"
bind 9 "weapon 9"
bind = "sizeup"
bind [ "weapprev"
bind \ "+mlook"
bind ] "weapnext"
bind _ "sizedown"
bind \` "toggleconsole"
bind a "+moveleft"
bind c "+movedown"
bind d "+moveright"
bind s "+back"
bind t "messagemode"
bind w "+forward"
bind ~ "toggleconsole"
bind PAUSE "pause"
bind UPARROW "+forward"
bind DOWNARROW "+back"
bind LEFTARROW "+left"
bind RIGHTARROW "+right"
bind ALT "+strafe"
bind CTRL "+attack"
bind SHIFT "+speed"
bind DEL "+lookdown"
bind PGDN "+lookup"
bind END "centerview"
bind F1 "vote yes"
bind F2 "vote no"
bind F3 "ui_teamorders"
bind F11 "screenshot"
bind MOUSE1 "+attack"
bind MOUSE2 "+strafe"
bind MOUSE3 "+zoom"
bind MWHEELDOWN "weapnext"
bind MWHEELUP "weapprev"
seta net_socksPassword ""
seta net_socksUsername ""
seta net_socksPort "1080"
seta net_socksServer ""
seta net_socksEnabled "0"
seta net_mcast6iface ""
seta net_mcast6addr "ff04::696f:7175:616b:6533"
seta net_enabled "3"
seta com_pipefile ""
seta ui_setupchecked "0"
seta ui_browserOnlyHumans "0"
seta ui_browserShowEmpty "1"
seta ui_browserShowFull "1"
seta ui_browserSortKey "4"
seta ui_browserGameType "0"
seta ui_browserMaster "0"
seta cg_marks "1"
seta cg_drawCrosshairNames "1"
seta cg_drawCrosshair "4"
seta cg_brassTime "2500"
seta g_spSkill "2"
seta g_spVideos ""
seta g_spAwards ""
seta g_spScores5 ""
seta g_spScores4 ""
seta g_spScores3 ""
seta g_spScores2 ""
seta g_spScores1 ""
seta ui_dom_friendly "0"
seta ui_dom_timelimit "30"
seta ui_dom_capturelimit "500"
seta ui_dd_friendly "0"
seta ui_dd_timelimit "30"
seta ui_dd_capturelimit "8"
seta ui_lms_timelimit "0"
seta ui_lms_fraglimit "20"
seta ui_ctf_elimination_timelimit "30"
seta ui_ctf_elimination_capturelimit "8"
seta ui_elimination_timelimit "20"
seta ui_elimination_capturelimit "8"
seta ui_harvester_friendly "0"
seta ui_harvester_timelimit "30"
seta ui_harvester_capturelimit "20"
seta ui_overload_friendly "0"
seta ui_overload_timelimit "30"
seta ui_overload_capturelimit "8"
seta ui_1fctf_friendly "0"
seta ui_1fctf_timelimit "30"
seta ui_1fctf_capturelimit "8"
seta ui_ctf_friendly "0"
seta ui_ctf_timelimit "30"
seta ui_ctf_capturelimit "8"
seta ui_team_friendly "1"
seta ui_team_timelimit "20"
seta ui_team_fraglimit "0"
seta ui_tourney_timelimit "15"
seta ui_tourney_fraglimit "0"
seta ui_ffa_timelimit "0"
seta ui_ffa_fraglimit "20"
seta s_alCapture "1"
seta s_alDevice ""
seta s_alInputDevice ""
seta s_alDriver "libopenal.so.1"
seta s_alDopplerSpeed "9000"
seta s_alDopplerFactor "1.0"
seta s_alSources "96"
seta s_alGain "1.0"
seta s_alPrecache "1"
seta s_useOpenAL "1"
seta s_muteWhenUnfocused "0"
seta s_muteWhenMinimized "0"
seta s_doppler "1"
seta s_musicvolume "0.25"
seta s_volume "0.8"
seta joy_threshold "0.15"
seta in_joystick "0"
seta in_nograb "0"
seta in_mouse "1"
seta in_keyboardDebug "0"
seta r_centerWindow "0"
seta r_allowResize "0"
seta r_screenshotJpegQuality "90"
seta r_aviMotionJpegQuality "90"
seta r_marksOnTriangleMeshes "0"
seta r_anaglyphMode "0"
seta r_railSegmentLength "32"
seta r_railCoreWidth "6"
seta r_railWidth "16"
seta r_facePlaneCull "1"
seta r_gamma "1"
seta r_swapInterval "0"
seta r_textureMode "GL_LINEAR_MIPMAP_LINEAR"
seta r_finish "0"
seta r_dlightBacks "1"
seta r_dynamiclight "1"
seta r_drawSun "0"
seta r_fastsky "0"
seta r_ignoreGLErrors "1"
seta r_stereoSeparation "64"
seta r_zproj "64"
seta r_flares "0"
seta r_lodbias "0"
seta r_lodCurveError "250"
seta r_ignoreDstAlpha "1"
seta r_shadowCascadeZBias "0"
seta r_shadowCascadeZFar "1024"
seta r_shadowCascadeZNear "8"
seta r_shadowMapSize "1024"
seta r_shadowBlur "0"
seta r_shadowFilter "1"
seta r_sunShadows "1"
seta r_sunlightMode "1"
seta r_drawSunRays "0"
seta r_genNormalMaps "0"
seta r_imageUpsampleType "1"
seta r_imageUpsampleMaxSize "1024"
seta r_imageUpsample "0"
seta r_mergeLightmaps "1"
seta r_pshadowDist "128"
seta r_dlightMode "0"
seta r_glossType "1"
seta r_baseGloss "0.3"
seta r_baseSpecular "0.04"
seta r_baseParallax "0.05"
seta r_baseNormalY "1.0"
seta r_baseNormalX "1.0"
seta r_pbr "0"
seta r_deluxeSpecular "0.3"
seta r_cubemapSize "128"
seta r_cubeMapping "0"
seta r_parallaxMapShadows "0"
seta r_parallaxMapOffset "0"
seta r_parallaxMapping "0"
seta r_deluxeMapping "1"
seta r_specularMapping "1"
seta r_normalMapping "1"
seta r_ssao "0"
seta r_depthPrepass "1"
seta r_autoExposure "1"
seta r_toneMap "1"
seta r_postProcess "1"
seta r_floatLightmap "0"
seta r_hdr "1"
seta r_greyscale "0"
seta r_stereoEnabled "0"
seta r_subdivisions "4"
seta r_simpleMipMaps "1"
seta r_customPixelAspect "1"
seta r_customheight "1024"
seta r_customwidth "1600"
seta r_noborder "0"
seta r_fullscreen "0"
seta r_mode "3"
seta r_ignorehwgamma "0"
seta r_overBrightBits "1"
seta r_ext_multisample "0"
seta r_depthbits "0"
seta r_stencilbits "8"
seta r_colorbits "0"
seta r_texturebits "0"
seta r_detailtextures "1"
seta r_roundImagesDown "1"
seta r_picmip "1"
seta r_ext_max_anisotropy "2"
seta r_ext_texture_filter_anisotropic "0"
seta r_ext_direct_state_access "1"
seta r_arb_vertex_array_object "1"
seta r_arb_seamless_cube_map "0"
seta r_ext_framebuffer_multisample "0"
seta r_ext_texture_float "1"
seta r_ext_framebuffer_object "1"
seta r_ext_texture_env_add "1"
seta r_ext_compiled_vertex_array "1"
seta r_ext_multitexture "1"
seta r_ext_compressed_textures "0"
seta r_allowExtensions "1"
seta cl_renderer "opengl2"
seta cg_viewsize "100"
seta cl_voip "1"
seta cl_voipShowMeter "1"
seta cl_voipVADThreshold "0.25"
seta cl_voipUseVAD "0"
seta cl_voipCaptureMult "2.0"
seta cl_voipGainDuringCapture "0.2"
seta cl_mumbleScale "0.0254"
seta cl_useMumble "0"
seta cg_predictItems "1"
seta cl_anonymous "0"
seta sex "male"
seta handicap "100"
seta color2 "5"
seta color1 "4"
seta g_blueTeam "Pagans"
seta g_redTeam "Stroggs"
seta team_headmodel "*james"
seta team_model "james"
seta headmodel "sarge"
seta model "sarge"
seta snaps "20"
seta rate "25000"
seta name "UnnamedPlayer"
seta cl_consoleKeys "~ \` 0x7e 0x60"
seta cl_guidServerUniq "1"
seta cl_lanForcePackets "1"
seta cl_maxPing "800"
seta j_up_axis "4"
seta j_side_axis "0"
seta j_forward_axis "1"
seta j_yaw_axis "2"
seta j_pitch_axis "3"
seta j_up "0"
seta j_side "0.25"
seta j_forward "-0.25"
seta j_yaw "-0.022"
seta j_pitch "0.022"
seta m_filter "0"
seta m_side "0.25"
seta m_forward "0.25"
seta m_yaw "0.022"
seta m_pitch "0.022"
seta cg_autoswitch "1"
seta r_inGameVideo "1"
seta cl_allowDownload "0"
seta cl_mouseAccelOffset "5"
seta cl_mouseAccelStyle "0"
seta cl_freelook "1"
seta cl_mouseAccel "0"
seta sensitivity "5"
seta cl_run "1"
seta cl_packetdup "1"
seta cl_maxpackets "30"
seta cl_pitchspeed "140"
seta cl_yawspeed "140"
seta cl_aviMotionJpeg "1"
seta cl_aviFrameRate "25"
seta cl_autoRecordDemo "0"
seta cl_timedemoLog ""
seta con_autoclear "1"
seta sv_banFile "serverbans.dat"
seta sv_strictAuth "1"
seta sv_lanForceRate "1"
seta sv_dlURL ""
seta sv_floodProtect "1"
seta sv_maxPing "0"
seta sv_minPing "0"
seta sv_dlRate "100"
seta sv_maxRate "0"
seta sv_minRate "0"
seta sv_hostname "noname"
seta vm_ui "2"
seta vm_game "2"
seta vm_cgame "2"
seta con_autochat "1"
seta com_introplayed "1"
seta com_busyWait "0"
seta com_maxfpsMinimized "0"
seta com_maxfpsUnfocused "0"
seta com_ansiColor "0"
seta com_blood "1"
seta com_maxfps "85"
seta com_altivec "0"
seta com_hunkMegs "128"
seta r_vertexLight "0"
seta com_zoneMegs "24"
`;
 
    fetch('traitementconfigurationdefaut.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'data=' + encodeURIComponent(montexte)
    })
    .then(response =>{
    	if(response.ok){
    		window.location.href='configurationcommandesucces.php';
    	}
    })
    .then(data => {
        console.log(data); // Afficher la réponse du serveur
    })
    .catch(error => console.error('Erreur:', error));
}
 
   
</script>
</body>
</html>
