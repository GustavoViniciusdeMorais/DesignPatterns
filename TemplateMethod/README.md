# Template Method

Este padrão é utilizado quando existe um fluxo comum de processamento
em várias classes do projeto.
Nesse cenário é criada uma classe abstrata com uma função padrão que
chama outras funções da classe abstrata para montar o fluxo de processamento.
A classe que extende a classe abstrata implementa as funções que fazem parte
do fluxo, mas nunca altera a função principal que é responsável pela chamada
de toda a execução do fluxo.

```bash
php templatemethod.php
```