# Adapter Pattern

Esse padrão de projeto é utilizado para fazer um wrapper de uma classe,
por exemplo, caso eu tenha uma classe para escrever e ler conteúdos em
arquivos e queira criar uma outra classe para fazer isso de forma criptografada
eu não preciso extender a classe anterior, mas sim utilizar esse padrão,
criando uma classe que vai utilizar a classe que trabalha com arquivos,
implementando uma classe padrão.

Exemplo de uso do script: php adapter.php file.txt 'batman begins'

```bash
php adapter.php [arg1] [arg2]
```

```php
$fileSource = new FileDataSource($argv[1]);
$wrapper = new EncryptionDecorator($fileSource);
echo $wrapper->writeData($argv[2])."\n";
echo $wrapper->readData()."\n";
```