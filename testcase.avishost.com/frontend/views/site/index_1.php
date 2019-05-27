<?php

use common\models\Invoice;
use common\models\Block;
use common\models\Unit;
use common\models\Persian;
use common\models\IncomeOutcome;
use common\models\Type;

/* @var $this yii\web\View */
use common\models\Information;

$building = common\models\Building::findOne(Yii::$app->user->identity->building_id);
$this->title = 'داشبورد اصلی';


$today = gregorian_to_jalali(date('Y'), date('m'), date('d'));
$period = $today[0] . str_pad($today[1], 2, "0", STR_PAD_LEFT);


$period_start = $today[0] . "/01";
$period_end = $today[0] . "/12";


$all_income_sal = \common\models\IncomeOutcome::find()->select(' sum(amount) AS sum')
                ->where('building_id=' . Yii::$app->user->identity->building_id . ' and period="' . $period . '" and in_out=1 ')
                ->One()->sum;

$all_outcome_sal = \common\models\IncomeOutcome::find()->select(' sum(amount) AS all_amount')
                ->where('period>="' . $period_start . '" and period<="' . $period_end . '"    and in_out=2 and building_id=' . Yii::$app->user->identity->building_id)
                ->One()->all_amount;



$query_all_invoice_paid_sum = Invoice::find()->select(' sum(amount) AS unit_amount')
                ->where('invoice.building_id=' . Yii::$app->user->identity->building_id . ' and period="' . $period . '" and status=1 ')
                ->One()->unit_amount;
$all_income = \common\models\IncomeOutcome::find()->select(' sum(amount) AS sum')
                ->where('building_id=' . Yii::$app->user->identity->building_id . ' and period="' . $period . '" and in_out=1 ')
                ->One()->sum;

if (!$all_income)
    $all_income = 0;

$this->params['period'] = $period;
$this->params['query_all_invoice_paid_sum'] = $query_all_invoice_paid_sum;
$this->params['all_income'] = $all_income;


$all_outcome = \common\models\IncomeOutcome::find()->select(' sum(amount) AS all_amount')->where('period="' . $period . '" and in_out=2 and building_id=' . Yii::$app->user->identity->building_id)->One()->all_amount;

$this->params['all_outcome'] = $all_outcome;
?>
<h1><?= \common\models\Building::findOne(Yii::$app->user->identity->building_id)->name ?></h1>


<style>
    .ui-widget-content{
        border: unset !important;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
        background:  unset !important;
    }
    .tabs span{
        float: right;
    }

    .content-box-header > .ui-tabs-nav {
        left: 10px;
        right:  unset;
    }
    #TABSX .ui-tabs-nav li.ui-state-active > a{
        background: #fff !important;
    }    

    td.green,.green {
        background: rgba(111, 175, 17, 0.51);
    }
    td.red,.red {
        background: rgba(255, 0, 0, 0.62);
    }
    .w{
        color: #555 !important;
    }
    .bord {
        width: 100px;
        height: 30px;
        border: 1px solid #EEE;
        text-align: center;
        color: #FFF;
        padding: 5px 10px;
        float: right;
        margin-bottom: 10px;
    }
</style>


<div class="red bord">بدهکار</div>
<div class="green bord">تسویه شده</div>
<div class="w bord">بدون هزینه</div>


<div class='clearfix'> </div>



<?php
$year = Persian::get_current_date()[0];
if ($building->type == 2) {
    ?>

    <div class="example-box-wrapper" id="TABSX">
        <div class="content-box tabs">
            <h3 class="content-box-header bg-primary">
                <span >نمودار شارژ</span>


                <ul>

                    <?php
                    foreach (Block::find()->where(['building_id' => $building->id])->all() as $block) {
                        ?>
                        <li>
                            <a href="#tabs-example-<?= $block->id ?>" title="Tab 1">
                                بلوک<?= $block->name; ?>
                            </a>
                        </li>

                        <?php
                    }
                    ?>
                </ul>
            </h3>
            <?php
            foreach (Block::find()->where(['building_id' => $building->id])->all() as $block) {
                ?>
                <div id="tabs-example-<?= $block->id ?>">


                    <div class="panel">
                        <div class="panel-body">

                            <div class="example-box-wrapper">
                                <table class="table table-bordered">

                                    <tbody>

                                        <tr>
                                            <td>#</td>   
        <?php foreach (Unit::find()->where(['block_id' => $block->id])->all() as $unit) { ?>
                                                <td><?= $unit->name ?></td> 
                                            <?php } ?>
                                        </tr>

        <?php foreach (array_reverse(Persian::months) as $key => $month) { ?>
                                            <tr>
                                                <td><?= $month ?></td>   
            <?php foreach (Unit::find()->where(['block_id' => $block->id])->all() as $unit) { ?>
                                                    <td class="<?= Invoice::get_unit_invoice_color(Invoice::get_month_invoice_status($unit->id, $year, (12 - $key), 0), Invoice::get_month_invoice_status($unit->id, $year, (12 - $key))); ?>"></td> 
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

        <?php
    }
    ?>

        </div>

    </div>




    <div class="example-box-wrapper" id="TABSX">
        <div class="content-box tabs">
            <h3 class="content-box-header bg-primary">
                <span >نمودار هزینه  های  غیر  مصرفی</span>


                <ul>

    <?php
    foreach (Block::find()->where(['building_id' => $building->id])->all() as $block) {
        ?>
                        <li>
                            <a href="#tabs-example-<?= $block->id ?>" title="Tab 1">
                                بلوک<?= $block->name; ?>
                            </a>
                        </li>

        <?php
    }
    ?>
                </ul>
            </h3>
    <?php
    foreach (Block::find()->where(['building_id' => $building->id])->all() as $block) {
        ?>
                <div id="tabs-example-<?= $block->id ?>">


                    <div class="panel">
                        <div class="panel-body">

                            <div class="example-box-wrapper">
                                <table class="table table-bordered">

                                    <tbody>

                                        <tr>
                                            <td>#</td>   
        <?php foreach (Unit::find()->where(['block_id' => $block->id])->all() as $unit) { ?>
                                                <td><?= $unit->name ?></td> 
                                            <?php } ?>
                                        </tr>


                                        <tr>
                                            <td><?= Type::findOne(5)->name ?></td>   
        <?php foreach (Unit::find()->where(['block_id' => $block->id])->all() as $unit) { ?>
                                                <td class="<?=
            Invoice::get_unit_invoice_color(
                    Invoice::get_month_invoice_status($unit->id, $year, 0, 0, 2, 5), Invoice::get_month_invoice_status($unit->id, $year, 0, -2, 2, 5)
            );
            ?>"></td> 
                                            <?php } ?>
                                        </tr>

                                            <?php foreach (IncomeOutcome::find()->innerJoinWith('typex')->where(['income_outcome.building_id' => $building->id, 'for_id' => 2, 'in_out' => 2])->all() as $outcome) { ?>



                                            <tr>
                                                <td><?= Type::findOne($outcome->type_id)->name ?></td>   
            <?php foreach (Unit::find()->where(['block_id' => $block->id])->all() as $unit) { ?>
                                                    <td class="<?=
                Invoice::get_unit_invoice_color(
                        Invoice::get_month_invoice_status($unit->id, $year, 0, 0, 2, $outcome->typex->id), Invoice::get_month_invoice_status($unit->id, $year, 0, -2, 2, $outcome->typex->id)
                );
                ?>"></td> 
                                                <?php } ?>
                                            </tr>


                                            <?php } ?>






                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

        <?php
    }
    ?>

        </div>

    </div>




    <?php
} else {
    ?>





    <div class="panel">
        <div class="panel-body">

            <div class="example-box-wrapper">
                <table class="table table-bordered">

                    <tbody>

                        <tr>
                            <td>#</td>   
    <?php foreach (Unit::find()->where(['building_id' => $building->id])->all() as $unit) { ?>
                                <td><?= $unit->name ?></td> 
    <?php } ?>
                        </tr>

    <?php foreach (array_reverse(Persian::months) as $key => $month) { ?>
                            <tr>
                                <td><?= $month ?></td>   
                                <?php foreach (Unit::find()->where(['building_id' => $building->id])->all() as $unit) { ?>
                                    <td class="<?= Invoice::get_unit_invoice_color(Invoice::get_month_invoice_status($unit->id, $year, (12 - $key), 0), Invoice::get_month_invoice_status($unit->id, $year, (12 - $key))); ?>"></td> 
        <?php } ?>
                            </tr>
                        <?php } ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>





    <div class="example-box-wrapper" id="TABSX">
        <div class="content-box tabs">
            <h3 class="content-box-header bg-primary">
                <span >نمودار هزینه  های  غیر  مصرفی</span>



            </h3>

            <div id="tabs-example-<?= $block->id ?>">


                <div class="panel">
                    <div class="panel-body">

                        <div class="example-box-wrapper">
                            <table class="table table-bordered">

                                <tbody>

                                    <tr>
                                        <td>#</td>   
    <?php foreach (Unit::find()->where(['building_id' => $building->id])->all() as $unit) { ?>
                                            <td><?= $unit->name ?></td> 
    <?php } ?>
                                    </tr>

    <?php foreach (IncomeOutcome::find()->innerJoinWith('typex')->where(['income_outcome.building_id' => $building->id, 'for_id' => 2, 'in_out' => 2])->all() as $outcome) { ?>
                                        <tr>
                                            <td><?= Type::findOne($outcome->type_id)->name ?></td>   
                                            <?php foreach (Unit::find()->where(['building_id' => $building->id])->all() as $unit) { ?>
                                                <td class="<?=
                                                Invoice::get_unit_invoice_color(
                                                        Invoice::get_month_invoice_status($unit->id, $year, 0, 0, 2), Invoice::get_month_invoice_status($unit->id, $year, 0, -2, 2)
                                                );
                                                ?>">



                                                </td> 
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>



        </div>

    </div>






    <?php
}
?>















