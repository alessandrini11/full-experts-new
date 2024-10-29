<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{('dashboard/css/souscriptions.css')}}">
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

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Liste de demande d'expertise</h2>
                        <ion-icon name="add-circle"></ion-icon>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Email</td>
                                <td>Numero</td>
                                <td>Message</td>
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
                                <td>En attente</td>
                                <td>

                                    <a href="{{url('delete_expert', $view->id)}}">
                                        <ion-icon name="trash-sharp"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Details de souscriptions-->
                <div class="recentCustumers" v-if="showFormUpdate">
                    <div class="cardHeader">
                        <h2>Formulaire</h2>
                    </div>
                    <form method="post" action="{{url('/approuve')}}">
                        @csrf
                        <div class="contains">
                            <label for="nom" class="form-label">Nom</label> <br>
                            <input type="text" name="name" class="form-control" id="nom">
                        </div>
                        <div class="contains">
                            <label for="email" class="form-label">Email address</label> <br>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                name="email">
                        </div>
                        <div class="contains">
                            <label for="contact" class="form-label">Contact</label> <br>
                            <input type="text" name="phone" class="form-control" id="contact">
                        </div>
                        <div class="contains">
                            <label for="prenom" class="form-label">Message</label> <br>
                            <input type="text" name="message" class="form-control" id="prenom">
                        </div>
                        <div class="contains" hidden>
                            <label for="role" name="type" class="form-label" hidden>Role</label> <br>
                            <input type="text" value="demande d'expertise" name="type" class="form-control" hidden
                                id="role">
                        </div>
                        <div class="contains">
                            <select class="form-select" name="status" aria-label="Default select example"
                                v-model="departementId_update" required>
                                <option selected disabled>Statut</option>
                                <option value="Approuvee">Approuvee</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <button type="submit" class="btn btn-info">Update Statut</button>
                        </div>
                    </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>