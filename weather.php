<?php
date_default_timezone_set('Europe/Lisbon');
setlocale(LC_ALL, 'pt_PT.utf-8');

include 'php-functions/functions.php';

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

