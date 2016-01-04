<?php

class HZupload extends CInputWidget
{
    private $baseurl;
    
    public function init()
    {
	$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'source';
	$this->baseurl = Yii::app()->getAssetManager()->publish($dir);
    	
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');

        $cs->registerScriptFile($this->baseurl."/jquery.tmpl.min.js");
        $cs->registerScriptFile($this->baseurl."/jquery.iframe-transport.js");

        $cs->registerScriptFile($this->baseurl."/jquery.fileupload.js");
        $cs->registerScriptFile($this->baseurl."/jquery.fileupload-ui.js");
        $cs->registerScriptFile($this->baseurl."/application.js");

        $cs->registerCssFile("http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css", "screen");
        $cs->registerCssFile($this->baseurl."/jquery.fileupload-ui.css", "screen");
       

        parent::init();
    }

    public function run()
    {
        ?>
        <div id="fileupload">
            <form action="<?=$this->baseurl?>/upload.php" method="POST" enctype="multipart/form-data">
                <div class="fileupload-buttonbar">
                    <label class="fileinput-button">
                        <span>Добавить файлы...</span>
                        <input type="file" name="files[]" multiple>
                    </label>
                    <button type="submit" class="start">Начать загрузку</button>
                    <button type="reset" class="cancel">Отменить загрузку</button>
                    <button type="button" class="delete">Удалить файлы</button>
                </div>
            </form>
            <div class="fileupload-content">
                <table class="files"></table>
                <div class="fileupload-progressbar"></div>
            </div>
        </div>
        <script id="template-upload" type="text/x-jquery-tmpl">
            <tr class="template-upload{{if error}} ui-state-error{{/if}}">
                <td class="preview"></td>
                <td class="name">${name}</td>
                <td class="size">${sizef}</td>
                {{if error}}
                    <td class="error" colspan="2">Error:
                        {{if error === 'maxFileSize'}}File is too big
                        {{else error === 'minFileSize'}}File is too small
                        {{else error === 'acceptFileTypes'}}Filetype not allowed
                        {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                        {{else}}${error}
                        {{/if}}
                    </td>
                {{else}}
                    <td class="progress"><div></div></td>
                    <td class="start"><button>Начать</button></td>
                {{/if}}
                <td class="cancel"><button>Отмена</button></td>
            </tr>
        </script>
        <script id="template-download" type="text/x-jquery-tmpl">
            <tr class="template-download{{if error}} ui-state-error{{/if}}">
                {{if error}}
                    <td></td>
                    <td class="name">${name}</td>
                    <td class="size">${sizef}</td>
                    <td class="error" colspan="2">Error:
                        {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                        {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                        {{else error === 3}}File was only partially uploaded
                        {{else error === 4}}No File was uploaded
                        {{else error === 5}}Missing a temporary folder
                        {{else error === 6}}Failed to write file to disk
                        {{else error === 7}}File upload stopped by extension
                        {{else error === 'maxFileSize'}}File is too big
                        {{else error === 'minFileSize'}}File is too small
                        {{else error === 'acceptFileTypes'}}Filetype not allowed
                        {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                        {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                        {{else error === 'emptyResult'}}Empty file upload result
                        {{else}}${error}
                        {{/if}}
                    </td>
                {{else}}
                    <td class="preview">
                        {{if thumbnail_url}}
                            <a href="${url}" target="_blank"><img src="${thumbnail_url}"></a>
                        {{/if}}
                    </td>
                    <td class="name">
                        <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
                    </td>
                    <td class="size">${sizef}</td>
                    <td colspan="2"></td>
                {{/if}}
                <td class="delete">
                    <button data-type="${delete_type}" data-url="${delete_url}">Удалить</button>
                </td>
            </tr>
        </script>
        <?
    }

}