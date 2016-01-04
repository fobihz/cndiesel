<?php

class Check extends CAction {

    public function run() {
         if( isset($_POST['item']) && isset($_POST['checked']) && isset($_POST['model']) && isset($_POST['attr'] ))
         {
              $id = intval($_POST['item']);
              $value = $_POST['checked'];
              $modelname = $_POST['model'];
              $attr = $_POST['attr'];

              $model = $modelname::model()->findByPk($id);
              $model->$attr = $value;
              $model->update();

         }
    }
}
?>