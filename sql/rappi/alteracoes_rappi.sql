---- views rappi -----


ALTER VIEW osuper_produto AS
WITH TesteContador(contador)
AS
(
SELECT 0 AS contador
UNION ALL
SELECT contador + 1 AS contador FROM TesteContador
WHERE contador < 200000
)


SELECT 
	B.CD_PROD AS sku,
	D.CD_MC as codigo_marca,
	D.DS_PROD AS nome,
	A.CD_BARRA AS gtin,
	0 AS conteudo,
	'UN' AS unidade_conteudo,
	'UN' AS unidade_venda,
	'P' AS tipo_produto,
	B.DT_CAD AS data_inclusao,
	B.DT_ULT_ATU AS data_alteracao

FROM
	TesteContador cont,
	EST_PROD C,
	EST_PROD_CPL B 
	INNER JOIN
	EST_PROD_CD_BARRA A 
	ON B.CD_PROD = A.CD_PROD 
	INNER JOIN
	V_EST_PROD_ARV_MERCADOLOGICA D
	ON D.CD_PROD = A.CD_PROD

WHERE  
	C.STS_PROD = 0 and
	C.CD_PROD = cont.contador and
	B.CD_PROD = cont.contador and
	B.CD_FILIAL = 30 and
	A.CD_BARRA = (SELECT MAX(CD_BARRA) FROM EST_PROD_CD_BARRA WHERE CD_PROD = cont.contador)

	
------ eixe --------



ALTER VIEW osuper_estoque AS
SELECT 
	E.CD_PROD AS sku, 
	E.QT_EST AS estoque_disponivel, 
	E.DT_ULT_ATU AS data_alteracao,
	E.DT_CAD  AS data_cadastro

FROM EST_PROD_CPL E WHERE E.CD_FILIAL in (57, 66);



------ eixe --------




ALTER VIEW osuper_preco AS
WITH TesteContador(contador)
AS
(
SELECT 0 AS contador
UNION ALL
SELECT contador + 1 AS contador FROM TesteContador
WHERE contador < 200000
)

SELECT 
	A.CD_FILIAL AS codigo_loja,
	A.CD_PROD AS sku,
	B.VLR_DELIVERY AS preco_promocional, 
	A.VLR_TABELA AS preco_normal,
	CASE WHEN B.VLR_DELIVERY!=0 THEN 1 ELSE 0 END AS promocao,
	A.DT_CAD AS data_inclusao,
	A.DT_CAD AS data_alteracao

FROM
	EST_PROD_PRECO A
	JOIN EST_PROD_PRECO_RAPPI B ON B.CD_PROD = A.CD_PROD,
	TesteContador cont
	
WHERE  
	A.CD_PROD = cont.contador and
	A.CD_FILIAL IN (57, 66)




------ eixe --------




ALTER VIEW osuper_produto_loja AS
WITH TesteContador(contador)
AS
(
SELECT 0 AS contador
UNION ALL
SELECT contador + 1 AS contador FROM TesteContador
WHERE contador < 200000
)
 

SELECT 
	A.CD_FILIAL AS codigo_loja,
	A.CD_PROD AS sku,
	A.DT_CAD AS data_inclusao,
	CASE WHEN B.STS_PROD = 0 THEN 'S' ELSE 'N' END AS ativo,
	'I' as gluten,
	A.DT_CAD AS data_alteracao

FROM
	EST_PROD_PRECO A 
	JOIN EST_PROD B ON B.CD_PROD = A.CD_PROD, 
	TesteContador cont
	
WHERE  
	A.CD_PROD = cont.contador and
	A.CD_FILIAL IN (57, 66) 

