<div class="session_area_day">LUNES</div>
<div class="session_area_date"><?php
echo $lunes = $carte->getFechaSesion("LUNES");
$lunesyepes = $carte->getFechaYepes();
?></div>
<div class="session_area_hour">
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $lunesyepes; ?>&horasesion=17:00:00&miercoles=0">
        <p id="sesionunalunes" name="sesionunalunes">
            <?php
            echo "17:00";
            $sesionlunes--;
            ?>
        </p>
    </a>
</div>
<div class="session_area_hour"><?php
            if ($sesionlunes > 0) {
                $carte->setMinuto("00");
                $carte->setHora("17");
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $lunesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiondoslunes" name="sesiondoslunes">
            <?php
            if ($sesionlunes > 0) {
                echo $carte->getSesion();
                $sesionlunes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionlunes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $lunesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiontreslunes" name="sesiontreslunes">
            <?php
            if ($sesionlunes > 0) {
                echo $carte->getSesion();
                $sesionlunes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionlunes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $lunesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncuatrolunes" name="sesioncuatrolunes">
            <?php
            if ($sesionlunes > 0) {
                echo $carte->getSesion();
                $sesionlunes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionlunes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $lunesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincolunes" name="sesioncincolunes">
            <?php
            if ($sesionlunes > 0) {
                echo $carte->getSesion();
                $sesionlunes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionlunes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $lunesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincolunes" name="sesioncincolunes">
            <?php
            if ($sesionlunes > 0) {
                echo $carte->getSesion();
                $sesionlunes--;
            }
            ?>
        </p>
    </a></div>
