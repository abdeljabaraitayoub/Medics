    <?php foreach ($results as $medicament) : ?>
        <div>
            <div class="text-center item mb-2 item-v2">
                <span class="onsale">Sale</span>
                <a href="shop-single.html"> <img src="images/product_03.png" alt="Image"></a>
                <h3 class="text-dark"><a href="shop-single.html"><?php echo $medicament['name']; ?></a></h3>
                <p><?php echo $medicament['description']; ?></p>
                <p class="price"><?php echo $medicament['prix']; ?> DH</p>
                <a href="add?id=<?php echo $medicament['id']; ?>"><button type="button" class="btn mb-3" style="background-color: #75b239; color: #ffffff;">buy</button></a>
            </div>
        </div>
    <?php endforeach; ?>