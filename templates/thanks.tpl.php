<?php

global $cartData;
global $cartSum;

?>

<table class="table table-sm table-dark">
    <thead>
        <tr>
            <th> Produkt </th>
            <th> Beskrivning </th>
            <th> Antal </th>
            <th> Pris </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($cartData as $key => $product) {
            $antal = $_SESSION['cart'][$product->PID];
            $cartSum += $product->Price * $antal;
        ?>
            <tr>
                <td>
                    <?php echo $product->Title ?>
                </td>
                <td>
                    <?php echo $product->Description ?>
                </td>
                <td>
                    <?php echo $product->PID, $antal ?>
                </td>
                <td>
                    <?php echo $product->Price * $antal ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php

echo "<div class='col-md-12'>";
printf('Totalsumma: %s', $cartSum);

?>