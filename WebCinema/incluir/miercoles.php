<div class="session_area_day">MI&Eacute;RCOL.</div>
<div class="session_area_date"><?php
echo $miercoles = $carte->getFechaSesion("MIÉRCOLES");
$miercolesyepes = $carte->getFechaYepes();
?></div>
<div class="session_area_hour">
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $miercolesyepes; ?>&horasesion=17:00:00&miercoles=1">
        <p id="sesionunalunes" name="sesionunamiercoles">
            <?php
            echo "17:00";
            $sesionmiercoles--;
            ?>
        </p>
    </a>
</div>
<div class="session_area_hour"><?php
            if ($sesionmiercoles > 0) {
                $carte->setMinuto("00");
                $carte->setHora("17");
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $miercolesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=1">
        <p id="sesiondosmiercoles" name="sesiondosmiercoles">
            <?php
            if ($sesionmiercoles > 0) {
                echo $carte->getSesion();
                $sesionmiercoles--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionmiercoles > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $miercolesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=1">
        <p id="sesiontresmiercoles" name="sesiontresmiercoles">
            <?php
            if ($sesionmiercoles > 0) {
                echo $carte->getSesion();
                $sesionmiercoles--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionmiercoles > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $miercolesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=1">
        <p id="sesioncuatromiercoles" name="sesioncuatromiercoles">
            <?php
            if ($sesionmiercoles > 0) {
                echo $carte->getSesion();
                $sesionmiercoles--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionmiercoles > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $miercolesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincomiercoles" name="sesioncincomiercoles">
            <?php
            if ($sesionmiercoles > 0) {
                echo $carte->getSesion();
                $sesionmiercoles--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionmiercoles > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $miercolesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=1">
        <p id="sesioncincomiercoles" name="sesioncincomiercoles">
            <?php
            if ($sesionmiercoles > 0) {
                echo $carte->getSesion();
                $sesionmiercoles--;
            }
            ?>
        </p>
    </a></div>
