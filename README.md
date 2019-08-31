# IPMA-API
Exemplo prático da API do IPMA - Previsão para 5 dias

Request API: http://api.ipma.pt/open-data/forecast/meteorology/cities/daily/ {Alterar para a cidade pretendente}.json (Consultar função id_local, ficheiro weather.php)

Resultado API:
    forecastDate: data da previsão
    dataUpdate: data de atualização
    globalIdLocal: identificador do local
    idWeatherType: código relativo ao tipo de tempo - (Usar função tipo_tempo)
    tMin: temperatura mínima diária
    tMax: temperatura máxima diária
    classWindSpeed: classe da intensidade do vento (Usar função tipo_vento)
    predWindDir: rumo predominante do vento (N, NE, E, SE, S, SW, W, NW)
    precipitaProb: probabilidade da precipitação
