//Избавляем себя от лишнего стука по клаве и сокрашяем код
function ge(id) {
  return document.getElementById(id);
}

// Как только страничка загрузилась
window.onload = function () {
  // проверяем поддерживает ли браузер FormData
  if(!window.FormData) {

    /*
     * если не поддерживает, то выводим
     * то выводим предупреждение вместо формы
     */

    var div = ge('content');
    div.innerHTML = "Ваш браузер не поддерживает объект FormData";
    div.className = 'notSupport';
  }
}



function sendForm(form, output) {
  var data = new FormData(form),
  
    /*
     * Использовать кроссбраузерный способ создания
     * не имеет смысла т.к. браузеры для для которых,
     * XMLHttpRequest (xhr) создаётся по-другому, не поддерживают FormData
     */
     
    xhr = new XMLHttpRequest(),
  
    progressBar = document.querySelector('progress'),
    goBtn = ge('go'),
    fileInp = ge('file'),
    nameInp = ge('body'); 
    if(nameInp.value == '') {
    ge('status').innerHTML = 'Введите комментарий!';
    return false
    }
  
  
  
  ge('status').innerHTML = '';

  xhr.open('POST', form.action);
  
  xhr.onload = function (e) {
    output.innerHTML = e.currentTarget.responseText;
  }

  xhr.upload.onprogress = function (e) {
    progressBar.value = e.loaded / e.total * 100;
  }
  xhr.send(data);
  form.reset() 
  return false;
}