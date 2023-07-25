# Decorator Pattern

Esse padrão deve ser utilizado quando se deseja criar novas funções
para uma classe sem extender ela.
Exemplo, em um projeto onde temos uma class responsável por lêr
e escrever em arquios, deseja-se passar a criptografar os dados
antes das operações no arquivo. Nesse caso não extendemos a classe
criando outra que salva e lê dados criptografados do arquivo. A
solução é criar uma classe que utiliza a classe de arquivos já existente,
porém antes de passar os dados para a classe escrever o dado no arquivo,
a nova classe criptografa o dado antes de passar ele.

![Image Title](./decorator.png)

Exemplo de uso do script: php decorator.php file.txt 'batman begins'

```bash
php decorator.php [arg1] [arg2]
```

```php
$fileSource = new FileDataSource($argv[1]);
$wrapper = new EncryptionDecorator($fileSource);
echo $wrapper->writeData($argv[2])."\n";
echo $wrapper->readData()."\n";
```