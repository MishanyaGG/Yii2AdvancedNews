var select_language = document.getElementById('select_language');

alert('ok');

var div_ru = document.getElementById('ru');
var div_sp = document.getElementById('sp');
var div_en = document.getElementById('en');
var div_de = document.getElementById('de');

div_sp.style.display = 'none';
div_en.style.display = 'none';
div_de.style.display = 'none';

function onchangeSelectLanguage(){
    alert(select_language.value());
}