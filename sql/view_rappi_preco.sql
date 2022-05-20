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
	A.VLR_OFERTA AS preco_promocional, 
	A.VLR_TABELA AS preco_normal,
	A.VLR_OFERTA, CASE WHEN A.VLR_OFERTA!=0 THEN 1 ELSE 0 END AS promocao,
	A.DT_CAD AS data_inclusao,
	A.DT_CAD AS data_alteracao

FROM
	EST_PROD_PRECO A,
	TesteContador cont
	
WHERE  
	A.CD_PROD = cont.contador and
	A.CD_FILIAL = 66 
UNION ALL
SELECT 
	A.CD_FILIAL AS codigo_loja,
	A.CD_PROD AS sku,
	A.VLR_OFERTA AS preco_promocional, 
	A.VLR_TABELA AS preco_normal,
	A.VLR_OFERTA, CASE WHEN A.VLR_OFERTA!=0 THEN 1 ELSE B.VLR_DELIVERY END AS promocao,
	A.DT_CAD AS data_inclusao,
	A.DT_CAD AS data_alteracao

FROM
	EST_PROD_PRECO A INNER JOIN
    EST_PROD_PRECO_RAPPI66 B ON B.CD_PROD = A.CD_PROD,
	TesteContador cont
	
WHERE  
	A.CD_PROD = cont.contador and
	A.CD_FILIAL = 66 


==================================================================================================



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
	A.VLR_OFERTA AS preco_promocional, 
	A.VLR_TABELA AS preco_normal,
	A.VLR_OFERTA, CASE WHEN A.VLR_OFERTA!=0 THEN 1 ELSE 0 END AS promocao,
	A.DT_CAD AS data_inclusao,
	A.DT_CAD AS data_alteracao

FROM
	EST_PROD_PRECO A,
	TesteContador cont
	
WHERE  
	A.CD_PROD = cont.contador and
	A.CD_FILIAL = 57 
UNION ALL
SELECT 
	A.CD_FILIAL AS codigo_loja,
	A.CD_PROD AS sku,
	A.VLR_OFERTA AS preco_promocional, 
	A.VLR_TABELA AS preco_normal,
	A.VLR_OFERTA, CASE WHEN A.VLR_OFERTA!=0 THEN 1 ELSE B.VLR_DELIVERY END AS promocao,
	A.DT_CAD AS data_inclusao,
	A.DT_CAD AS data_alteracao

FROM
	EST_PROD_PRECO A INNER JOIN
    EST_PROD_PRECO_RAPPI57 B ON B.CD_PROD = A.CD_PROD,
	TesteContador cont
	
WHERE  
	A.CD_PROD = cont.contador and
	A.CD_FILIAL = 57 
