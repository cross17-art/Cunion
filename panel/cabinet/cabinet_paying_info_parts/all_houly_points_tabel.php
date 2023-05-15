<?php
/**
 * @var array $hourlyPointsList
 */
?>

<div class="col-md-4">
    <div class="card border py-2 py-md-3">
        <div class="card-header">
            Average balances
        </div>
        <div class="card-body">
            <table class="table table-striped table-sm">
                <thead>
                <th class="text-center">Date</th>
                <th class="text-center">Average Balance USDT</th>
                </thead>
                <tbody>


                <?php
                foreach ($hourlyPointsList as $hourlyPoint) {
                    ?>
                    <tr>
                        <td class="text-center"><?= $hourlyPoint['date'] ?></td>
                        <td class="text-center"><?= $hourlyPoint['balance'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
