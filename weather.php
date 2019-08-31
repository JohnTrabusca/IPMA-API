<?php
date_default_timezone_set('Europe/Lisbon');
setlocale(LC_ALL, 'pt_PT.utf-8');

function get_content($URL){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $URL);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function id_local($id_local){
    switch ($id_local) {
        case 1010500:
            echo "Aveiro";
            break;
        case 1020500:
            echo "Beja";
            break;
        case 1030300:
            echo "Braga";
            break;
        case 1040200:
            echo "Bragança";
            break;
        case 1050200:
            echo "Castelo Branco";
            break;
        case 1060300:
            echo "Coimbra";
            break;
        case 1070500:
            echo "Évora";
            break;
        case 1080500:
            echo "Faro";
            break;
        case 1090700:
            echo "Guarda";
            break;
        case 1100900:
            echo "Leiria";
            break;
        case 1110600:
            echo "Lisboa";
            break;
        case 1121400:
            echo "Portalegre";
            break;
        case 1131200:
            echo "Porto";
            break;
        case 1141600:
            echo "Santarém";
            break;
        case 1151200:
            echo "Setúbal";
            break;
        case 1160900:
            echo "Viana do Castelo";
            break;
        case 1171400:
            echo "Vila Real";
            break;
        case 1182300:
            echo "Viseu";
            break;
        case 2310300:
            echo "Funchal";
            break;
        case 2320100:
            echo "Porto Santo";
            break;
        case 3420300:
            echo "Ponta Delgada";
            break;
        case 3430100:
            echo "Angra do Heroísmo";
            break;
        case 3470100:
            echo "Horta";
            break;
        case 3480200:
            echo "Santa Cruz das Flores";
            break;
    }
}

function tipo_vento($vento_id){
    switch ($vento_id) {
        case 0:
            echo "Sem Informação";
            break;
        case 1:
            echo "Fraco";
            break;
        case 2:
            echo "Moderado";
            break;
        case 3:
            echo "Forte";
            break;
        case 4:
            echo "Muito forte";
            break;
    }
}

function dir_vento($vento_dir){
    switch ($vento_dir) {
        case 'N':
            echo "Norte";
            break;
        case 'NE':
            echo "Nordeste";
            break;
        case 'E':
            echo "Este";
            break;
        case 'SE':
            echo "Sudeste";
            break;
        case 'S':
            echo "Sul";
            break;
        case 'SW':
            echo "Sudoeste";
            break;
        case 'W':
            echo "Oeste";
            break;
        case 'NW':
            echo "Noroeste";
            break;
    }
}

function tipo_tempo($tempo_id){
    switch ($tempo_id) {
        case 0:
            echo "Sem Informação";
            break;
        case 1:
            echo "Céu limpo";
            break;
        case 2:
            echo "Céu pouco nublado";
            break;
        case 3:
            echo "Céu parcialmente nublado";
            break;
        case 4:
            echo "Céu muito nublado ou encoberto";
            break;
        case 5:
            echo "Céu nublado por nuvens altas";
            break;
        case 6:
            echo "Aguaceiros";
            break;
        case 7:
            echo "Aguaceiros fracos";
            break;
        case 8:
            echo "Aguaceiros fortes";
            break;
        case 9:
            echo "Chuva";
            break;
        case 10:
            echo "Chuva fraca ou chuvisco";
            break;
        case 11:
            echo "Chuva forte";
            break;
        case 12:
            echo "Períodos de chuva";
            break;
        case 13:
            echo "Períodos de chuva fraca";
            break;
        case 14:
            echo "Períodos de chuva forte";
            break;
        case 15:
            echo "Chuvisco";
            break;
        case 16:
            echo "Neblina";
            break;
        case 17:
            echo "Nevoeiro ou nuvens baixas";
            break;
        case 18:
            echo "Neve";
            break;
        case 19:
            echo "Trovoada";
            break;
        case 20:
            echo "Aguaceiros e trovoada";
            break;
        case 21:
            echo "Granizo";
            break;
        case 22:
            echo "Geada";
            break;
        case 23:
            echo "Chuva  e trovoada";
            break;
        case 24:
            echo "Nebulosidade convectiva";
            break;
        case 25:
            echo "Céu com Períodos de muito nublado";
            break;
        case 26:
            echo "Nevoeiro";
            break;
        case 27:
            echo "Céu nublado";
            break;
    }
}

function icon_tempo($tempo_id){
    switch ($tempo_id) {
        case 0:
            echo "";
            break;
        case 1:
            echo "sun";
            break;
        case 27:
        case 26:
        case 25:
        case 24:
        case 17:
        case 16:
        case 5:
        case 4:
        case 3:
        case 2:
            echo "cloud";
            break;
        case 20:
        case 14:
        case 12:
        case 11:
        case 9:
        case 8:
        case 7:
        case 6:
            echo "cloud-rain";
            break;
        case 10:
            echo "cloud-drizzle";
            break;
        case 15:
        case 13:
            echo "droplet";
            break;
        case 21:
        case 18:
            echo "cloud-snow";
            break;
        case 23:
        case 19:
            echo "cloud-lightning";
            break;
        case 22:
            echo "wind";
            break;
    }
}

if (isset($_GET['act']) and $_GET['act']=='locais'){

    $id_local = $_POST['id_local'];

    $json = get_content("http://api.ipma.pt/open-data/forecast/meteorology/cities/daily/$id_local.json");
    $jsond = utf8_encode($json);
    $data = json_decode($jsond, TRUE);

    ?>
    <div class="weather-side 0">
        <div class="weather-gradient"></div>
        <div class="date-container">
            <h2 class="date-dayname"><?php echo ucfirst(strftime( "%A", strtotime($data['data'][0]['forecastDate']))) ?></h2><span class="date-day"><?php echo ucwords(strftime("%d %b %Y", strtotime($data['data'][0]['forecastDate']))); ?></span>
            <i class="location-icon" data-feather="map-pin"></i>
            <span class="location"><?php id_local($data['globalIdLocal']) ?></span>
        </div>
        <div class="weather-container">
            <i class="weather-icon" data-feather="<?php icon_tempo($data['data'][0]['idWeatherType']) ?>"></i>
            <h1 class="weather-temp"><?php echo round($data['data'][0]['tMin'],0).'ºC - '.round($data['data'][0]['tMax'],0).'ºC'?></h1>
            <h3 class="weather-desc"><?php tipo_tempo($data['data'][0]['idWeatherType']) ?></h3>
        </div>
    </div>

    <?php for ($i=1;$i<=4;$i++){ ?>
        <div class="weather-side <?php echo $i?>" hidden>
            <div class="weather-gradient"></div>
            <div class="date-container">
                <h2 class="date-dayname"><?php echo ucfirst(strftime( "%A", strtotime($data['data'][$i]['forecastDate']))) ?></h2><span class="date-day"><?php echo ucwords(strftime("%d %b %Y", strtotime($data['data'][$i]['forecastDate']))); ?></span>
                <i class="location-icon" data-feather="map-pin"></i>
                <span class="location"><?php id_local($data['globalIdLocal']) ?></span>
            </div>
            <div class="weather-container">
                <i class="weather-icon" data-feather="<?php icon_tempo($data['data'][$i]['idWeatherType']) ?>"></i>
                <h1 class="weather-temp"><?php echo round($data['data'][$i]['tMin'],0).'ºC - '.round($data['data'][$i]['tMax'],0).'ºC'?></h1>
                <h3 class="weather-desc"><?php tipo_tempo($data['data'][$i]['idWeatherType']) ?></h3>
            </div>
        </div>
    <?php }unset($i) ?>


    <div class="info-side">
        <div class="today-info-container">
            <div class="today-info" id="0">
                <div class="precipitation">
                    <span class="title">PRECIPITAÇÃO</span>
                    <span class="value"><?php echo round($data['data'][0]['precipitaProb'],0)?> %</span>
                    <div class="clear"></div>
                </div>
                <div class="wind">
                    <span class="title">VENTO</span>
                    <span class="value"><?php tipo_vento($data['data'][0]['classWindSpeed']) ?></span>
                    <div class="clear"></div>
                </div>
                <div class="wind">
                    <span class="title">DIREÇÃO DO VENTO</span>
                    <span class="value"><?php dir_vento($data['data'][0]['predWindDir']) ?></span>
                    <div class="clear"></div>
                </div>
            </div>
            <?php for ($i=1;$i<=4;$i++){ ?>
                <div class="today-info" id="<?php echo $i?>" hidden>
                    <div class="precipitation">
                        <span class="title">PRECIPITAÇÃO</span>
                        <span class="value"><?php echo round($data['data'][$i]['precipitaProb'],0)?> %</span>
                        <div class="clear"></div>
                    </div>
                    <div class="wind">
                        <span class="title">VENTO</span>
                        <span class="value"><?php tipo_vento($data['data'][$i]['classWindSpeed']) ?></span>
                        <div class="clear"></div>
                    </div>
                    <div class="wind">
                        <span class="title">DIREÇÃO DO VENTO</span>
                        <span class="value"><?php dir_vento($data['data'][$i]['predWindDir']) ?></span>
                        <div class="clear"></div>
                    </div>
                </div>
            <?php }unset($i) ?>


        </div>

        <div class="week-container">
            <ul class="week-list">
                <li class="dias active" value="0">
                    <i class="day-icon" data-feather="<?php icon_tempo($data['data'][0]['idWeatherType']) ?>"></i>
                    <span class="day-name"><?php echo ucfirst(substr(strftime( "%A", strtotime($data['data'][0]['forecastDate'])),0,3)) ?></span>
                    <span class="day-temp"><?php echo round($data['data'][0]['tMin'],0).'ºC'?></span>
                    <span class="day-temp"><?php echo round($data['data'][0]['tMax'],0).'ºC' ?></span>
                </li>
                <?php for ($i=1;$i<=4;$i++){ ?>
                    <li class="dias" value="<?php echo $i?>">
                        <i class="day-icon" data-feather="<?php icon_tempo($data['data'][$i]['idWeatherType']) ?>"></i>
                        <span class="day-name"><?php echo ucfirst(substr(strftime( "%A", strtotime($data['data'][$i]['forecastDate'])),0,3)) ?></span>
                        <span class="day-temp"><?php echo round($data['data'][$i]['tMin'],0).'ºC'?></span>
                        <span class="day-temp"><?php echo round($data['data'][$i]['tMax'],0).'ºC' ?></span>
                    </li>
                <?php }unset($i) ?>

                <div class="clear"></div>
            </ul>
        </div>
        <div class="location-container">
            <button class="location-button" data-dropdown="#dropdown-dark-with-icons">
                <i data-feather="map-pin"></i><span>Mudar Localização</span>
            </button>
            <div class="dropdown-menu dropdown-anchor-top-center dropdown-has-anchor dark" id="dropdown-dark-with-icons">
                <ul>
                    <li><a class="locais" id="1010500">Aveiro</a></li>
                    <li><a class="locais" id="1020500">Beja</a></li>
                    <li><a class="locais" id="1030300">Braga</a></li>
                    <li><a class="locais" id="1040200">Bragança</a></li>
                    <li><a class="locais" id="1050200">Castelo Branco</a></li>
                    <li><a class="locais" id="1060300">Coimbra</a></li>
                    <li><a class="locais" id="1070500">Évora</a></li>
                    <li><a class="locais" id="1080500">Faro</a></li>
                    <li><a class="locais" id="1090700">Guarda</a></li>
                    <li><a class="locais" id="1100900">Leiria</a></li>
                    <li><a class="locais" id="1110600">Lisboa</a></li>
                    <li><a class="locais" id="1121400">Portalegre</a></li>
                    <li><a class="locais" id="1131200">Porto</a></li>
                    <li><a class="locais" id="1141600">Santarém</a></li>
                    <li><a class="locais" id="1151200">Setúbal</a></li>
                    <li><a class="locais" id="1160900">Viana do Castelo</a></li>
                    <li><a class="locais" id="1171400">Vila Real</a></li>
                    <li><a class="locais" id="1182300">Viseu</a></li>
                    <li><a class="locais" id="2310300">Funchal</a></li>
                    <li><a class="locais" id="2320100">Porto Santo</a></li>
                    <li><a class="locais" id="3420300">Ponta Delgada</a></li>
                    <li><a class="locais" id="3430100">Angra do Heroísmo</a></li>
                    <li><a class="locais" id="3470100">Horta</a></li>
                    <li><a class="locais" id="3480200">Santa Cruz das Flores</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}else{

                        //http://api.ipma.pt/open-data/forecast/meteorology/cities/daily/{Alterar para a cidade pretendente}.json (Consultar função id_local)
$json = get_content("http://api.ipma.pt/open-data/forecast/meteorology/cities/daily/2310300.json");
$jsond = utf8_encode($json);
$data = json_decode($jsond, TRUE);

//Resultado API:
//    forecastDate: data da previsão
//    dataUpdate: data de atualização
//    globalIdLocal: identificador do local
//    idWeatherType: código relativo ao tipo de tempo - (Usar função tipo_tempo)
//    tMin: temperatura mínima diária
//    tMax: temperatura máxima diária
//    classWindSpeed: classe da intensidade do vento (Usar função tipo_vento)
//    predWindDir: rumo predominante do vento (N, NE, E, SE, S, SW, W, NW)
//    precipitaProb: probabilidade da precipitação

?>
<html lang="pt">
<head>
    <title id="page_title">Meteorologia - <?php id_local($data['globalIdLocal']) ?></title>
    <link rel="shortcut icon" type="image/png" href="https://ssl.gstatic.com/onebox/weather/64/sunny_s_cloudy.png"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="assets/sweetdropdown/jquery.sweet-dropdown.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <script src="assets/sweetdropdown/jquery.sweet-dropdown.min.js"></script>

</head>
<body>
<div class="container">
    <div class="weather-side 0">
        <div class="weather-gradient"></div>
        <div class="date-container">
            <h2 class="date-dayname"><?php echo ucfirst(strftime( "%A", strtotime($data['data'][0]['forecastDate']))) ?></h2><span class="date-day"><?php echo ucwords(strftime("%d %b %Y", strtotime($data['data'][0]['forecastDate']))); ?></span>
            <i class="location-icon" data-feather="map-pin"></i>
            <span class="location"><?php id_local($data['globalIdLocal']) ?></span>
        </div>
        <div class="weather-container">
            <i class="weather-icon" data-feather="<?php icon_tempo($data['data'][0]['idWeatherType']) ?>"></i>
            <h1 class="weather-temp"><?php echo round($data['data'][0]['tMin'],0).'ºC - '.round($data['data'][0]['tMax'],0).'ºC'?></h1>
            <h3 class="weather-desc"><?php tipo_tempo($data['data'][0]['idWeatherType']) ?></h3>
        </div>
    </div>

    <?php for ($i=1;$i<=4;$i++){ ?>
        <div class="weather-side <?php echo $i?>" hidden>
            <div class="weather-gradient"></div>
            <div class="date-container">
                <h2 class="date-dayname"><?php echo ucfirst(strftime( "%A", strtotime($data['data'][$i]['forecastDate']))) ?></h2><span class="date-day"><?php echo ucwords(strftime("%d %b %Y", strtotime($data['data'][$i]['forecastDate']))); ?></span>
                <i class="location-icon" data-feather="map-pin"></i>
                <span class="location"><?php id_local($data['globalIdLocal']) ?></span>
            </div>
            <div class="weather-container">
                <i class="weather-icon" data-feather="<?php icon_tempo($data['data'][$i]['idWeatherType']) ?>"></i>
                <h1 class="weather-temp"><?php echo round($data['data'][$i]['tMin'],0).'ºC - '.round($data['data'][$i]['tMax'],0).'ºC'?></h1>
                <h3 class="weather-desc"><?php tipo_tempo($data['data'][$i]['idWeatherType']) ?></h3>
            </div>
        </div>
    <?php }unset($i) ?>


    <div class="info-side">
        <div class="today-info-container">
            <div class="today-info" id="0">
                <div class="precipitation">
                    <span class="title">PRECIPITAÇÃO</span>
                    <span class="value"><?php echo round($data['data'][0]['precipitaProb'],0)?> %</span>
                    <div class="clear"></div>
                </div>
                <div class="wind">
                    <span class="title">VENTO</span>
                    <span class="value"><?php tipo_vento($data['data'][0]['classWindSpeed']) ?></span>
                    <div class="clear"></div>
                </div>
                <div class="wind">
                    <span class="title">DIREÇÃO DO VENTO</span>
                    <span class="value"><?php dir_vento($data['data'][0]['predWindDir']) ?></span>
                    <div class="clear"></div>
                </div>
            </div>
            <?php for ($i=1;$i<=4;$i++){ ?>
                <div class="today-info" id="<?php echo $i?>" hidden>
                    <div class="precipitation">
                        <span class="title">PRECIPITAÇÃO</span>
                        <span class="value"><?php echo round($data['data'][$i]['precipitaProb'],0)?> %</span>
                        <div class="clear"></div>
                    </div>
                    <div class="wind">
                        <span class="title">VENTO</span>
                        <span class="value"><?php tipo_vento($data['data'][$i]['classWindSpeed']) ?></span>
                        <div class="clear"></div>
                    </div>
                    <div class="wind">
                        <span class="title">DIREÇÃO DO VENTO</span>
                        <span class="value"><?php dir_vento($data['data'][$i]['predWindDir']) ?></span>
                        <div class="clear"></div>
                    </div>
                </div>
            <?php }unset($i) ?>


        </div>

        <div class="week-container">
            <ul class="week-list">
                <li class="dias active" value="0">
                    <i class="day-icon" data-feather="<?php icon_tempo($data['data'][0]['idWeatherType']) ?>"></i>
                    <span class="day-name"><?php echo ucfirst(substr(strftime( "%A", strtotime($data['data'][0]['forecastDate'])),0,3)) ?></span>
                    <span class="day-temp"><?php echo round($data['data'][0]['tMin'],0).'ºC'?></span>
                    <span class="day-temp"><?php echo round($data['data'][0]['tMax'],0).'ºC' ?></span>
                </li>
                <?php for ($i=1;$i<=4;$i++){ ?>
                    <li class="dias" value="<?php echo $i?>">
                        <i class="day-icon" data-feather="<?php icon_tempo($data['data'][$i]['idWeatherType']) ?>"></i>
                        <span class="day-name"><?php echo ucfirst(substr(strftime( "%A", strtotime($data['data'][$i]['forecastDate'])),0,3)) ?></span>
                        <span class="day-temp"><?php echo round($data['data'][$i]['tMin'],0).'ºC'?></span>
                        <span class="day-temp"><?php echo round($data['data'][$i]['tMax'],0).'ºC' ?></span>
                    </li>
                <?php }unset($i) ?>

                <div class="clear"></div>
            </ul>
        </div>
        <div class="location-container">
            <button class="location-button" data-dropdown="#dropdown-dark-with-icons">
                <i data-feather="map-pin"></i><span>Mudar Localização</span>
            </button>
            <div class="dropdown-menu dropdown-anchor-top-center dropdown-has-anchor dark" id="dropdown-dark-with-icons">
                <ul>
                    <li><a class="locais" id="1010500">Aveiro</a></li>
                    <li><a class="locais" id="1020500">Beja</a></li>
                    <li><a class="locais" id="1030300">Braga</a></li>
                    <li><a class="locais" id="1040200">Bragança</a></li>
                    <li><a class="locais" id="1050200">Castelo Branco</a></li>
                    <li><a class="locais" id="1060300">Coimbra</a></li>
                    <li><a class="locais" id="1070500">Évora</a></li>
                    <li><a class="locais" id="1080500">Faro</a></li>
                    <li><a class="locais" id="1090700">Guarda</a></li>
                    <li><a class="locais" id="1100900">Leiria</a></li>
                    <li><a class="locais" id="1110600">Lisboa</a></li>
                    <li><a class="locais" id="1121400">Portalegre</a></li>
                    <li><a class="locais" id="1131200">Porto</a></li>
                    <li><a class="locais" id="1141600">Santarém</a></li>
                    <li><a class="locais" id="1151200">Setúbal</a></li>
                    <li><a class="locais" id="1160900">Viana do Castelo</a></li>
                    <li><a class="locais" id="1171400">Vila Real</a></li>
                    <li><a class="locais" id="1182300">Viseu</a></li>
                    <li><a class="locais" id="2310300">Funchal</a></li>
                    <li><a class="locais" id="2320100">Porto Santo</a></li>
                    <li><a class="locais" id="3420300">Ponta Delgada</a></li>
                    <li><a class="locais" id="3430100">Angra do Heroísmo</a></li>
                    <li><a class="locais" id="3470100">Horta</a></li>
                    <li><a class="locais" id="3480200">Santa Cruz das Flores</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src='assets/js/script.js'></script>
    </body>
    </html>
    <?php } ?>

