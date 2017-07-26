# README/CHANGELOG

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
 
