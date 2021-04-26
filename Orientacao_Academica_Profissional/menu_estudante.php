

        <div class="super_container">

            <!-- Header -->

            <header class="header">

                <!-- Top Bar -->
                <div class="top_bar">
                    <div class="top_bar_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                        <ul class="top_bar_contact_list">
                                            <li>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <div><?php echo "  Bem -Vindo Estudante: " . $_SESSION['EstudanteNome']; ?></div>
                                            </li>

                                            <li>
                                                <i class=" fa fa-graduation-cap" aria-hidden="true"></i>
                                                <div> <?php
                                                    $result_fau = "SELECT a.id_medio, a.nome FROM curso_medio AS a WHERE a.id_medio= $_SESSION[EstudanteId_medio]";
                                                    $resultado_fau = mysqli_query($conecta, $result_fau);
                                                    while ($row_cat = mysqli_fetch_assoc($resultado_fau)) {
                                                        echo '<option value="' . $row_cat['id_medio'] . '">' . $row_cat['nome'] . '</option>';
                                                    }
                                                    ?> </div>
                                            </li>



                                            <li>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                <div>info.SOAPRO@gmail.com</div>
                                            </li>


                                        </ul>
                                        <div class="top_bar_login ml-auto">
                                            <div  class="login_button"><a href="logout.php">Sair</a></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>				
                </div>

                <!-- Header Content -->
                <div class="header_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                    <div class="logo_container">
                                        <a href="estudante.php">
                                            <div class="logo_text">SOA<span>PRO</span></div>
                                        </a>
                                    </div>
                                    <nav class="main_nav_contaner ml-auto">
                                        <ul class="main_nav">
                                            <li class="active"><a href="estudante.php">Home</a></li>
                                            <li><a href="cursos.php">Cursos</a></li>
                                            <li><a href="ver_IES.php">Universidades</a></li>
                                            <li><a href="saidas_profissionais.php">Saidas profissionais</a></li>


                                        </ul>



                                </div>


                                <div class="hamburger menu_mm">
                                    <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
		
    </header>


    <!-- Menu -->
    <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
        
        <nav class="menu_nav">
            <ul class="menu_mm">
                <li class="active"><a href="estudante.php">Home</a></li>
                <li><a href="curso_estudante.php">Ver Cursos</a></li>
                <li><a href="perfis.php">Saidas profissionais</a></li>
                <li><a href="ies.php">Universidades</a></li>
            </ul>
        </nav>
    </div>