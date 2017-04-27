<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../../">Magenta</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="ajustes.php"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <form class="" action="search.php" method="post">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">

                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                </form>

                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="add.php"><i class="fa fa-plus fa-fw"></i> Añadir</a>
                </li>
                <li>
                    <a href="rent.php"><i class="fa fa-bookmark fa-fw"></i> Nueva Renta</a>
                </li>
                <li>
                    <a href="clientes.php"><i class="fa fa-users fa-fw"></i> Clientes</a>
                </li>
                <li>
                    <a href="muebles.php"><i class="fa fa-bed fa-fw"></i> Muebles</a>
                </li>
                <li>
                    <a href="bodegas.php"><i class="fa fa-building fa-fw"></i> Bodegas</a>
                </li>
                <li>
                    <a href="rentas.php"><i class="fa fa-bookmark fa-fw"></i> Rentas</a>
                </li>
                 <li>
                    <a href="pagos.php"><i class="fa fa-money fa-fw"></i> Pagos</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
