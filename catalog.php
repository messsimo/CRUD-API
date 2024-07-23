<?php
    // Подключение шапки сайта
    require_once("blocks/header.php");

    // Подключение БД
    require("data/db.php");

    // Выборка из БД
    $sql = "SELECT * FROM `items`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM `category`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
        

?>

<!-- Cекция с Навигацией -->
<div class="nav-catalog">
    <span>Главная / Каталог</span>
</div>

<!-- Cекция с Фильтрами -->
<div class="filters">
    <div class="conteiner-filters">
        <h1>Фильтровать по:</h1>
        <div class="block">
            <p>Категория</p>
            <form action="" method="GET">
                <?php foreach ($category as $el) { ?>
                    <input type="checkbox" id="input-category">
                    <label for="input-category"><?php echo $el["name"]; ?></label><br>
                <?php } ?>
            </form>
        </div>

        <div class="block">
            <p>Цвет</p>
           <form action="" method="GET">
               <?php foreach ($items as $el) { ?>
                    <input type="checkbox" id="input-color">
                    <label for="input-color"><?php echo $el["color"]; ?></label><br>
                <?php } ?>
          </form>
        </div>

        <div class="oxford">
            <img src="images/card-oxford.jpg">
            <div class="text-card">
                <p>Оксфорд 1950 </p>
                <span>Новая коллекция изысканных кресел</span>
            </div>

            <div class="nav-сard">
                <a href="/catalog.php">
                    <span>В каталог</span>
                    <img src="images/btn-right.png">
                </a>
            </div>
        </div>
    </div> 
    
    <div class="container-products">
        <?php foreach ($items as $el) { ?>
            <div class="block">
                <div class="rating-catalog">
                    <img src="images/star.png">
                    <p><?php echo $el["rating"]; ?></p>
                </div>

                <img src="cover-items/<?php echo $el["photo"]; ?>" class="photo-item">
                <div class="name-catalog"><?php echo $el["name"]; ?></div>
                <span><?php echo $el["price"]; ?> руб</span><br>

                <a href="/item.php?id=<?php echo $el["id"]; ?>?name=<?php echo $el["name"]; ?>"><button>Купить</button></a>
            </div>
        <?php } ?>
    </div>
</div>

<?php
    // Подключение футера сайта
    require_once("blocks/footer.php");
?>