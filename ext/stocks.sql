CREATE DATABASE stocks;

CREATE TABLE IF NOT EXISTS symbols (id integer NOT NULL auto_INCREMENT PRIMARY KEY, symbol varchar(20) NOT NULL UNIQUE) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS daily_prices (id integer NOT NULL auto_INCREMENT PRIMARY KEY, date date NOT NULL, symbol varchar(20) NOT NULL, open decimal(12,4) NOT NULL, high decimal(12,4) NOT NULL, low decimal(12,4) NOT NULL, close decimal(12,4) NOT NULL, volume integer NOT NULL, CONSTRAINT fk_daily_prices
                                         FOREIGN KEY (symbol) REFERENCES symbols(symbol), UNIQUE (date,symbol)) ENGINE = INNODB;

--sample queries
/*SELECT s.symbol,dp.symbol, AVG(dp.open)as 'media abertura', MIN(dp.open) as 'min abertura', MAX(dp.open) as 'max abertura'
from symbols as s inner join daily_prices as dp on dp.symbol = s.symbol
where MONTH(date) = '7'
GROUP BY s.symbol;*/