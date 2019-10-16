<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php?page=1">Sky Shop</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li <?=$page==1? 'class = "active"':''?>  ><a href="index.php?page=1">Catalog</a></li>
                        <li <?=$page==2? 'class = "active"':''?>  ><a href="index.php?page=2">Cart</a></li>
                        <li <?=$page==3? 'class = "active"':''?>  ><a href="index.php?page=3">Registration</a></li>
                        <li <?=$page==4? 'class = "active"':''?>  ><a href="index.php?page=4">Admin Forms</a></li>
                        <li <?=$page==5? 'class = "active"':''?>  ><a href="index.php?page=5">Reports</a></li>
                        <li>
                            <form class="navbar-form navbar-left">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Login...">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Password...">
                                </div>
                                <button type="submit" class="btn btn-warning">Auth</button>
                            </form>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</nav>
