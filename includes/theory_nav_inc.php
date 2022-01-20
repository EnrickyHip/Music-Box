<!-- sidebar de navegação da página de teoria musical
PS: a classe btn-toggle e btn-toggle-nav NÃO fazem parte do bootstrap.
-->
<div class="flex-shrink-0 position-fixed d-none p-3 bg-light overflow-auto" style="width: 200px; height: 100%;" id="theory-nav">

    <div class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold">Teoria Musical</span>
    </div>
    
    <ul class="list-unstyled ps-0" id="theory-nav-list">

    <!--ATENÇÃO, OS ID'S DOS LINKS DEVE TER O MESMO NOME DO ARQUIVO PARA O ESTILO FUNCIONAR CORRETAMENTE-->

      <li class="mb-1">

        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-theory" aria-expanded="false">
          Início
        </button>

        <div class="collapse show" id="home-theory">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="?p=teoria_musical" id="teoria_musical" class="link-dark rounded">Aprenda Teoria Musical</a></li>
            <li><a href="#" class="link-dark rounded">Como Contribuir</a></li>
          </ul>
        </div>

      </li>

      <li class="mb-1">

        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#basic-theory-nav" aria-expanded="false">
          Teoria Básica
        </button>

        <div class="collapse" id="basic-theory-nav">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="?p=teoria_musical&art=o_que_e_musica" id="o_que_e_musica" class="link-dark rounded">O que é Música?</a></li>
            <li><a href="?p=teoria_musical&art=propriedades_da_musica" id="propriedades_da_musica" class="link-dark rounded">Propriedades da música</a></li>
            <li><a href="?p=teoria_musical&art=notas_musicais" id="notas_musicais" class="link-dark rounded">Notas musicais</a></li>
            <li><a href="#" class="link-dark rounded">Intervalos</a></li>
            <li><a href="#" class="link-dark rounded">O que é uma Escala?</a></li>
            <li><a href="#" class="link-dark rounded">Escala Maior</a></li>
            <li><a href="#" class="link-dark rounded">Principais Tipos de Acordes</a></li>
            <li><a href="#" class="link-dark rounded">Escala Menor</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-1">

        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#harmony-theory" aria-expanded="false">
          Harmonia
        </button>

        <div class="collapse" id="harmony-theory">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="#" class="link-dark rounded">Introdução</a></li>
            <li><a href="#" class="link-dark rounded">Intervalos</a></li>
            <li><a href="#" class="link-dark rounded">Tipos de Acordes</a></li>
            <li><a href="#" class="link-dark rounded">Campos Harmônicos</a></li>
            <li><a href="#" class="link-dark rounded">Harmonia Funcional</a></li>
            <li><a href="#" class="link-dark rounded">Acorde Tonal</a></li>
            <li><a href="#" class="link-dark rounded">Acorde Dominante</a></li>
            <li><a href="#" class="link-dark rounded">Acorde Sub-dominante</a></li>
            <li><a href="#" class="link-dark rounded">Principais Cadências e Resoluções</a></li>
            <li><a href="#" class="link-dark rounded">Cadência Perfeita</a></li>
            <li><a href="#" class="link-dark rounded">Menor Harmônica</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-1">

        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#sheet-theory" aria-expanded="false">
          Partituras
        </button>

        <div class="collapse" id="sheet-theory">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">O que são Partituras?</a></li>
            <li><a href="#" class="link-dark rounded">Claves</a></li>
            <li><a href="#" class="link-dark rounded">Compasso</a></li>
            <li><a href="#" class="link-dark rounded">Simbolos Avançados</a></li>
            <li><a href="#" class="link-dark rounded">Partitura de Bateria</a></li>
            <li><a href="#" class="link-dark rounded">Editores de Partitura</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-1">

        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#chord-theory" aria-expanded="false">
          Acordes
        </button>

        <div class="collapse" id="chord-theory">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Acorde Maior</a></li>
            <li><a href="#" class="link-dark rounded">Acorde Menor</a></li>
            <li><a href="#" class="link-dark rounded">Acorde Meio Diminuto</a></li>
            <li><a href="#" class="link-dark rounded">Acorde Diminuto</a></li>
            <li><a href="#" class="link-dark rounded">Notas de Extensão</a></li>
            <li><a href="#" class="link-dark rounded">Acorde Suspenso</a></li>
            <li><a href="#" class="link-dark rounded">Acorde Aumentado</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#scale-theory" aria-expanded="false">
          Escalas
        </button>

        <div class="collapse" id="scale-theory">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Escala Maior</a></li>
            <li><a href="#" class="link-dark rounded">Escala Menor</a></li>
            <li><a href="#" class="link-dark rounded">Escala Menor Harmônica</a></li>
            <li><a href="#" class="link-dark rounded">Escala Modos Gregos</a></li>
            <li><a href="#" class="link-dark rounded">Modo Jônio (Maior)</a></li>
            <li><a href="#" class="link-dark rounded">Modo Dórico</a></li>
            <li><a href="#" class="link-dark rounded">Modo Frígio</a></li>
            <li><a href="#" class="link-dark rounded">Modo Lídio</a></li>
            <li><a href="#" class="link-dark rounded">Modo Mixolídio</a></li>
            <li><a href="#" class="link-dark rounded">Modo Eólico (Menor)</a></li>
            <li><a href="#" class="link-dark rounded">Modos Lócrio</a></li>
            <li><a href="#" class="link-dark rounded">Escala Menor Melódica</a></li>
            <li><a href="#" class="link-dark rounded">Escala Diminuta</a></li>
          </ul>
        </div>
      </li>

    </ul >
  </div>

  <script src="../script/theory_nav.js"></script>