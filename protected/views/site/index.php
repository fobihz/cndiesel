<h1>
    <?=$page->name?>
</h1>
<? if( $page->id == 8 ) {
    $coord = Page::model()->findByAttributes(array('name' => 'Param: координаты маркера'));
    $marker = Page::model()->findByAttributes(array('name' => 'Param: текст маркера'));
    Yii::app()->clientScript->registerScriptFile("http://maps.api.2gis.ru/2.0/loader.js?pkg=full");
    Yii::app()->clientScript->registerScript("2gis-map", "var map;
            DG.then(function () {
                map = DG.map('map', {
                    center: ". $coord->text .",
                    zoom: 13
                });

                marker = DG.marker(". $coord->text .").addTo(map); marker.bindPopup('". $marker->text . "');
                marker.openPopup();
            });");
    ?><div id="map" style="width:100%; height:400px"></div><?
} ?>
<?=$page->text?>