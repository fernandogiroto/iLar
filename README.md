<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.opencodez.com/wp-content/uploads/2020/01/Google-flutter-logo.png" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## iLar
O objetivo do ILar é facilitar a gestão dos espaços de residências para idosos contribuindo para uma melhoria dos serviços de gestão de trabalhadores e utentes. A app ILar permite o registo de informação de forma mais rápida e eficaz aumentando o tempo e disponibilidade dos trabalhadores para um contacto mais próximo com os idosos.

Os gestores do ILar poderão ter acesso aos registos obrigatórios por lei de forma automática simplificando a gestão de recursos humanos (assiduidade, horários, turnos e trocas de horário); controlo das visitas de familiares (marcações, dúvidas, partilha de informação); controlo de equipamentos (limpezas, registos de cozinha obrigatórios por lei) e acompanhamento próximo das questões relacionadas com os utentes (medicação, higiene, ocorrências, quedas…).

Por outro lado, a equipa técnica poderá beneficiar do controlo sobre a lista de espera de novos utentes, bem como gerir o plano de atividades mensal e de stock de medicamentos e produtos de higiene. Tendo ainda em conta a política de proteção de dados sobre os registos médicos e clínicos a app garante também que a equipa médica possa realizar os seus registos, colocar datas de consultas, gerir exames abrindo um processo individual para cada utente. Existe ainda a possibilidade de deixar recados à equipa a qualquer hora.


## Features

- Import a HTML file and watch it magically convert to Markdown
- Drag and drop images (requires your Dropbox account be linked)
- Import and save files from GitHub, Dropbox, Google Drive and One Drive
- Drag and drop markdown and HTML files into Dillinger
- Export documents as Markdown, HTML and PDF

O aplicativo fora criado utilizando o kit de desenvolvimento de interface de usuário Flutter e o Laravel no backend. Duas ferramentas poderosas para gestão e design de aplicações android e ios.

<strong>Flutter</strong> é um kit de desenvolvimento de interface de usuário (UI toolkit), de código aberto, criado pelo Google, que possibilita a criação de aplicativos compilados nativamente. Atualmente pode compilar para Android, iOS, Windows, Mac, Linux, Google Fuchsia e Web.

<strong>Laravel </strong>é um framework PHP livre e open-source criado por Taylor B. Otwell para o desenvolvimento de sistemas web que utilizam o padrão MVC (model, view, controller). Algumas características proeminentes do Laravel são sua sintaxe simples e concisa, um sistema modular com gerenciador de dependências dedicado, várias formas de acesso a banco de dados relacionais e vários utilitários indispensáveis no auxílio ao desenvolvimento e manutenção de sistemas.  

## Team

Nossa equipa conta com quatro profissionais em diferentes áreas que faz do ilar capaz de suprir qualquer demanda e atualizações futuras:

- [André Pinheiro] - Developer Backend 
- [Sara de Sousa] - awesome web-based text editor
- [Ana Tavares] - Gestora e Marketing
- [Fernando Giroto] - Designer Frontend


And of course Dillinger itself is open source with a [public repository][dill]
 on GitHub.

## Installation

Dillinger requires [Node.js](https://nodejs.org/) v10+ to run.
Install the dependencies and devDependencies and start the server.

```sh
cd dillinger
npm i
node app
```

For production environments...

```sh
npm install --production
NODE_ENV=production node app
```

## Librarys

Dillinger is currently extended with the following plugins.
Instructions on how to use them in your own application are linked below.

| Plugin | README |
| ------ | ------ |
| Dropbox | [plugins/dropbox/README.md][PlDb] |
| GitHub | [plugins/github/README.md][PlGh] |
| Google Drive | [plugins/googledrive/README.md][PlGd] |
| OneDrive | [plugins/onedrive/README.md][PlOd] |
| Medium | [plugins/medium/README.md][PlMe] |
| Google Analytics | [plugins/googleanalytics/README.md][PlGa] |

## Database Install

Dillinger is very easy to install and deploy in a Docker container.

By default, the Docker will expose port 8080, so change this within the
Dockerfile if necessary. When ready, simply use the Dockerfile to
build the image.

```sh
cd dillinger
docker build -t <youruser>/dillinger:${package.json.version} .
```

This will create the dillinger image and pull in the necessary dependencies.
Be sure to swap out `${package.json.version}` with the actual
version of Dillinger.

Once done, run the Docker image and map the port to whatever you wish on
your host. In this example, we simply map port 8000 of the host to
port 8080 of the Docker (or whatever port was exposed in the Dockerfile):

```sh
docker run -d -p 8000:8080 --restart=always --cap-add=SYS_ADMIN --name=dillinger <youruser>/dillinger:${package.json.version}
```

> Note: `--capt-add=SYS-ADMIN` is required for PDF rendering.

Verify the deployment by navigating to your server address in
your preferred browser.

```sh
127.0.0.1:8000
```

## License

