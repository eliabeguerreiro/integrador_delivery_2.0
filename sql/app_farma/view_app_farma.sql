SELECT e.cd_prod sku,
       cb.cd_barra ean,
       cast(e.qt_est AS integer) available,
       round(epp.vlr_tabela,2) price_original,
	   replace(replace(replace(pf.cgc, '-', ''), '/', ''), '.', '') cnpj,
       round(CASE WHEN F.VLR_DELIVERY = 0 THEN epp.VLR_TABELA ELSE F.VLR_DELIVERY END,2) AS price
FROM est_prod_cpl e
join EST_PROD_PRECO_IFOOD F ON F.CD_PROD = e.CD_PROD
JOIN est_prod_cd_barra cb ON cb.cd_prod = e.cd_prod
AND cb.ean_valido = 1
AND cb.ean_caixa_fechada = 0
AND len(cb.cd_barra) BETWEEN 8 AND 14
JOIN est_prod_preco epp ON e.cd_emp = epp.cd_emp
AND e.cd_filial = epp.cd_filial
AND e.cd_prod = epp.cd_prod
AND epp.vlr_tabela >= 0.08
JOIN prc_filial pf ON e.cd_emp = pf.cd_emp
AND e.cd_filial = pf.cd_filial
AND pf.sts_filial = 0

-- AND replace(replace(replace(pf.cgc, '-', ''), '/', ''), '.', '') = :cnpj
WHERE e.qt_est > 0
and e.cd_filial in (8,10,12,30,35,55)
/*and e.cd_filial in (2,6,8,10,11,12,15,16,20,21,22,23,24,25,29,30,35,37,47,48,49,50,51,55,57,61,
63,64,66,67,68,69,70)
*/

select * from prc_filial where cgc in ('01486101/0007-72','01486101/0005-00',
'70097530/0003-47','70097530/0016-61','70097530/0011-57','70097530/0025-52')


select * from app_farma_produtos where cnpj = :cnpj