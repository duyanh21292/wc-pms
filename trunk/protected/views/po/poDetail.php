<div class="icon ion-ios7-trash-outline bt_crud_26 delete" style="float: right;margin-top: 2px;margin-left: 10px;margin-right: 10px" title="Drop"></div>
<div class="icon ion-ios7-compose-outline bt_crud_26 modify" style="float: right;margin-top: 2px" title="Modify" onclick="goToPage('<?php echo Employees::BASE_URL ?>/po/modifyPo?po_no=<?php echo $model->PoNo ?>')"></div>
<table style="width: 100%">
    <tr class="client_detail">
        <td class="po_detail">Po No.</td>
        <td class="po_detail value_prj_detail"><div style="font-size: medium;color: #4B7A9B"><?php echo($model->PoNo) ?></div></td>
        <td class="po_detail">Reg. Date</td>
        <td class="po_detail value_prj_detail"><?php $regDate = date("Y-m-d", strtotime($model->RegDate)); echo $regDate ?></td>
    </tr>
    <tr class="client_detail">
        <td class="po_detail">Status</td>
        <td class="po_detail value_prj_detail"><?php echo $model->Status?></td>
        <td class="po_detail">File/Item</td>
        <td class="po_detail value_prj_detail"><?php echo $model->FileItem ?></td>
    </tr>
    <tr class="client_detail">
        <td class="po_detail">Supplier</td>
        <td class="po_detail value_prj_detail"><?php echo($model->SupplierName) ?></td>
        <td class="po_detail">Amount</td>
        <td class="po_detail value_prj_detail"><?php echo number_format($model->Amount,4,".",",") ?></td>
    </tr>
    <tr class="client_detail">
        <td class="po_detail">Unit</td>
        <td class="po_detail value_prj_detail"><?php echo($model->Unit) ?></td>
        <td class="po_detail">U/Price</td>
        <td class="po_detail value_prj_detail"><?php echo number_format($model->UPrice,4,".",",")  ?></td>
    </tr>
    <tr class="client_detail">
        <td class="po_detail">Quantity</td>
        <td class="po_detail value_prj_detail"><?php echo number_format($model->Quantity,4,".",",") ?></td>
        <td class="po_detail">Currency</td>
        <td class="po_detail value_prj_detail"><?php echo $model->Currency ?></td>
    </tr>
    <tr class="client_detail">
        <td class="po_detail">Language Pair</td>
        <td class="po_detail value_prj_detail"><?php echo($model->LanguagePair) ?></td>
        <td class="po_detail">Task</td>
        <td class="po_detail value_prj_detail"><?php echo $model->AvailableTask ?></td>
    </tr>
    <tr class="client_detail">
        <td class="po_detail">Delivery Method</td>
        <td class="po_detail value_prj_detail"><?php echo($model->DeliveryMethodName) ?></td>
        <td class="po_detail">Due Date</td>
        <td class="po_detail value_prj_detail"><?php $dueDate = date("Y-m-d", strtotime($model->DueDate)); echo $dueDate ?></td>
    </tr>
    <tr class="client_detail">
        <td class="po_detail">Comments</td>
        <td class="po_detail value_prj_detail" colspan="3"><?php echo($model->Comments) ?></td>
    </tr>
</table>