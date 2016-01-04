 <?

        foreach($model->type->attrs as $attr)
        {
            unset($catalog);
            if(!$model->getIsNewRecord())
            {
                $catalog = AttrVal::model()->findByPk(array('id_attr'=>$attr->id,'id_elem'=>$model->id));
            }
            if(empty($catalog))
            {
                $catalog = new AttrVal();
                $catalog->id_attr =  $attr->id;

            }
            //echo $catalog->id_attr."<br/>";

            ?>
            <tr>
                <td align="right" ><b><?=$attr->name?>:</b>
                </td>
                <td>
                    <?
                    switch($attr->mytype->mytype)
                    {

                           case 'date':
                           {

                               $this->widget('application.extensions.timepicker.timepicker', array(
                                    'model'=>$catalog,
                                    'name'=>$catalog->id_attr,
                                    'options'=>array(),
                                    'widget'=>'datepicker',
                                ));

                           }
                           break;

                           case 'datetime':
                           {

                                $this->widget('application.extensions.timepicker.timepicker', array(
                                    'model'=>$catalog,
                                    'name'=>$catalog->id_attr,
                                    'options'=>array(),
                                    'widget'=>'datetimepicker',
                                ));
                           }
                           break;

                           case 'photo':
                           {
                               $this->widget('application.extensions.kcfinder.Ckcfinder',array(
                                            'model'=>$catalog,
                                            'attribute'=>$catalog->id_attr,
                               ));
                           }
                           break;

                           case 'shorttext':
                           {
                               echo CHtml::activeTextArea($catalog, $catalog->id_attr);
                           }
                           break;

                           case 'fulltext':
                           {
                               ?>
                                <span style="float:right" title="<?=Yii::t('qtip', '#5')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
                                <?
                                $this->widget('application.extensions.editor.CKkceditor',array(
                                    'model'=>$catalog,
                                    'attribute'=>$catalog->id_attr,
                                    "height"=>'200px',
                                    "width"=>'850px',
                                    "filespath"=>$_SERVER['DOCUMENT_ROOT']."/userfiles/editor/",
                                    "filesurl"=>"/userfiles/editor/",

                                ));


                           }
                           break;

                           case 'string':
                           {
                               echo CHtml::activeTextField($catalog, $catalog->id_attr);
                           }
                           break;

                           case 'price':
                           {
                               echo CHtml::activeTextField($catalog, $catalog->id_attr,array('id'=>'price'));
                           }
                           break;

                           case 'count':
                           {
                               echo CHtml::activeTextField($catalog, $catalog->id_attr,array('id'=>'count'));
                           }
                           break;

                           case 'yes_no':
                           {
                               echo CHtml::activeCheckBox($catalog, $catalog->id_attr);
                           }
                           break;

                           case 'fk':
                           {

                                 $attr = Attr::model()->findByPk($catalog->id_attr);
                                 $var = $catalog->id_attr;
                                 echo CHtml::listBox('AttrVal['.$catalog->id_attr.']',explode(',', $catalog->$var),Stre::getElementList($attr->fk),array('multiple'=>'multiple','style'=>'width:600px;'));

                           }
                           break;

                           default:
                               echo CHtml::activeTextField($catalog, $catalog->id_attr);
                    }
                    ?>

                </td>
            </tr>
            <?
        }
?>