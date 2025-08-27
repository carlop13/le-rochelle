<div class="contenedor-menu">
        <h2>MENÚ</h2>
        <nav>
            <ul>
                <li id="link-dashboard">
                    <a href="<?=base_url()?>Accesoad/principal/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-user"></i>
                        Panel Principal
                    </a>
                </li>

                <li id="link-add-propiedad">
                    <a href="<?=base_url()?>Accesoad/addprop/<?=$this->session->id_usu?>/<?=$this->session->token?>" >
                        <i class="fa-solid fa-building"></i>
                        Nueva Propiedad
                    </a>
                </li>

                <li id="link-listado-propiedades">
                    <a href="<?=base_url()?>Accesoad/lisprop/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-list"></i>
                        Listado de Propiedades
                    </a>
                </li>

                <hr>

                <li id="link-add-tipo-propiedad">
                    <a href="<?=base_url()?>Accesoad/addtip/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-folder-plus"></i>
                        Nuevo Tipo de Propiedad
                    </a>
                </li>
                <li id="link-listado-tipo-propiedades">
                    <a href="<?=base_url()?>Accesoad/listip/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-list"></i>
                        Listado de Tipo de Propiedades
                    </a>
                </li>

                <hr>
                <li id="link-add-pais">
                    <a href="<?=base_url()?>Accesoad/addpais/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-earth-americas"></i>
                        Nuevo Pais
                    </a>
                </li>

                <li id="link-listado-paises">
                    <a href="<?=base_url()?>Accesoad/lispais/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-list"></i>
                        Listado de Paises
                    </a>
                </li>

                <hr>
                <li id="link-add-ciudad">
                    <a href="<?=base_url()?>Accesoad/addciudad/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-location-dot"></i>
                        Nueva Ciudad
                    </a>
                </li>

                <li id="link-listado-ciudades">
                    <a href="<?=base_url()?>Accesoad/lisciudad/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-list"></i>
                        Listado de Ciudades
                    </a>
                </li>

                <hr>
                <li id="link-configuracion">
                    <a href="<?=base_url()?>Accesoad/configuracion/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-gear"></i>
                        Configuracion
                    </a>
                </li>

                <hr>
                <li id="link-ver-sitio">
                    <a href="<?=base_url()?>" target="_blank">
                        <i class="fa-solid fa-earth-africa"></i>
                        Ver Sitio Web
                    </a>
                </li>

                <li>
                    <a href="<?=base_url()?>Accesoad/cierrasesion/<?=$this->session->id_usu?>/<?=$this->session->token?>">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Cerrar sesión
                    </a>
                </li>
            </ul>
        </nav>
    </div>