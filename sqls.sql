com processo e empenho (contando com ano)

SELECT municipio.nome as municipio,unidade.nome_unidade as nomeunidade, SUM(gastosporunidade.valor) as valor , naturezadespesa.natureza as natureza, unidade.sigla as sigla, processo.ano as anoprocesso
                    FROM `municipio` as municipio JOIN `unidade` as unidade ON unidade.municipios_id_municipios = municipio.id_municipio 
                          JOIN `gastosporunidade` as gastosporunidade ON gastosporunidade.unidade_id_unidade = unidade.id_unidade
                          JOIN `gastosporunidade_e_naturezadespesa` as gastosporunidade_e_naturezadespesa ON gastosporunidade_e_naturezadespesa.gastos_por_unidade_id_gastos_por_unidade = gastosporunidade.id_gastos_por_unidade
                          JOIN `naturezadespesa` as naturezadespesa ON naturezadespesa.id_natureza_despesa = gastosporunidade_e_naturezadespesa.natureza_despesa_id_natureza_despesa
                          JOIN `empenho` as empenho ON empenho.unidade_id_unidade = unidade.id_unidade
                          JOIN `processo`as processo ON empenho.processo_id_processo = processo.id_processo
                          GROUP BY nomeunidade
                          HAVING ano = 2016;


sem ano 

SELECT municipio.nome as municipio,unidade.nome_unidade as nomeunidade, SUM(gastosporunidade.valor) as valor , naturezadespesa.natureza as natureza, unidade.sigla as sigla
                    FROM `municipio` as municipio JOIN `unidade` as unidade ON unidade.municipios_id_municipios = municipio.id_municipio 
                          JOIN `gastosporunidade` as gastosporunidade ON gastosporunidade.unidade_id_unidade = unidade.id_unidade
                          JOIN `gastosporunidade_e_naturezadespesa` as gastosporunidade_e_naturezadespesa ON gastosporunidade_e_naturezadespesa.gastos_por_unidade_id_gastos_por_unidade = gastosporunidade.id_gastos_por_unidade
                          JOIN `naturezadespesa` as naturezadespesa ON naturezadespesa.id_natureza_despesa = gastosporunidade_e_naturezadespesa.natureza_despesa_id_natureza_despesa
                          GROUP BY nomeunidade;


CASE 2

retorna todos os tipos e suas quantidades

SELECT tipoprocesso.tipo as tipo, processo.assunto as assunto, processo.ano as ano, COUNT(tipo) as quantidade
FROM  `tipoprocesso` as tipoprocesso JOIN `processo` as processo ON processo.tipoProcesso_id_tipo_processo = tipoprocesso.id_tipo_processo
GROUP BY tipo

Apenas o ano para o filtro

SELECT processo.ano as ano
FROM  `tipoprocesso` as tipoprocesso JOIN `processo` as processo ON processo.tipoProcesso_id_tipo_processo = tipoprocesso.id_tipo_processo