function basename(path)
{
    return path.replace(/\\/g,'/').replace( /.*\//, '' );
}

 function dellPhoto(attr)
 {
    if( confirm('Действительно удалить?'))
    {
        document.getElementById('imghiddenfield_'+attr).value = '';
        var div = document.getElementById('image_'+attr);
        div.innerHTML = '<div style="margin:2px"><i>Кликните для выбора изображения</i></div>';
    }
    return false;
}

function openKCFinder(div,kcFinderPath,attr)
{
    window.KCFinder = {
			callBack: function(url) {
                                                    window.KCFinder = null;
                                                    div.innerHTML = '<div style="margin:5px">Загрузка...</div>';
                                                    var img = new Image();
                                                    img.src = url;
                                                    img.onload = function() {
                                                                                div.innerHTML = '<img class="image" id="img_'+attr+'" src="' + url + '" />';
                                                                        	var img = document.getElementById('img_'+attr);
                                                                                var o_w = img.offsetWidth;
                                                                                var o_h = img.offsetHeight;
                                                                                var f_w = div.offsetWidth;
                                                                                var f_h = div.offsetHeight;
                                                                                if ((o_w > f_w) || (o_h > f_h)) {
                                                                                        if ((f_w / f_h) > (o_w / o_h))
                                                                                                f_w = parseInt((o_w * f_h) / o_h);
                                                                                        else if ((f_w / f_h) < (o_w / o_h))
                                                                                                f_h = parseInt((o_h * f_w) / o_w);
                                                                                        img.style.width = f_w + "px";
                                                                                        img.style.height = f_h + "px";
                                                                                } else {
                                                                                        f_w = o_w;
                                                                                        f_h = o_h;
                                                                                }
					
                                                                                img.style.visibility = "visible";
                                                                                document.getElementById('imghiddenfield_'+attr).value = basename(url);
                                                                            }
                                               }
                    };

    window.open(kcFinderPath+'/browse.php?type=images&dir=images/catalog&lang=ru',
			'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
			'directories=0, resizable=1, scrollbars=0, width=800, height=600');
}