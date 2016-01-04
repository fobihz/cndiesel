<?php

class Sort extends CAction {

    public function run() {
         if( isset($_POST['id']) && isset($_POST['index']) && isset($_POST['model']))
            {
                $Model =$_POST['model'];

                $id = $_POST['id'];
                $index = $_POST['index'];
                $lastIndex = ($Model::model()->count())-1;
                $model = $Model::model()->findByPk($id);

                $criteria = new CDbCriteria();
                $criteria->condition = 'id<>:id';
                $criteria->params = array(':id'=>$id);
                $criteria->limit = 1;
                if(!empty($_POST['attr']) && !empty($_POST['value']))
                {
                    $criteria->addCondition($_POST['attr'].'=:'.$_POST['attr']);
                    $criteria->params[':'.$_POST['attr']] = $_POST['value'];
                }


                switch($index)
                {
                    case 0:
                    {
                      
                        $criteria->order = 'pos ASC';
                        $nextModel = $Model::model()->find($criteria);
                        $model->pos = $nextModel->pos-1;
                    }
                    break;
                    case $lastIndex:
                    {
                       
                        $criteria->order = 'pos DESC';
                        $prevModel = $Model::model()->find($criteria);
                        $model->pos = $prevModel->pos+1;
                    }
                    break;
                    default :
                    {
                       
                        $criteria->order = 'pos';
                        $criteria->offset = $index-1;
                        $prevModel = $Model::model()->find($criteria);

                        $criteria->offset = $index;
                        $nextModel = $Model::model()->find($criteria);

                        $model->pos = ($prevModel->pos + $nextModel->pos)/2.0;

                    }
                    break;
                }
                $model->save();
                //echo $model->pos;
            }
    }
}
?>