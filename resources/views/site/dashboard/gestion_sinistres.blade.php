<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{('dashboard/css/users.css')}}">
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

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Liste des Utilisateurs Approuver ou Rejeter</h2>
                        <ion-icon name="person-add-sharp"></ion-icon>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Email</td>
                                <td>Numero</td>
                                <td>Message</td>
                                <td>Type</td>
                                <td>Statut</td>
                                <td>Actions</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($view as $view)
                            <tr>
                                <td>{{$view->name}}</td>
                                <td>{{$view->email}}</td>
                                <td>{{$view->phone}}</td>
                                <td>{{$view->message}}</td>
                                <td>{{$view->type}}</td>
                                <td>{{$view->status}}</td>
                                <td>

                                    <a href="{{url('delete_approuve', $view->id)}}">
                                        <ion-icon name="trash-sharp"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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