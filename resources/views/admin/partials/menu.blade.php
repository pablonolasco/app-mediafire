
<li class="active">
   <a href="{{ route('dashboard') }}"><i class="fas fa-chart-line"></i> Panel</a>
</li>



<li>
   <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-circle"></i> Mi perfil</a>
      <ul class="collapse list-unstyled" id="profileSubmenu">
         <li>
            <a href="">Ver mi perfil</a>
         </li>
         <li>
            <a href="#">Actualizar perfil</a>
         </li>
      </ul>
</li>
<li>
   <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-file-upload"></i> Mis archivos</a>
   <ul class="collapse list-unstyled" id="filesSubmenu">
      <li>
         <a href="">Agregar archivo</a>
      </li>
      <li>
         <a href="">Im谩genes</a>
      </li>
      <li>
         <a href="">Videos</a>
      </li>
      <li>
         <a href="">Audio</a>
      </li>
      <li>
         <a href="">Documentos</a>
      </li>
   </ul>
</li>

<li>
   <a href=""><i class="fas fa-fire"></i> Suscripciones</a>
</li>

<li>
   <a href=""><i class="fas fa-file-invoice"></i> Facturas</a>
</li>

<li>
   <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-unlock-alt"></i> Roles</a>
   <ul class="collapse list-unstyled" id="rolesSubmenu">
      <li>
         <a href="">Ver todos</a>
      </li>
      <li>
         <a href="">Agregar rol</a>
      </li>
   </ul>
</li>

<li>
   <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Permisos</a>
   <ul class="collapse list-unstyled" id="permissionSubmenu">
      <li>
         <a href="">Ver todos</a>
      </li>
      <li>
         <a href="">Agregar permiso</a>
      </li>
   </ul>
</li>

<li>
   <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Usuarios</a>
   <ul class="collapse list-unstyled" id="pageSubmenu">
      <li>
         <a href="">Ver todos</a>
      </li>
      <li>
         <a href="">Agregar usuario</a>
      </li>
   </ul>
</li>

<li>
   <a href="#PlansSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-unlock-alt"></i> Planes</a>
   <ul class="collapse list-unstyled" id="PlansSubmenu">
      <li>
         <a href="">Ver todos</a>
      </li>
      <li>
         <a href="">Agregar plan</a>
      </li>
   </ul>
</li>

<li>
   <a href="mailto:hola@cafeycodigo.com"><i class="far fa-question-circle"></i> Soporte</a>
</li>
    
</ul>

<ul class="list-unstyled CTAs">
   <li>
      <a href="{{ route('logout') }}" class="logout" 
      onclick="event.preventDefault(); 
      document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Cerrar sesi贸n</a>
   </li>