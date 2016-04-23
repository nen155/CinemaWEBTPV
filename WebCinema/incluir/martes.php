<div class="session_area_day">MARTES</div>
<div class="session_area_date"><?php
echo $martes = $carte->getFechaSesion("MARTES");
$martesyepes = $carte->getFechaYepes();
?></div>
<div class="session_area_hour">
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $martesyepes; ?>&horasesion=17:00:00&miercoles=0">
        <p id="sesionunalunes" name="sesionunamartes">
            <?php
            echo "17:00";
            $sesionmartes--;
            ?>
        </p>
    </a>
</div>
<div class="session_area_hour"><?php
            if ($sesionmartes > 0) {
                $carte->setMinuto("00");
                $carte->setHora("17");
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $martesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiondosmartes" name="sesiondosmartes">
            <?php
            if ($sesionmartes > 0) {
                echo $carte->getSesion();
                $sesionmartes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionmartes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $martesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiontresmartes" name="sesiontresmartes">
            <?php
            if ($sesionmartes > 0) {
                echo $carte->getSesion();
                $sesionmartes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionmartes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $martesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncuatromartes" name="sesioncuatromartes">
            <?php
            if ($sesionmartes > 0) {
                echo $carte->getSesion();
                $sesionmartes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionmartes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $martesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincomartes" name="sesioncincomartes">
            <?php
            if ($sesionmartes > 0) {
                echo $carte->getSesion();
                $sesionmartes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionmartes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $martesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincomartes" name="sesioncincomartes">
            <?php
            if ($sesionmartes > 0) {
                echo $carte->getSesion();
                $sesionmartes--;
            }
            ?>
        </p>
    </a></div>
