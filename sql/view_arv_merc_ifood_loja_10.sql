SELECT  * FROM ARVORE_RAPPI
OPTION (maxrecursion 0)

ALTER VIEW ARVORE_IFOOD AS

WITH TesteContador(contador)
AS
(
SELECT 0 AS contador
UNION ALL
SELECT contador + 1 AS contador FROM TesteContador
WHERE contador < 200000
)

SELECT
        A.CD_PROD, 
        C.CD_ARV_MERC_FAMILIA,
        C.CD_MC,
        C.CD_FABRIC,
        C.CD_ARV_MERC_CATEG,
        C.CD_ARV_MERC_LINHA,
		A.VLR_TABELA

FROM  
	TesteContador cont,
	EST_PROD_PRECO A INNER JOIN
	V_EST_PROD_ARV_MERCADOLOGICA C ON C.CD_PROD = A.CD_PROD 
WHERE

	A.CD_PROD = cont.contador 
	and	A.CD_FILIAL = 10 

