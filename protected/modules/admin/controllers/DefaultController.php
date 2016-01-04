<?php

class DefaultController extends Controller
{

       
	public function actionIndex()
	{
            $this->dbSize();
            $this->userfilesSize();
            
            $db_models = DbStats::model()->findAll(array('order'=>'date'));
            $db = array();
            foreach($db_models as $model)
            {
              
                $db[] = array($this->viewDate($model->date),floatval($model->size));
            }

            $userfiles_models = UserfilesStats::model()->findAll(array('order'=>'date'));
            $userfiles = array();
            foreach($userfiles_models as $model)
            {
               
                $userfiles[] = array($this->viewDate($model->date),floatval($model->size));
            }
            $this->render('index',array('db'=>$db,'userfiles'=>$userfiles));
	}

        public function viewDate($date)
        {
            date_default_timezone_set('UTC');
            $formater = new CDateFormatter(Yii::app()->locale);
            $hour = intval($formater->format('H',$date));
            $min = intval($formater->format('mm',$date));
            $sec = intval($formater->format('ss',$date));
            $month = intval($formater->format('M',$date));
            $day = intval($formater->format('d',$date));
            $year = intval($formater->format('yyyy',$date));
            return mktime($hour, $min, $sec, $month, $day, $year)*1000;
        }

        private function formatsize($file_size){
             return round($file_size / 1048576 * 100) / 100;
        }

        private function is_added($table)
        {
            $sql = "SELECT count(*) as num from ".$table." where (TO_DAYS(NOW()) - TO_DAYS(date)) = 0";
            $command = Yii::app()->db->createCommand($sql);
            $row = $command->queryRow();
            if($row['num'] == 0)
                return true;
            else
                return false;

        }

        private function dbSize()
        {
            
            if($this->is_added('db_stats'))
            {
                Yii::import('application.modules.admin.models.DbStats');
                $sql = "SHOW TABLE STATUS";
                $command = Yii::app()->db->createCommand($sql);
                $data = $command->query();
                $size = 0;
                foreach($data as $row)
                        $size += $row['Data_length'] + $row['Index_length'];

                $size = $this->formatsize($size);

                $model = new DbStats('search');
                $model->size = $size;
                $model->insert();
            }
        }

        function dir_size($dir) {
            $totalsize=0;
            if ($dirstream = @opendir($dir)) {
            while (false !== ($filename = readdir($dirstream))) {
            if ($filename!="." && $filename!="..")
            {
            if (is_file($dir."/".$filename))
            $totalsize+=filesize($dir."/".$filename);

            if (is_dir($dir."/".$filename))
            $totalsize+=$this->dir_size($dir."/".$filename);
            }
            }
            }
            closedir($dirstream);
            return $totalsize;
        }

        private function userfilesSize()
        {
            if($this->is_added('userfiles_stats'))
            {
                Yii::import('application.modules.admin.models.UserfilesStats');
                $size = $this->dir_size($_SERVER['DOCUMENT_ROOT'].'/userfiles');
                $size = $this->formatsize($size);
                $model = new UserfilesStats('search');
                $model->size = $size;
                $model->insert();
            }
        }

      


}