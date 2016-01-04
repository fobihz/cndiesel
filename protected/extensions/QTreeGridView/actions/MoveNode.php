<?php

class MoveNode extends CAction {

    public function run($pid,$action, $to, $id) {
       
        $to = CActiveRecord::model($this->getController()->CQtreeGreedView['modelClassName'])->findByPk((int) $to);
        $moved = CActiveRecord::model($this->getController()->CQtreeGreedView['modelClassName'])->findByPk((int) $id);
        $url = $this->getController()->createUrl('default/'.$this->getController()->CQtreeGreedView['adminAction'],array('id'=>$pid,'msg'=>'[!] Элемент успешно пренесен','msgtype'=>'success'));

        if (!is_null($to) && !is_null($moved)) {
            try {
                switch ($action) {
                    case 'child':
                        $moved->moveAsLast($to);
                        break;
                    case 'before':
                        if($to->isRoot()) {
                            //$moved->moveAsRoot();
                              $url = $this->getController()->createUrl('default/'.$this->getController()->CQtreeGreedView['adminAction'],array('id'=>$pid,'msg'=>'[!] Ошибка: перенос запрещен!','msgtype'=>'error'));

                        } else {
                            $moved->moveBefore($to);
                        }
                        break;
                    case 'after':
                        if($to->isRoot()) {
                            //$moved->moveAsRoot();
                              $url = $this->getController()->createUrl('default/'.$this->getController()->CQtreeGreedView['adminAction'],array('id'=>$pid,'msg'=>'[!] Ошибка: перенос запрещен!','msgtype'=>'error'));
       
                        } else {
                            $moved->moveAfter($to);
                        }
                        break;
                }
            } catch (Exception $e) {
                Yii::app()->user->setFlash('CQTeeGridView', $e->getMessage());
            }
        }
         $this->getController()->redirect($url);
    }
}
?>
