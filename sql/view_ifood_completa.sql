CREATE VIEW ifood_produtos AS
WITH TesteContador(contador)
AS
(
SELECT 0 AS contador
UNION ALL
SELECT contador + 1 AS contador FROM TesteContador
WHERE contador < 200000
)

SELECT 
	10 AS id_loja,
	C.DS_ARV_MERC_DEPTO as departamento,
	C.DS_ARV_MERC_CATEG as categoria,
	0 AS subcategoria,
	C.DS_MC as marca,
	'UN' as unidade,
	0 as volume,
	D.CD_BARRA as codigo_barra,
	C.DS_PROD as nome,
	A.DT_CAD as dt_cadastro,
	A.DT_REGISTRO as dt_ultima_alteracao,
	A.VLR_TABELA AS vlr_produto,
	CASE WHEN A.VLR_OFERTA = 0 THEN F.VLR_DELIVERY ELSE A.VLR_OFERTA END AS vlr_promocao, 
	E.QT_EST as qtd_estoque_atual,
	2 as qtd_estoque_minimo,
	CASE WHEN B.STS_PROD = 0 THEN 'S' ELSE 'N' END AS ativo,
	A.CD_PROD as plu,
	0 as vlr_compra,
	'N' as validade_proxima,
	0 as vlr_atacado,
	0 as qtd_atacado,
	'x' as image_url
	
FROM  
	TesteContador cont,
	EST_PROD_PRECO A INNER JOIN
	EST_PROD B ON B.CD_PROD = A.CD_PROD inner join
	V_EST_PROD_ARV_MERCADOLOGICA C ON C.CD_PROD = A.CD_PROD inner join
	EST_PROD_CD_BARRA D ON D.CD_PROD = A.CD_PROD inner join
	EST_PROD_CPL E ON E.CD_PROD = A.CD_PROD inner join
	EST_PROD_PRECO_DELIVERY F ON F.CD_PROD = A.CD_PROD

WHERE
	A.CD_PROD = cont.contador and
	---B.STS_PROD = 0 and
	A.CD_FILIAL = 10 and
	E.CD_FILIAL = 10 and
	D.CD_BARRA = (SELECT MAX(CD_BARRA) FROM EST_PROD_CD_BARRA WHERE CD_PROD = cont.contador)



