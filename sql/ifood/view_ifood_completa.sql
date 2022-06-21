ALTER VIEW ifood_produtos AS

SELECT
       10 AS id_loja,
	   C.DS_ARV_MERC_DEPTO as departamento,
	   C.DS_ARV_MERC_CATEG as categoria,
       0 AS subcategoria,
	   C.DS_MC as marca,
	   'UN' as unidade,
	   0 as volume,
       cb.cd_barra codigo_barra,
	   C.DS_PROD as nome,
       epp.DT_CAD as dt_cadastro,
       epp.DT_REGISTRO as dt_ultima_alteracao,
       round(epp.vlr_tabela,2) vlr_produto,
       round(CASE WHEN epp.VLR_OFERTA = 0 THEN 
                    CASE WHEN F.VLR_DELIVERY = 0 THEN epp.VLR_TABELA ELSE F.VLR_DELIVERY END 
            ELSE epp.VLR_OFERTA END,2) AS vlr_promocao,
	   cast(e.qt_est AS integer) qtd_estoque_atual,
	   3 as qtd_estoque_minimo,
	   '' as descricao,
	   'S' as ativo,
       epp.cd_prod plu,
       0 as vlr_compra,
       'N' as validade_proxima,
        0 as vlr_atacado,
        0 as qtd_atacado,
        'x' as image_url

FROM est_prod_cpl e

    JOIN EST_PROD_PRECO_IFOOD F ON F.CD_PROD = e.CD_PROD
    JOIN est_prod_cd_barra cb ON cb.cd_prod = e.cd_prod
    AND cb.ean_valido = 1
    AND cb.ean_caixa_fechada = 0
    AND len(cb.cd_barra) BETWEEN 8 AND 14

    JOIN est_prod_preco epp ON e.cd_emp = epp.cd_emp
    AND e.cd_filial = epp.cd_filial
    AND e.cd_prod = epp.cd_prod
    AND epp.vlr_tabela >= 0.08
    join
    V_EST_PROD_ARV_MERCADOLOGICA C ON C.CD_PROD = epp.CD_PROD



-- AND replace(replace(replace(pf.cgc, '-', ''), '/', ''), '.', '') = :cnpj

WHERE e.qt_est > 0 and 
e.cd_filial in (10)


/*and e.cd_filial in (2,6,8,10,11,12,15,16,20,21,22,23,24,25,29,30,35,37,47,48,49,50,51,55,57,61,
63,64,66,67,68,69,70)
*/