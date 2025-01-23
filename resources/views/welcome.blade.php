@extends('layouts.master')

@section('title', 'Client | Livraison')

@section('content')
<div class="home">
    <div id="main-wrapper" class="">
        <!-- Sidebar Start -->
        <aside class="side-mini-panel with-vertical">
            <!-- ---------------------------------- -->
            <!-- Start Vertical Layout Sidebar -->
            <!-- ---------------------------------- -->
            <div class="iconbar">
                <div>
                    <div class="mini-nav">
                        <div class="brand-logo d-flex align-items-center justify-content-center">
                            <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                <iconify-icon icon="solar:hamburger-menu-line-duotone" class="fs-7"></iconify-icon>
                            </a>
                        </div>
                        <ul class="mini-nav-ul simplebar-scrollable-y" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                            aria-label="scrollable content"
                                            style="height: 100%; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 0px;">

                                                <!-- --------------------------------------------------------------------------------------------------------- -->
                                                <!-- Dashboards -->
                                                <!-- --------------------------------------------------------------------------------------------------------- -->
                                                <li class="mini-nav-item selected" id="mini-1">
                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                        data-bs-custom-class="custom-tooltip" data-bs-placement="right"
                                                        data-bs-title="Dashboards">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            style="color: #FFF;  z-index: 1;" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-box">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                                            <path d="M12 12l8 -4.5" />
                                                            <path d="M12 12l0 9" />
                                                            <path d="M12 12l-8 -4.5" />
                                                        </svg>

                                                    </a>
                                                </li>
                                                <li class="mini-nav-item" id="mini-3">
                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                        data-bs-custom-class="custom-tooltip" data-bs-placement="right"
                                                        data-bs-title="Pages">
                                                        <iconify-icon icon="solar:notes-line-duotone"
                                                            class="fs-7"></iconify-icon>
                                                    </a>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 80px; height: 537px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                    style="height: 252px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                            </div>
                        </ul>

                    </div>
                    <div class="sidebarmenu">
                        <div class="brand-logo d-flex align-items-center nav-logo">
                            <a href="/" class="text-nowrap logo-img">
                                <img src="./assets/images/logos/logo.svg" alt="Logo">
                            </a>

                        </div>
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <nav class="sidebar-nav d-block simplebar-scrollable-y" id="menu-right-mini-1"
                            data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: 0px -20px -24px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                            aria-label="scrollable content"
                                            style="height: 100%; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 0px 20px 24px;">
                                                <ul class="sidebar-menu" id="sidebarnav">
                                                    <!-- ---------------------------------- -->
                                                    <!-- Home -->
                                                    <!-- ---------------------------------- -->
                                                    <li class="nav-small-cap">
                                                        <span class="hide-menu">Colis</span>
                                                    </li>
                                                    <!-- ---------------------------------- -->
                                                    <!-- Colis -->
                                                    <!-- ---------------------------------- -->
                                                    <li class="sidebar-item">
                                                        <a class="sidebar-link active" href="{{route('colis.create')}}"
                                                            id="get-url" aria-expanded="false">
                                                            <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                                                            <span class="hide-menu">Nouveau Coli</span>
                                                        </a>
                                                    </li>

                                                    <li class="sidebar-item">
                                                        <a class="sidebar-link" href="{{route('colis.listeColis')}}"
                                                            aria-expanded="false">
                                                            <iconify-icon
                                                                icon="solar:chart-line-duotone"></iconify-icon>
                                                            <span class="hide-menu">Liste Coli</span>
                                                        </a>
                                                    </li>

                                                    <li class="sidebar-item">
                                                        <a class="sidebar-link"
                                                            href="{{route('colis.colisAttenderRamassage')}}"
                                                            aria-expanded="false">
                                                            <iconify-icon
                                                                icon="solar:screencast-2-line-duotone"></iconify-icon>
                                                            <span class="hide-menu">Colis pour ramasage</span>
                                                        </a>
                                                    </li>

                                                    <li class="sidebar-item">
                                                        <a class="sidebar-link"
                                                            href="{{route('colis.colisNonExpedies')}}"
                                                            aria-expanded="false">
                                                            <iconify-icon
                                                                icon="solar:screencast-2-line-duotone"></iconify-icon>
                                                            <span class="hide-menu">Colis non expedies</span>
                                                        </a>
                                                    </li>



                                                    <li>
                                                        <span class="sidebar-divider"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 240px; height: 864px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                    style="height: 155px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                            </div>
                        </nav>


                    </div>
                </div>
            </div>
        </aside>
        <!--  Sidebar End -->

    </div>
</div>

@endsection