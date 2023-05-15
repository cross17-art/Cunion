<?php
$traderTransactionHandler = new TraderTransactionHandler();
$transactionList = $traderTransactionHandler->GetAllAwaitTraderTransactionRecords();

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Trader Await Requests</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <th class="text-center">Transaction Id</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">User Id</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($transactionList as $traderTransaction){
                        ?>

                        <tr>
                            <td class="text-center"><?= $traderTransaction['id'] ?></td>
                            <td class="text-center"><?= $traderTransaction['date'] ?></td>
                            <td class="text-center"><?= $traderTransaction['user_id'] ?></td>
                            <td class="text-center"><span style="color:#4bbf73 ">$<?= $traderTransaction['amount'] ?></span></td>
                            <td class="text-center"><?= $traderTransaction['address'] ?></td>
                            <td class="text-center"><?= $traderTransaction['status'] == 'await' ? '<span class="badge badge-soft-warning">await</span>' :
                                    '<span class="badge badge-soft-success">completed</span>'?></td>
                            <td class="text-center"><button class="btn btn-success" onclick="ApproveTraderTransaction(<?= $traderTransaction['id'] ?>)">Approve</button> </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
