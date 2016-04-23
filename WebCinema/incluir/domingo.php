<div class="session_area_day">DOMINGO</div>
<div class="session_area_date"><?php
echo $domingo = $carte->getFechaSesion("DOMINGO");
$domingoyepes = $carte->getFechaYepes();
?></div>
<div class="session_area_hour">
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $domingoyepes; ?>&horasesion=17:00:00&miercoles=0">
        <p id="sesionunadomingo" name="sesionunadomingo">
            <?php
            echo "17:00";
            $sesiondomingo--;
            ?>
        </p>
    </a>
</div>
<div class="session_area_hour"><?php
            if ($sesiondomingo > 0) {
                $carte->setMinuto("00");
                $carte->setHora("17");
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $domingoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiondosdomingo" name="sesiondosdomingo">
            <?php
            if ($sesiondomingo > 0) {
                echo $carte->getSesion();
                $sesiondomingo--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesiondomingo > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $domingoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiontresdomingo" name="sesiontresdomingo">
            <?php
            if ($sesiondomingo > 0) {
                echo $carte->getSesion();
                $sesiondomingo--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesiondomingo > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $domingoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncuatrodomingo" name="sesioncuatrodomingo">
            <?php
            if ($sesiondomingo > 0) {
                echo $carte->getSesion();
                $sesiondomingo--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesiondomingo > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $domingoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincodomingo" name="sesioncincodomingo">
            <?php
            if ($sesiondomingo > 0) {
                echo $carte->getSesion();
                $sesiondomingo--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesiondomingo > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $domingoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincodomingo" name="sesioncincodomingo">
            <?php
            if ($sesiondomingo > 0) {
                echo $carte->getSesion();
                $sesiondomingo--;
            }
            ?>
        </p>
    </a></div>
