<div id="master_account_form" class="card-body">

    <div class="input-group mb-3">
        <div class="input-group-text"> <?= ToolTip::DrawToolTip('Форма торговли') ?> Market Type *</div>
        <select id="market_type" class="form-select flex-grow-1" required="true" highliting>
            <option value="none" selected>...</option>
            <option value="manual">Spot</option>
            <option value="bot" disabled>Margin</option>
            <option value="bot" disabled>Futures</option>
        </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-text"><?= ToolTip::DrawToolTip('Базовый актив торговли') ?>Base Asset *</div>
        <select id="base_asset" class="form-select flex-grow-1" onchange="SwitchBaseAsset(this.value)" required="true" highliting>
            <option value="none" selected>...</option>
            <option value="USDT">USDT</option>
            <option value="BTC">BTC</option>
        </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-text" ><?= ToolTip::DrawToolTip('Минимальный рекомендуемый депозит') ?>Minimum Required Deposit <span min-dep-label-span style="margin-right: 2px; margin-left: 2px; font-family: 'Poppins';"></span> *</div>
        <input type="text" class="form-control" id="req_deposit"
               onkeydown="MinDepInput()"
               placeholder="Please select the base asset first"
               required="true" highliting disabled
            <?= $user->kucoinMasterAccount != null ? "value=" . $user->kucoinMasterAccount->deposit : "" ?>>
    </div>


    <div class="input-group mb-3">
        <div class="input-group-text"><?= ToolTip::DrawToolTip('Вид торговли') ?>Trade type *</div>
        <select id="trade_type" class="form-select flex-grow-1" required="true" highliting>
            <option value="none" selected>...</option>
            <option value="manual">Manual</option>
            <option value="bot">Bot</option>
        </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-text"><?= ToolTip::DrawToolTip('Стратегия торговли') ?>Trade Direction</div>
        <select id="trade_direction" class="form-select flex-grow-1" required="true" highliting>
            <option value="none" selected>...</option>
            <option value="long">Long</option>
            <option value="short">Short</option>
            <option value="mixed">Mixed</option>
        </select>
    </div>


    <div class="input-group mb-3" style="margin-bottom: 20px ">
        <div class="input-group-text"><?= ToolTip::DrawToolTip('Контакты') ?>Telegram</div>
        <input type="text" class="form-control" id="telegram" required="false" highliting
               placeholder="Input you telegram if you would like the trader to have the opportunity to message you">
    </div>

    <div class="card-body">
            <textarea class="form-control" id="short_dsr"
                      placeholder="Short Description"
                      required="false"
                      style="height: 91px; margin-top: 0px; margin-bottom: 0px;"></textarea>

    </div>

    <div class="row">
        <div class="col-12">
            <button id="submit_master_specifications" type="submit"
                    class="btn btn-primary mb-2">Submit
            </button>
        </div>
    </div>
</div>

