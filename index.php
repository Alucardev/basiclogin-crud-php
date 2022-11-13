<?php session_start();?>

<?php include('includes/header.php');?>
    <body class="sb-nav-fixed">
    <?php include('includes/navbar.php');?>

        <div id="layoutSidenav_content" style="background-color: #eeeeee;">
                <main>
             
                    <div class="container text-center" style="padding: 1vh;">
                            <h2 class="mt-4">E-BookShop</h2>
                            <p style="padding-bottom: 2vh;" >La tienda de libros lider en el pais.</p>
                            <ol>     
                                <form action="index.php" method="post">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded p-3" name="search" placeholder="Que libro estas buscando?" aria-label="Search" aria-describedby="search-addon" />
                                        <input class="btn btn-outline-primary" type="submit" value="Buscar"/>	
                                        
                                    </div>
                                </form>
                        </ol>
                    </div>


                     <div class="container">

                        <div class="row">
                                        <?php
                                        include("db.php");
                                        $query = "SELECT * FROM book";
                                        if(isset($_POST['search'])){
                                            $search = $_POST['search'];
                                            $query = "SELECT * FROM book WHERE autor LIKE '%$search%' OR titulo LIKE '%$search%'";
                                        }
                                        $result_books = mysqli_query($conexion, $query);
                                        while($row = mysqli_fetch_assoc($result_books)) { ?>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="card border-0 shadow">
                                                    <div class="card-img-actions" style="height: 14rem;">
                                                    <img src="img/<?php echo $row['img'] ?>.jpg" class="card-img img-fluid"  width="96" height="350" alt="...">
                                                    </div>
                                                    <div class="card-body text-center" style="height: 5.7rem;">
                                                            <p class="card-title mb-0"><?php echo $row['titulo']?></p>
                                                            <p class="card-text text-black-50"><?php echo $row['autor']?></p>  
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <p class="card-text text-black-50">$<?php echo $row['precio']?></p> 
                                                        <button type="button" class="btn btn-success">Comprar</button>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>  
                             </div>
                    </div>                   

            </main>
            <?php  include("includes/footer.php")?>
        </div>
    </div>
 </body>
</html>

