<?php
/**
 * phaCheckColumn class file.
 *
 * @author Vadim Kruchkov <long@phargo.net>
 * @link http://www.phargo.net/
 * @copyright Copyright &copy; 2011 phArgo Software
 * @license GPL & MIT
 */

Yii::import('zii.widgets.grid.CDataColumn');

class phaCheckColumn extends CDataColumn {

    /**
     * @var array Additional HTML attributes. See details {@link CHtml::checkBox}
     */
    public $htmlCheckBoxOptions = array();

    /**
     * @var mixed The value used to determine the check state
     */
    public $checkedValue = 1;

    /**
     * @var mixed URL for update action. On this URL will be sent call to update value.
     *      If this value is string - value will be used as is.
     *      If it's array - will be called {@link CHtml::normalizeUrl}
     */
    public $actionUrl = array('.');

    /**
     * @var string name of models key
     */
    public $modelId = 'id';

    /**
     * Renders the data cell content.
     * This method evaluates {@link value} or {@link name} and renders the result.
     *
     * @param integer $row the row number (zero-based)
     * @param mixed $data the data associated with the row
     */
    protected function renderDataCellContent($row,$data) {
        $value = CHtml::value($data, $this->name);
        $this->htmlCheckBoxOptions['itemId'] = $data->{$this->modelId};
        echo CHtml::checkBox(
            $this->name,
            (boolean) $value==$this->checkedValue,
            $this->htmlCheckBoxOptions
        );
    }

    /**
     * Initializes the column.
     *
     * @see CDataColumn::init()
     */
    public function init() {
        parent::init();

        if (!isset($this->htmlCheckBoxOptions['class'])) {
            $this->htmlCheckBoxOptions['class'] = 'checkBoxColumn-' . $this->id;
        }

        $cs=Yii::app()->getClientScript();
        $gridId = $this->grid->getId();

        $script ='
        jQuery(".'.$this->htmlCheckBoxOptions['class'].'").live("click", function(e){

          $.ajax({
            type: "POST",
            dataType: "json",
            cache: false,
            url: "' . (is_array($this->actionUrl) ? CHtml::normalizeUrl( $this->actionUrl ) : $this->actionUrl) . '",
            data: {
                
                attr: "'.$this->name.'",
                model: "'.get_class($this->grid->filter).'",
                item: $(this).attr("itemid"),
                checked: $(this).attr("checked")?1:0
            },
            success: function(data){
              //alert();
              $("#'.$gridId.'").yiiGridView.update("'.$gridId.'");
            }
          });
        });';

        $cs->registerScript(__CLASS__.$gridId.'#active_column-'.$this->id, $script);
    }
}