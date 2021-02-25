<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Annonser:</h1>
    <p>Filtrering och sortering:</p>
    <p>
        <form action="users.php" method="post">
            <label for="rich">Rika först</label>
            <input type="radio" name="salary" value="rich" checked>

            <label for="poor">Rika sist</label>
            <input type="radio" name="salary" value="poor"><br>

            <label for="pop">Poplulära först</label>
            <input type="radio" name="likes" value="pop" checked>

            <label for="not-pop">Populära sist</label>
            <input type="radio" name="likes" value="not-pop"><br>

            Preferens: <br><select name="preference"><br>
                <option value="" disabled selected>Välj</option>
                <option value=0>Man</option>
                <option value=1>Kvinna</option>
                <option value=2>Båda</option>
                <option value=3>Annat</option>
                <option value=4>Alla</option>
            </select>
            <input type="hidden" name="stage" value="filter">
            <input type="submit" value="Filtrera">
        </form>
    </p>

    <?php
        include "filter.php";
    ?>
    
</article>