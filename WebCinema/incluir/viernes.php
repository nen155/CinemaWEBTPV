<div class="session_area_day">VIERNES</div>
<div class="session_area_date"><?php
echo $viernes = $carte->getFechaSesion("VIERNES");
$viernesyepes = $carte->getFechaYepes();
?></div>
<div class="session_area_hour">
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $viernesyepes; ?>&horasesion=17:00:00&miercoles=0">
        <p id="sesionunaviernes" name="sesionunaviernes">
            <?php
            echo "17:00";
            $sesionviernes--;
            ?>
        </p>
    </a>
</div>
<div class="session_area_hour"><?php
            if ($sesionviernes > 0) {
                $carte->setMinuto("00");
                $carte->setHora("17");
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $viernesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiondoslunes" name="sesiondoslunes">
            <?php
            if ($sesionviernes > 0) {
                echo $carte->getSesion();
                $sesionviernes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionviernes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $viernesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiontreslunes" name="sesiontreslunes">
            <?php
            if ($sesionviernes > 0) {
                echo $carte->getSesion();
                $sesionviernes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionviernes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $viernesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncuatrolunes" name="sesioncuatrolunes">
            <?php
            if ($sesionviernes > 0) {
                echo $carte->getSesion();
                $sesionviernes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionviernes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $viernesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincoviernes" name="sesioncincoviernes">
            <?php
            if ($sesionviernes > 0) {
                echo $carte->getSesion();
                $sesionviernes--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionviernes > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $viernesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincolunes" name="sesioncincolunes">
            <?php
            if ($sesionviernes > 0) {
                echo $carte->getSesion();
                $sesionviernes--;
            }
            ?>
        </p>
    </a></div>
