-- sample queries

--select min fechamento e date de uma ação 
SELECT 
    MIN(NULLIF(dp.close, 0)), dp.date
FROM
    daily_prices AS dp
WHERE
    dp.symbol = 'ITUB4.SA'
        AND dp.date = (SELECT 
            dp.date
        FROM
            daily_prices AS dp
        WHERE
            dp.close = (SELECT 
                    MIN(NULLIF(dp.close, 0))
                FROM
                    daily_prices AS dp
                WHERE
                    dp.symbol = 'ITUB4.SA'))
GROUP BY dp.symbol, dp.date;

--select visão geral de todas as ações no banco
SELECT dp.symbol AS 'Ativo',
       AVG(NULLIF(dp.close,0)) AS 'Média Fechamento',
       AVG(NULLIF(dp.open,0)) AS 'Média Abertura',
       MIN(NULLIF(dp.close,0)) AS 'Menor Fechamento',
       MAX(NULLIF(dp.close,0)) AS 'Maior Fechamento',
       MIN(NULLIF(dp.open,0)) AS 'Menor Abertura',
       MAX(NULLIF(dp.open,0)) AS 'Maior Abertura'
FROM daily_prices AS dp
GROUP BY dp.symbol;