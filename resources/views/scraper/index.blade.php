@extends('layouts.admin')
@section('title', 'Admin')
@section('content')

<div class="scraper">
    <section>
        <h1>Récupération des vins de la SAQ.</h1>
        <p>Cette action peut prendre plusieurs minutes, veuillez garder cette page ouverte.</p>
    </section>
    <article x-data="{actif: true, demarrer(){this.actif=false; scraper();}}">

        <!-- Le bouton démarrage, s'en va lorsqu'appuyé -->
        <template x-if="actif">
            <button class="btn" @click="demarrer()"">Démarrer</button>
        </template>

        <!-- Démarrage Scraper -->
        <template x-if="!actif">
            <div class="scraper_info">
                <p>
                    <span>Récupération en cours : </span>
                    <span id="page">0</span>
                    <span>/</span>
                    <span id="total">0</span>
                </p>
                <!-- Loading bar -->
                <div class="scraper_progres">
                    <div class="scraper_chargement"></div>
                </div>
                <!-- Log d'info -->
                <div class="scraper_log_conteneur">
                    <div class="scraper_log">
                    </div>
                </div>
            </div>
        </template>
    </article>
</div>

@endsection