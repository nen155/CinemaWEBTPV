<div class="session_area_day">SABADO</div>
<div class="session_area_date"><?php
echo $sabado = $carte->getFechaSesion("SÁBADO");
$sabadoyepes = $carte->getFechaYepes();
?></div>
<div class="session_area_hour">
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $sabadoyepes; ?>&horasesion=17:00:00&miercoles=0">
        <p id="sesionunasabado" name="sesionunasabado">
            <?php
            echo "17:00";
            $sesionsabado--;
            ?>
        </p>
    </a>
</div>
<div class="session_area_hour"><?php
            if ($sesionsabado > 0) {
                $carte->setMinuto("00");
                $carte->setHora("17");
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $sabadoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiondossabado" name="sesiondossabado">
            <?php
            if ($sesionsabado > 0) {
                echo $carte->getSesion();
                $sesionsabado--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionsabado > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $sabadoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiontressabado" name="sesiontresabado">
            <?php
            if ($sesionsabado > 0) {
                echo $carte->getSesion();
                $sesionsabado--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionsabado > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $sabadoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncuatrosabado" name="sesioncuatrosabado">
            <?php
            if ($sesionsabado > 0) {
                echo $carte->getSesion();
                $sesionsabado--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionsabado > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $sabadoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincosabado" name="sesioncincosabado">
            <?php
            if ($sesionsabado > 0) {
                echo $carte->getSesion();
                $sesionsabado--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionsabado > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $sabadoyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincosabado" name="sesioncincosabado">
            <?php
            if ($sesionsabado > 0) {
                echo $carte->getSesion();
                $sesionsabado--;
            }
            ?>
        </p>
    </a></div>
