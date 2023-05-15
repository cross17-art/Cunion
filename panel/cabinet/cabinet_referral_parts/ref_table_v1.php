<?php

?>

<table class="table table-striped table-sm">
    <thead>
    <th class='text-center'>Id</th>
    <th class='text-center'>Nickname</th>
    <th class='text-center'>Transaction</th>
    </thead>
    <tbody>

    <?php
    $referrals = $user->GetReferralUserList();
    foreach ($referrals as $refUser){
        /**
         * @var User $refUser
         */
        ?>
        <tr>
            <td class="text-center"><?= $refUser->id ?></td>
            <td class="text-center"><?= $refUser->nickname ?></td>
            <td class="text-center">
                <table class="table table-bordered">
                    <thead>
                    <th class="text-center">Id</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Ref Amount</th>
                    </thead>
                    <tbody>
                    <?php
                    $transactionList = $refUser->transactions->GetAllCompletedTransactions();
                    foreach ($transactionList as $transactionRecord){
                        ?>
                        <tr>
                            <td class="text-center"><?= $transactionRecord['id'] ?></td>
                            <td class="text-center"><?= $transactionRecord['date'] ?></td>
                            <td class="text-center"><span style="color:#4bbf73">$<?= $transactionRecord['amount'] * $referralCoefficient ?></span></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr class="text-center">
                        <td colspan="3">Total Earnings: <span style="color:#4bbf73">$<?= $refUser->transactions->GetTotalCompletedTransactionsSum() * $referralCoefficient ?></span></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
