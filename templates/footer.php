</main>
    <footer class="py-3 my-4 text-muted">
        <div class="d-flex ">
            <ul class="nav flex-grow-1 justify-content-around align-items-center pb-3 mb-3 mx-4">
                <li class="nav-item"><a href="carte.php" class="nav-link px-2 text-muted">La Carte</a></li>
                <li class="nav-item"><a href="menu.php" class="nav-link px-2 text-muted">Les Menus</a></li>
                <?php if(!isset($_SESSION['user'])){ ?>
                    <li class="nav-item"><a href="formConnexion.php" class="nav-link px-2 text-muted">Se connecter</a></li>
                <?php } else {?>
                    <li class="nav-item"><a href="logout.php" class="nav-link px-2 text-muted">Se déconnecter</a></li>
                <?php } ?>
            </ul>
            
        <span class="p-2 text-center">
            <p>Horaires d’ouverture</p>
            <div class="m-0">
                <p><small>Lundi au Dimanche:<br>12h à 15h</small></p>
            </div>
        </span>
        </div>
        <p class="mt-2 text-center"><small>04.75.56.78.29 - restaurant-quai-antique@gmail.com - 21 Place de la Couronne, 73000 Chambéry</small></p>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="script.js"></script>
    
</body>

</html>
