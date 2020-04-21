<div class="row">
    <div class="column">
        <div class="ui menu">
            <a class="header item" href="index.php">
                MOSIT Digital Department
            </a>
                <?php
                    if ($menu["left"]) {
                        foreach ($menu["left"] as $menuItem) {
                            echo '<a href="' . $menuItem["link"] . '" class="item">' . $menuItem["caption"] . '</a>';
                        }
                    }
                ?>
            <div class="right menu">
                <?php
                    if ($menu["right"]) {
                        foreach ($menu["right"] as $menuItem) {
                            echo '<a href="' . $menuItem["link"] . '" class="item">' . $menuItem["caption"] . '</a>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>