<?php
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
