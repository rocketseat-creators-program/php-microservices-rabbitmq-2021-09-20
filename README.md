<img src="https://storage.googleapis.com/golden-wind/experts-club/capa-github.svg" />

# Adicionando comunicação entre microsserviços PHP com RabbitMQ

Hoje em dia está sendo bastante comum as empresas migrarem seus projetos, que geralmente são grandes monolitos, para uma arquitetura de microsserviços. Sabemos que microsserviços não são uma bala de prata que irá resolver todos os problemas. Pelo contrário, irá trazer mais complexidade ao projeto, mas, ao mesmo tempo, trazendo uma robustez muito maior para o projeto como um todo.

Nesse vídeo vamos entender como esses microsserviços podem se comunicar. Primeiro vendo uma breve explicação de como seria essa comunicação através de endpoints HTTP, e depois implementando uma comunicação através do protocolo AMQP, que é o protocolo usado pelas ferramentas de mensageria. No nosso exemplo, vamos usar o RabbitMQ.

## Expert

| [<img src="https://avatars.githubusercontent.com/u/4119259?v=4" width="75px;"/>](https://github.com/lucascavalcante) |
| :-: |
|[Lucas Cavalcante](https://github.com/lucascavalcante)|

--

Olá, este projeto faz parte de um conteúdo criado para a plataforma [Experts Club](https://rocketseat.com.br/expertsclub) da **Rocketseat**.

Este repositório consiste em um boilerplate (ponto de partida) para poder acompanhar o conteúdo do vídeo.

Requisitos:
* Docker
* Docker-compose

## Fazendo o setup do projeto localmente

Clone o repositório:
```
git clone git@github.com:rocketseat-experts-club/php-microservices-rabbitmq-2021-09-20.git
```

Entre na pasta do projeto:
```
cd php-microservices-rabbitmq-2021-09-20
```

Execute o arquivo `run.sh`:
```
./run.sh
```

PS: este arquivo precisa ter permissão de execução para rodar corretamente. Para saber se ele está com a permissão correta, digite `ls -la`. O resultado será como abaixo.
```
-rwxr-xr-x   1 root  root   133 11 Set 15:08 run.sh
```
A letra `x` no final da primeira sequência de letras representa a permissão de execução. Caso tenha um `-` no lugar da letra, digite `chmod +x run.sh`.

Após esses passos, seu projeto deverá estar rodando perfeitamente! :)

Para acessar o serviço `ms-transaction`:
```
http://127.0.0.1:8004
```

Para acessar o serviço `ms-notification`:
```
http://127.0.0.1:8005
```

Para acessar o serviço `ms-queues`:
```
http://127.0.0.1:15672

User: admin
Pass: admin
```

## Derrubando todos os serviços

Se quiser derrubar todos os serviços, basta executar o arquivo `stop.sh`:
```
./stop.sh
```
PS: o mesmo vale para esse arquivo em relação à permissão para execução verificada no arquivo `run.sh`.

## Versão final do projeto

Para acessar a versão final do projeto (após as implementações feitas no vídeo), acesse a branch [final](https://github.com/rocketseat-experts-club/php-microservices-rabbitmq-2021-09-20/tree/final).

## Autor

* [Lucas Cavalcante](https://lucascavalcante.dev)
