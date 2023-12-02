<?php
// Inclui o cabeçalho da página
include __DIR__ . "/header.php";
?>



<main>
  <section class="main-slider text-center">
    <div id="slider-header" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators"><button type="button" data-bs-target="#slider-header" data-bs-slide-to="0" class=""></button><button type="button" data-bs-target="#slider-header" data-bs-slide-to="1" class="active" aria-current="true"></button><button type="button" data-bs-target="#slider-header" data-bs-slide-to="2"></button><button type="button" data-bs-target="#slider-header" data-bs-slide-to="3"></button><button type="button" data-bs-target="#slider-header" data-bs-slide-to="4"></button></div>
      <div class="carousel-inner">
        <div class="carousel-item"><img class="d-block w-100" src="https://portal.sc.senac.br/portal/novo/images/carousel-header/large/ensinomedio.png" alt="Ensino Médio"></div>
        <div class="carousel-item active"><img class="d-block w-100" src="https://portal.sc.senac.br/portal/novo/images/carousel-header/large/tecnico.png" alt="Cursos Técnicos Senac"></div>
        <div class="carousel-item"><img class="d-block w-100" src="https://portal.sc.senac.br/portal/novo/images/carousel-header/large/faculdade.png" alt="Faculdade Senac"></div>
        <div class="carousel-item"><img class="d-block w-100" src="https://portal.sc.senac.br/portal/novo/images/carousel-header/large/pos.png" alt="Pós Graduação Senac"></div>
        <div class="carousel-item"><img class="d-block w-100" src="https://portal.sc.senac.br/portal/novo/images/carousel-header/large/corporativo.png" alt="Senac Educação Corporativa"></div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#slider-header" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#slider-header" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col col-md">
        <h2>Nosso História</h2>
      </div>
    </div>
    <div class="row">
      <div class="col col-md">
        <p>
          O Senac de Santa Catarina, fundado em 1947, é uma instituição
          sem fins lucrativos que oferece uma ampla gama de cursos e
          atividades para o desenvolvimento profissional. Ao longo dos anos,
          expandiu-se para todas as regiões do estado, com 28 pontos de atendimento,
          incluindo unidades de ensino superior, centros especializados,
          educação profissional e unidades móveis. Sua estrutura organizacional abrange
          diferentes áreas, oferecendo cursos em dez eixos tecnológicos, atendendo às demandas
          do empresariado e da sociedade catarinense. A instituição disponibiliza uma variedade
          de cursos, desde formação inicial até pós-graduação e educação a distância, capacitando
          os alunos para atenderem às necessidades do mercado de trabalho e contribuindo para o
          crescimento do estado.<br>
        </p>
      </div>

    </div>
  </div>

  <section id="acesso-rapido" class="acesso-rapido py-5">
    <div class="container-xxl">
      <div>
        <h1 class="titulo pb-4">Acesso rápido</h1>
      </div>
      <div class="row justify-content-evenly">
        <div class="col-6 col-md-4 col-lg-2">
          <a href="/portal/site/institucional/sobre-o-senac/sc" target="_blank">
            <div class="box-acesso">
              <div class="icone-acesso">
                <i class="fa-solid fa-user fa-2xl text-orange"></i>
              </div>
              <div class="texto-acesso">Conheça o <br> Senac SC</div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
          <a href="/portal/App/Licitacoes.aspx?secao_id=46" target="_blank">
            <div class="box-acesso">
              <div class="icone-acesso">
                <i class="fa-solid fa-file-lines fa-2xl text-orange"></i>
              </div>
              <div class="texto-acesso">Licitações</div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
          <a href="/portal/site/institucional/noticias" target="_blank">
            <div class="box-acesso">
              <div class="icone-acesso">
                <i class="fa-solid  fa-file-lines fa-2xl text-orange"></i>
              </div>
              <div class="texto-acesso">Notícias</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</main>


<?php
// Inclui o rodapé da página
include __DIR__ . "/footer.php";
?>