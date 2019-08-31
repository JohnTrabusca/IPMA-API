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
    <script src="assets/sweetdropdown/jquery.sweet-dropdown.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap');

        :root {
            --gradient: linear-gradient( 135deg, #72EDF2 10%, #5151E5 100%);
        }

        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            line-height: 1.25em;
        }

        .clear {
            clear: both;
        }

        body {
            margin: 0;
            width: 100%;
            height: 100vh;
            font-family: 'Montserrat', sans-serif;
            background-color: #343d4b;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .container {
            border-radius: 25px;
            -webkit-box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
            background-color: #222831;
            color: #ffffff;
            height: 400px;
        }

        .weather-side {
            position: relative;
            height: 100%;
            border-radius: 25px;
            background-image: url("https://images.unsplash.com/photo-1559963110-71b394e7494d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80");
            width: 300px;
            -webkit-box-shadow: 0 0 20px -10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 20px -10px rgba(0, 0, 0, 0.2);
            -webkit-transition: -webkit-transform 300ms ease;
            transition: -webkit-transform 300ms ease;
            -o-transition: transform 300ms ease;
            transition: transform 300ms ease;
            transition: transform 300ms ease, -webkit-transform 300ms ease;
            -webkit-transform: translateZ(0) scale(1.02) perspective(1000px);
            transform: translateZ(0) scale(1.02) perspective(1000px);
            float: left;
        }

        .weather-side:hover {
            -webkit-transform: scale(1.1) perspective(1500px) rotateY(10deg);
            transform: scale(1.1) perspective(1500px) rotateY(10deg);
        }

        .weather-gradient {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: var(--gradient);
            border-radius: 25px;
            opacity: 0.8;
        }

        .date-container {
            position: absolute;
            top: 25px;
            left: 25px;
        }

        .date-dayname {
            margin: 0;
        }

        .date-day {
            display: block;
        }

        .location {
            display: inline-block;
            margin-top: 10px;
        }

        .location-icon {
            display: inline-block;
            height: 0.8em;
            width: auto;
            margin-right: 5px;
        }

        .weather-container {
            position: absolute;
            bottom: 25px;
            left: 25px;
        }

        .weather-icon.feather {
            height: 60px;
            width: auto;
        }

        .weather-temp {
            margin: 0;
            font-weight: 700;
            font-size: 2em;
        }

        .weather-desc {
            margin: 0;
        }

        .info-side {
            position: relative;
            float: left;
            height: 100%;
            padding-top: 25px;
        }

        .today-info {
            padding: 15px;
            margin: 0 25px 25px 25px;
            /* 	box-shadow: 0 0 50px -5px rgba(0, 0, 0, 0.25); */
            border-radius: 10px;
        }

        .today-info>div:not(:last-child) {
            margin: 0 0 10px 0;
        }

        .today-info>div .title {
            float: left;
            font-weight: 700;
        }

        .today-info>div .value {
            float: right;
        }

        .week-list {
            list-style-type: none;
            padding: 0;
            margin: 10px 35px;
            -webkit-box-shadow: 0 0 50px -5px rgba(0, 0, 0, 0.25);
            box-shadow: 0 0 50px -5px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            background: #
        }

        .week-list>li {
            float: left;
            padding: 15px;
            cursor: pointer;
            -webkit-transition: 200ms ease;
            -o-transition: 200ms ease;
            transition: 200ms ease;
            border-radius: 10px;
        }

        .week-list>li:hover {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
            background: #fff;
            color: #222831;
            -webkit-box-shadow: 0 0 40px -5px rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 40px -5px rgba(0, 0, 0, 0.2)
        }

        .week-list>li.active {
            background: #fff;
            color: #222831;
            border-radius: 10px;
        }

        .week-list>li .day-name {
            display: block;
            margin: 10px 0 0 0;
            text-align: center;
        }

        .week-list>li .day-icon {
            display: block;
            height: 30px;
            width: auto;
            margin: 0 auto;
        }

        .week-list>li .day-temp {
            display: block;
            text-align: center;
            margin: 10px 0 0 0;
            font-weight: 700;
        }

        .location-container {
            padding: 25px 35px;
        }

        .location-button {
            outline: none;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border: none;
            border-radius: 25px;
            padding: 10px;
            font-family: 'Montserrat', sans-serif;
            background-image: var(--gradient);
            color: #ffffff;
            font-weight: 700;
            -webkit-box-shadow: 0 0 30px -5px rgba(0, 0, 0, 0.25);
            box-shadow: 0 0 30px -5px rgba(0, 0, 0, 0.25);
            cursor: pointer;
            -webkit-transition: -webkit-transform 200ms ease;
            transition: -webkit-transform 200ms ease;
            -o-transition: transform 200ms ease;
            transition: transform 200ms ease;
            transition: transform 200ms ease, -webkit-transform 200ms ease;
        }

        .location-button:hover {
            -webkit-transform: scale(0.95);
            -ms-transform: scale(0.95);
            transform: scale(0.95);
        }

        .location-button .feather {
            height: 1em;
            width: auto;
            margin-right: 5px;
        }
    </style>
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

