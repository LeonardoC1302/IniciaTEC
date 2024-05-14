<header class="header">
    <div class="header__container">
        <a href="/">
            <h2 class="header__logo">IniciaTEC</h2>
        </a>

        <nav class="header__nav">
            <a href="/" class="header__nav__link">Inicio</a>
            <?php if(isAssistant() || isTeacher() || isAdmin()){ ?>
                <a href="/guias" class="header__nav__link">Equipo Guía</a>
            <?php } ?>

            <?php if(isAssistant() || isAdmin()){ ?>
                <a href="/professors" class="header__nav__link">Profesores</a>
            <?php } ?>

            <?php if(isAssistant() || isTeacher() || isAdmin()){ ?>
                <a href="/students" class="header__nav__link">Estudiantes</a>
            <?php } ?>

            <?php if(isAssistant() || isTeacher() || isCoordinator() || isAdmin()){ ?>
                <a href="/plans" class="header__nav__link">Planes</a>
            <?php } ?>

            <?php if (isAuth()) : ?>
                <a href="/account" class="header__nav__link">Mi cuenta</a>
            <?php else : ?>
                <a href="/login" class="header__nav__link">Iniciar Sesión</a>
            <?php endif; ?>
        </nav>
    </div>
</header>