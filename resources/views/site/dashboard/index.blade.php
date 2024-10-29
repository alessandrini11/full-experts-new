<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{('dashboard/css/style.css')}}">
    <title>Responsive admin dashboard</title>
</head>

<body>
    <!--========================= Navigation ========================-->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-electron"></ion-icon>
                        </span>
                        <span class="title">USSR</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/dashboards')}}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/gestion_souscription')}}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">View demande d'expertise</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/gestion_reclamation')}}">
                        <span class="icon">
                            <ion-icon name="hand-left-outline"></ion-icon>
                        </span>
                        <span class="title">View integrer notre equipe</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/views_service')}}">
                        <span class="icon">
                            <ion-icon name="hand-right-outline"></ion-icon>
                        </span>
                        <span class="title">View service</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/contactez_nous')}}">
                        <span class="icon">
                            <ion-icon name="call-outline"></ion-icon>

                        </span>
                        <span class="title">View contactez nous</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/gestion_sinistre')}}">
                        <span class="icon">
                            <ion-icon name="information-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Gestion des sinistres</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--====================================== main ====================================-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-sharp"></ion-icon>
                </div>
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search Here">
                        <ion-icon name="search-circle-sharp"></ion-icon>
                    </label>
                </div>
                <div class="user">
                    <ion-icon name="person-circle-sharp"></ion-icon>
                </div>
            </div>


            <!-- ========================== CARDS =========================== -->
            <div class="cardBoxx">
                <div class="cards">
                    <div>
                        <div class="numbers">10</div>
                        <div class="numbers">nombre total de souscriptions</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="bookmark-outline"></ion-icon>
                    </div>
                </div>
                <div class="cards">
                    <div>
                        <div class="numbers">30</div>
                        <div class="numbers">réclamations en attente</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="time-outline"></ion-icon>
                    </div>
                </div>
                <div class="cards">
                    <div>
                        <div class="numbers">5</div>
                        <div class="numbers">Sinistres déclarés</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="cellular-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ===========================Add ChartJS =================================-->
            <div class="chartsBx">
                <div class="chart1">
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="chart2">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>

        </div>
    </div>
    </div>


    <!--===========================script===================================-->
    <script src="{{('dashboard/js/main.js')}}"></script>

    <!--================  chart js ===============-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{('dashboard/js/chartsJS.js')}}"></script>

    <!-- ==========================ionicons================================-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>