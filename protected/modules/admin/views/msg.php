<?
switch($msgtype)
{
    case 'error':
        $selector = 'errmsg';
    break;
    case 'success':
        $selector = 'sucmsg';
    break;
    default:
        $selector = 'notmsg';
    break;
}
?>
<div class="<?=$selector?>">
    <?=$msg?>
</div><br/>
<? Yii::app()->clientScript->registerCoreScript('jquery.ui');?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.<?=$selector?>').effect('highlight',{},700);
        $('.<?=$selector?>').effect('highlight',{},700);
        $('.<?=$selector?>').effect('highlight',{},700);
    });
</script>
