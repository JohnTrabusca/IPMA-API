# IPMA-API
Exemplo prático da API do IPMA - Previsão para 5 dias

> Servidor necessita de cURL ativado

Funções mencionadas podem ser consultadas no ficheiro php-functions/functions.php

Lista de cidades disponíveis estão presentes na função id_local

Request API: 
http://api.ipma.pt/open-data/forecast/meteorology/cities/daily/ {Alterar para a cidade pretendente}.json

Resultado API:

 - forecastDate: data da previsão
 - dataUpdate: data de atualização
 - globalIdLocal: identificador do local
 - idWeatherType: código relativo ao tipo de tempo - (Usar função tipo_tempo)
 - tMin: temperatura mínima diária
 - tMax: temperatura máxima diária
 - classWindSpeed: classe da intensidade do vento (Usar função
   tipo_vento)
 - predWindDir: rumo predominante do vento (N, NE, E, SE, S, SW, W, NW)
 - precipitaProb: probabilidade da precipitação

Para mais opções consultar este [link](http://api.ipma.pt/#services)

Todos os direitos reservados ao Instituto Português do Mar e da Atmosfera, I. P. (IPMA, I. P.)
