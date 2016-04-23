<div class="session_area_day">JUEVES</div>
<div class="session_area_date"><?php
echo $jueves = $carte->getFechaSesion("JUEVES");
$juevesyepes = $carte->getFechaYepes();
?></div>
<div class="session_area_hour">
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $juevesyepes; ?>&horasesion=17:00:00&miercoles=0">
        <p id="sesionunajueves" name="sesionunajueves">
            <?php
            echo "17:00";
            $sesionjueves--;
            ?>
        </p>
    </a>
</div>
<div class="session_area_hour"><?php
            if ($sesionjueves > 0) {
                $carte->setMinuto("00");
                $carte->setHora("17");
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $juevesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiondosjueves" name="sesiondosjueves">
            <?php
            if ($sesionjueves > 0) {
                echo $carte->getSesion();
                $sesionjueves--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionjueves > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $juevesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesiontresjueves" name="sesiontresjueves">
            <?php
            if ($sesionjueves > 0) {
                echo $carte->getSesion();
                $sesionjueves--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionjueves > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $juevesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncuatrojueves" name="sesioncuatrojueves">
            <?php
            if ($sesionjueves > 0) {
                echo $carte->getSesion();
                $sesionjueves--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionjueves > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $juevesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincojueves" name="sesioncincojueves">
            <?php
            if ($sesionjueves > 0) {
                echo $carte->getSesion();
                $sesionjueves--;
            }
            ?>
        </p>
    </a></div>
<div class="session_area_hour"><?php
            if ($sesionjueves > 0) {
                $carte->setMinuto($carte->getMinuto());
                $carte->setHora($carte->getHora());
                $carte->getNuevaSesion();
            }
            ?>
    <a href="butaca.php?idpelicula=<?php echo $idpelicula; ?>&sala=<?php echo $sala; ?>&fechasesion=<?php echo $juevesyepes; ?>&horasesion=<?php echo $carte->getHoraYepes(); ?>&miercoles=0">
        <p id="sesioncincojueves" name="sesioncincojueves">
            <?php
            if ($sesionjueves > 0) {
                echo $carte->getSesion();
                $sesionjueves--;
            }
            ?>
        </p>
    </a></div>
