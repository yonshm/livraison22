@extends('layouts.master')

@section('title', 'Client | Livraison')
@section('content')
    <style>
        .simplebar-scrollable-x {
            height: 300px;
            overflow-y: auto;
        }

        .simplebar-content-wrapper {
            overflow-y: auto;
            height: 100%;
        }

        #dash-card-items,
        #dash-card-items-count {
            height: fit-content !important;
        }
    </style>
    <div class="home">
        @include('layouts.sideBar')
        <div class="main pb-5">

            @include('layouts.nav')
            <div class="card right-side mx-lg-3 mt-5 p-3">
                <h4 class="m-0">Tableau de bord / Globale</h4>
            </div>
            <div class="card right-side mx-lg-3 mt-3">
                <div class="card-body p-3 pb-0">
                    <div id="dash-card-items-count" class="card-body p-2 pb-0 simplebar-scrollable-x" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: -24px -24px 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                        aria-label="scrollable content" style="height: auto; overflow: scroll hidden;">
                                        <div class="simplebar-content">
                                            <div class="row flex-nowrap">

                                                <div class="col">
                                                    <div class="card primary-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-primary flex-shrink-0 mb-3 mx-auto">
                                                                <i class='bx bxs-box  fs-7'></i>
                                                            </div>
                                                            <h6 class="fw-normal fs-3 mb-1">Total Colis</h6>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                                {{ $coli_info->totalColis }}</h4>
                                                            <span class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card warning-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-warning flex-shrink-0 mb-3 mx-auto">
                                                                <i class='bx bx-package text-light fs-7'></i>
                                                            </div>
                                                            <h6 class="fw-normal fs-3 mb-1">Colis en cours</h6>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                                2</h4>
                                                            <span class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card success-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-success flex-shrink-0 mb-3 mx-auto">
                                                                <i class='bx bxs-package text-light fs-7'></i>
                                                            </div>
                                                            <h6 class="fw-normal fs-3 mb-1">Colis livrés</h6>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                                {{ $coli_info->totalColisLivres }}</h4>
                                                            <span class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card danger-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-danger flex-shrink-0 mb-3 mx-auto">
                                                                <i class='bx bxs-error-circle text-light fs-7'></i>
                                                            </div>
                                                            <h6 class="fw-normal fs-3 mb-1">Colis Refuse</h6>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                                {{ $coli_info->totalColisRefus }}</h4>
                                                            <span class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 397px; height: 278px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="width: 180px; display: block; transform: translate3d(43px, 0px, 0px);"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card right-side mx-lg-3 mt-3 p-3">
                <h4 class="m-0">Tableau de bord / Globale</h4>
            </div>
            <div class="card right-side mx-lg-3 mt-3">
                <div class="card-body p-3 pb-0">
                    <div id="dash-card-items" class="card-body p-2 pb-0 simplebar-scrollable-x" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: -24px -24px 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                        aria-label="scrollable content" style="height: auto; overflow: scroll hidden;">
                                        <div class="simplebar-content">
                                            <div class="row flex-nowrap">

                                                <div class="col">
                                                    <div class="card primary-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-primary flex-shrink-0 mb-3 mx-auto">
                                                                <i class='bx bx-dollar text-light fs-7'></i>
                                                            </div>
                                                            <h6 class="fw-normal fs-3 mb-1">Chiffre d'affaires</h6>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                                {{ $coli_info->totalPrix }} MAD
                                                            </h4>
                                                            <span class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card warning-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-warning flex-shrink-0 mb-3 mx-auto">
                                                                <i class='bx bx-package text-light fs-7'></i>
                                                            </div>
                                                            <h6 class="fw-normal fs-3 mb-1">Total Colis</h6>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                                {{ $coli_info->totalColisPrix }} MAD
                                                            </h4>
                                                            <span class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card success-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-success flex-shrink-0 mb-3 mx-auto">
                                                                <i class='bx bxs-package text-light fs-7'></i>
                                                            </div>
                                                            <h6 class="fw-normal fs-3 mb-1">Colis livrés</h6>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-success">
                                                                {{ $coli_info->totalColisLivresPrix }} MAD
                                                            </h4>
                                                            <span class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="card danger-gradient">
                                                        <div class="card-body text-center px-9 pb-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center round-48 rounded text-bg-danger flex-shrink-0 mb-3 mx-auto">
                                                                <i class='bx bxs-error-circle text-light fs-7'></i>
                                                            </div>
                                                            <h6 class="fw-normal fs-3 mb-1">Colis Refuse</h6>
                                                            <h4
                                                                class="mb-3 d-flex align-items-center justify-content-center gap-1 text-danger">
                                                                - {{ $coli_info->totalColisRefusPrix }} MAD</h4>
                                                            <span class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 397px; height: 278px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="width: 180px; display: block; transform: translate3d(43px, 0px, 0px);"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="d-flex ">
                                                            <div class="col-8">
                                                                <div class="card right-side mx-lg-3 mt-3">
                                                                    <h4 class="p-3 m-0">Top 10 Villes</h4>
                                                                </div>
                                                                <div class="card right-side mx-lg-3 mt-3">
                                                                    <div class="card-body p-3">
                                                                        <div id="chart-bar-basic" style="min-height: 365px;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">

                                                                <div class="card right-side mx-lg-3 mt-3">
                                                                    <h4 class="p-3 m-0">Top 10 Villes</h4>
                                                                </div>
                                                                <div class="card right-side mx-lg-3 mt-3">
                                                                    <div class="card-body p-3 my-6">
                                                                        <div id="chart-pie-simple" class="py-7"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->

            <div class="d-flex flex-wrap">
                <div class="col-lg-7 col-12">
                    <div class="card right-side mx-lg-3 mt-3">
                        <h4 class="p-3 m-0">Top 10 Villes</h4>
                    </div>
                    <div class="card right-side mx-lg-3 mt-3">
                        <div class="card-body p-3">
                            <div id="chart-bar-basic" style="min-height: 365px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="card right-side mx-lg-3 mt-3">
                        <h4 class="p-3 m-0">État de Paiement</h4>
                    </div>
                    <div class="card right-side mx-lg-3 mt-3">
                        <div class="card-body p-3 mx-auto d-flex align-items-center" style="min-height: 395px;">
                            <div id="chart-pie-simple"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <script src="https://unpkg.com/simplebar@5.3.4/dist/simplebar.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            const allScroll = document.querySelectorAll('.simplebar-scrollable-x');
            allScroll.forEach(element => {
                new SimpleBar(element)
            });

        </script>
        <script>
            const dataVilles = [];
            const dataCount = [];

            fetch('{{ route("clients.getTopVilles") }}')
                .then(res => res.json())
                .then(data => {
                    data.forEach(v => {
                        dataVilles.push(v.nom_ville);
                        dataCount.push(v.totalColi);
                    });

                    createChart(dataVilles, dataCount);


                })
                .catch(err => console.error("Error fetching data:", err));
                
            function createChart(p_dataCount, p_dataVilles) {
                // Basic Bar Chart -------> BAR CHART
                const options_basic = {
                    series: [
                        {
                            data: dataCount,
                        },
                    ],
                    chart: {
                        fontFamily: "inherit",
                        type: "bar",
                        height: 350,
                        toolbar: {
                            show: false,
                        },
                    },
                    grid: {
                        borderColor: "transparent",
                    },
                    colors: ["var(--bs-primary)"],
                    plotOptions: {
                        bar: {

                            horizontal: true,
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    xaxis: {
                        categories: dataVilles,
                        labels: {
                            style: {
                                colors: "#a1aab2",
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: "#a1aab2",
                            },
                        },
                    },
                    tooltip: {
                        enabled: true,
                        theme: "dark",
                        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                            let city = w.globals.labels[dataPointIndex];
                            let value = series[seriesIndex][dataPointIndex];

                            return `
                                                                                                                        <div style="
                                                                                                                            background: linear-gradient(135deg, #1e1e1e, #2b2b2b);
                                                                                                                            color: #ffffff;
                                                                                                                            padding: 12px 16px;
                                                                                                                            border-radius: 10px;
                                                                                                                            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
                                                                                                                            font-size: 14px;
                                                                                                                            font-family: 'Arial', sans-serif;
                                                                                                                            text-align: left;
                                                                                                                            min-width: 160px;
                                                                                                                            transition: all 0.3s ease-in-out;
                                                                                                                            position: relative;
                                                                                                                            border: 1px solid rgba(255, 255, 255, 0.2);
                                                                                                                        ">
                                                                                                                            <div style="
                                                                                                                                content: '';
                                                                                                                                position: absolute;
                                                                                                                                bottom: -8px;
                                                                                                                                left: 50%;
                                                                                                                                transform: translateX(-50%);
                                                                                                                                width: 0;
                                                                                                                                height: 0;
                                                                                                                                border-left: 8px solid transparent;
                                                                                                                                border-right: 8px solid transparent;
                                                                                                                                border-top: 8px solid rgba(255, 255, 255, 0.2);
                                                                                                                            "></div>

                                                                                                                            <div style="
                                                                                                                                border-bottom: 1px solid rgba(255,255,255,0.2);
                                                                                                                                padding-bottom: 6px;
                                                                                                                                margin-bottom: 6px;
                                                                                                                                font-weight: bold;
                                                                                                                                color: #f1c40f;
                                                                                                                            ">
                                                                                                                                📍 Ville : ${city}
                                                                                                                            </div>

                                                                                                                            <div style="color: #1abc9c; font-weight: bold;">
                                                                                                                                🚚 Nombre de livraisons : ${value}
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    `;
                        },
                    },


                };

                const chart_bar_basic = new ApexCharts(
                    document.querySelector("#chart-bar-basic"),
                    options_basic
                );
                chart_bar_basic.render();

                // Simple Pie Chart -------> PIE CHART
                const options_simple = {
                    series: ['{{ $coli_info->etatColis[0]->total }}', '{{ $coli_info->etatColis[1]->total }}'],
                    chart: {
                        fontFamily: "inherit",
                        width: 380,
                        type: "pie",
                    },
                    colors: [
                        "var(--bs-primary)",
                        "var(--bs-secondary)"
                    ],
                    labels: ['{{ $coli_info->etatColis[0]->etat }}', '{{ $coli_info->etatColis[1]->etat }}'],
                    responsive: [
                        {
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200,
                                },
                                legend: {
                                    position: "bottom",
                                },
                            },
                        },
                    ],
                    legend: {
                        labels: {
                            colors: "#a1aab2",
                        },
                    },
                    tooltip: {
                        enabled: true,
                        theme: "dark",
                        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                            let statut = w.globals.labels[seriesIndex];
                            let valeur = series[seriesIndex];

                            return `
                                                                    <div style="
                                                                        background: linear-gradient(135deg, #1e1e1e, #2b2b2b);
                                                                        color: #ffffff;
                                                                        padding: 12px 16px;
                                                                        border-radius: 10px;
                                                                        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
                                                                        font-size: 14px;
                                                                        font-family: 'Arial', sans-serif;
                                                                        text-align: left;
                                                                        min-width: 160px;
                                                                        transition: all 0.3s ease-in-out;
                                                                        position: relative;
                                                                        border: 1px solid rgba(255, 255, 255, 0.2);
                                                                    ">
                                                                        <div style="
                                                                            content: '';
                                                                            position: absolute;
                                                                            bottom: -8px;
                                                                            left: 50%;
                                                                            transform: translateX(-50%);
                                                                            width: 0;
                                                                            height: 0;
                                                                            border-left: 8px solid transparent;
                                                                            border-right: 8px solid transparent;
                                                                            border-top: 8px solid rgba(255, 255, 255, 0.2);
                                                                        "></div>

                                                                        <div style="
                                                                            border-bottom: 1px solid rgba(255,255,255,0.2);
                                                                            padding-bottom: 6px;
                                                                            margin-bottom: 6px;
                                                                            font-weight: bold;
                                                                            color: #f1c40f;
                                                                        ">
                                                                            💰 Statut : ${statut}
                                                                        </div>

                                                                        <div style="color: #1abc9c; font-weight: bold;">
                                                                            📊 Nombre de colis : ${valeur}
                                                                        </div>
                                                                    </div>
                                                                `;
                        },
                    },
                };


                const chart_pie_simple = new ApexCharts(
                    document.querySelector("#chart-pie-simple"),
                    options_simple
                );
                chart_pie_simple.render();

            }
        </script>
@endsection