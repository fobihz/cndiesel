<h1>ADVANCE.CMS</h1>

<div style="width:950px;">
<?


$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart' => array('zoomType'=>'xy'),
      'title' => array('text' => 'Размер базы данных'),
      'xAxis' => array(
         //'categories' => $db_dates,
         'type'=>'datetime',
          //'labels'=>array('enabled'=>false)
      ),
      'yAxis' => array(
         'title' => array('text' => 'Размер БД (Мб)')
      ),
      
      'series' => array(
         array('name' => 'Размер БД (Мб)',
             'data' => $db
            
            )
         ),
        
      )
   )
);
?>
</div>
<br/>
<div style="width:950px;">
<?
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart' => array('zoomType'=>'xy'),
      'title' => array('text' => 'Размер пользовательских данных'),
      'xAxis' => array(
         'type'=>'datetime',
      ),
      'yAxis' => array(
         'title' => array('text' => 'Размер ПД (Мб)')
      ),
      'series' => array(
         array('name' => 'Размер ПД (Мб)', 'data' => $userfiles),

      )
   )
));
?>
</div>
