@extends('layouts.app')

@section('content')

<!-- Botón para abrir la sidebar en pantallas pequeñas -->
<button class="menu-toggle btn btn-primary d-md-none" onclick="toggleMainSidebar()">☰</button> <!-- Botón de menú solo en pantallas pequeñas -->

<!-- Sidebar principal para pantallas grandes -->
<div class="main-sidebar">
    <!-- Botón de cerrar dentro de la sidebar solo para pantallas pequeñas -->
    <button class="close-btn" onclick="toggleMainSidebar()">✖</button>

    <div class="container mt-4">
        <h2>¿Tienes dudas o quejas?</h2>
        <p>Si tu duda no fue aclarada o no encuentras algún caso similar, puedes enviar un reporte en el siguiente formulario:</p>
        <a href="https://forms.office.com/pages/responsepage.aspx?id=ZDMD0sPeHEqXcj9BynxLdb1zGuwnHuZMt0egbcxZxD1UOFFMWkhOSUJKMjQxVlBVQ081Q1FNNUg0MC4u&web=1&wdLOR=c4AAEA831-3FF5-428F-84B9-73A9AAB648D2" target="_blank" class="btn btn-primary">Enviar reporte</a>
    </div>
    <div class="social-media-div mt-4">
        <ul class="social-icons">
            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-twitch"></span></a></li>
        </ul>
    </div>
</div>

<div class="container mt-4 main-content">
    <form action="{{ route('tips.search') }}" method="GET" class="d-flex mb-4">
        <input type="text" name="query" class="form-control me-2" placeholder="Buscar tips...">
        <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Buscar</button>
        <a href="{{ route('tips.index') }}" class="btn btn-secondary">Limpiar Búsqueda</a>
    </form>

    <h2 class="mb-4">Lista de tips</h2>
    <div class="cards-container">
        @foreach($tips as $tip)
        <a href="{{ route('tips.show', $tip->id) }}" class="card-hover-container" style="text-decoration: none; color: inherit;">
            <div class="card-hover-content">
                <h3 class="titulo-tip">{{ $tip->title }}</h3>
                <p class="texto-tip">{{ Str::limit($tip->description, 100) }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>

<div class="latest-tips-container" id="latestTipsContainer">
    <div class="latest-tips" id="latestTipsContent">
        <h2>Últimos Tips Vistos</h2>
        <ul class="list-group">
            @foreach($latestViewedTips as $viewedTip)
            <li class="list-group-item">
                <a href="{{ route('tips.show', $viewedTip->id) }}">{{ $viewedTip->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<button class="toggle-button" onclick="toggleLatestTips()">Últimos Tips</button>


<div class="mobile-sidebar">
    <div class="container mt-4">
        <h2>¿Tienes dudas o quejas?</h2>
        <p>Si tu duda no fue aclarada o no encuentras algún caso similar, puedes enviar un reporte en el siguiente formulario:</p>
        <a href="https://forms.office.com/pages/responsepage.aspx?id=ZDMD0sPeHEqXcj9BynxLdb1zGuwnHuZMt0egbcxZxD1UOFFMWkhOSUJKMjQxVlBVQ081Q1FNNUg0MC4u&web=1&wdLOR=c4AAEA831-3FF5-428F-84B9-73A9AAB648D2" target="_blank" class="btn btn-primary">Enviar reporte</a>
    </div>
    <div class="social-media-div mt-4">
        <ul class="social-icons">
            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-twitch"></span></a></li>
        </ul>
    </div>
</div>
<script>
    function toggleMainSidebar() {
    document.querySelector('.main-sidebar').classList.toggle('main-sidebar-open');
}
function toggleLatestTips() {
    const container = document.getElementById('latestTipsContainer');
    container.classList.toggle('open');
}



    function clearSearch() {
        document.querySelector('input[name="query"]').value = '';
        window.location.href = "{{ route('tips.index') }}";
    }

    document.getElementById('latest-tips').style.display = "none";

    function toggleTipPanel() {
        var latestTips = document.getElementById('latest-tips');
        latestTips.style.display = latestTips.style.display === "none" ? "block" : "none";
    }
</script>

@endsection
