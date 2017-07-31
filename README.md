# README/CHANGELOG

## [v.0.2.1] / 2017-07-27

### Changed
* Finalizado *scheduler.php* 
    * Pendências:
        * step 4.2.2
        * logging
* *stocks.sql*
    * Mudança na estrutura do banco, adicionado coluna **close_adjusted** em **daily_prices**
* *stocks.php*
    * functions de decode* alteradas para receber os novos valores de **close_adjusted**

## [v.0.2.0] / 2017-07-27

### Added
* Adicionado folder *scheduler*
* Adicionado arquivo *scheduler.php*
* Adicionado sample de futuro logging em *stocksTest.php*

### Changed
* *stocks.sql*
    * Mudança na estrutura do banco, adicionado coluna que indica se é a primeira vez que a ação procurada vai ser atualizada 

## [v.0.1.1] / 2017-07-25

### Added
* Adicionado *sample_queries*
    * Conjunto de queries para rodar contra o banco

### Changed
* *stocks.php*
    * function **decodeAllIndexes** tem o template da query fora do for, dentro do for são processados somente os VALUES para adicionar no banco  

## [v.0.1.0] / 2017-07-21

### Added
* Criado README para o projeto, mudanças e implementações anteriores não serão contempladas
* Criado database *stocks_staging* para ser usado como ambiente de testes.

### Changed
* *stocks.php*
    * functions **decodeAllIndexes** e **decodeSingleIndex** agora retornam as queries prontas para serem inseridas. Apagados os print_r() de debug.
 
