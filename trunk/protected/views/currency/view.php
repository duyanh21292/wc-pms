<?php $no = 0 ?>
<div class="content">
    <div class="content_title"> + Currency</div>
    <div id="organization_content" class="content_main content_main_without_nav visible" style="left: 0;margin-top: 10px">
        <table id="currency_list" border="0" style="margin: auto">
            <tr style="height: 30px;background-color: #F1F1F1;">
                <td class="form" style="text-align: center;min-width: 200px">The standard exchange rate</td>
                <td class="form" style="text-align: center;min-width: 250px">Exchange into VND</td>
                <td class="form" style="text-align: center;min-width: 150px">Applied Date</td>
                <td class="form" style="text-align: center;min-width: 70px"></td>
            </tr>
            <tr style="height: 15px"><td colspan="4" class="form"></td></tr>
            <?php foreach($model as $obj):?>
                <?php if($no > 0):?>
                    <tr><td colspan="4" class="form"><div class="separator_hor" style="height: 2px;width: 100%"></div></td></tr>
                <?php endif ?>
                <?php $no++; ?>
                <tr class="form">
                    <td class="form" style="text-align: center;font-weight: normal">1&nbsp;<?php echo $obj->CurrencyNo?></td>
                    <td class="form" style="text-align: center;font-weight: normal"><?php echo $obj->ExchangeVND?></td>
                    <td class="form" style="text-align: center;font-weight: normal"><?php $date = date("Y-m-d", strtotime($obj->AppliedDate )); echo $date?></td>
                    <td class="form" style="text-align: center;font-weight: normal"><button>History</button></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>