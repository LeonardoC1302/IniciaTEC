<header class="header">
    <div class="header__container">
        <a href="/">
            <h2 class="header__logo">IniciaTEC</h2>
        </a>

        <nav class="header__nav">
            <a href="/" class="header__nav__link">Inicio</a>
            <a href="/guias" class="header__nav__link">Equipo Guía</a>
            <a href="/professors" class="header__nav__link">Profesores</a>
            <a href="/students" class="header__nav__link">Estudiantes</a>
            <a href="/plans" class="header__nav__link">Planes</a>

            <?php if (isAuth()) : ?>
                <a href="/account" class="header__nav__link">Mi cuenta</a>
            <?php else : ?>
                <a href="/login" class="header__nav__link">Iniciar Sesión</a>
            <?php endif; ?>
        </nav>
    </div>
</header>