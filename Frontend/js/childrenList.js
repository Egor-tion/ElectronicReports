$(document).ready(function() {
	$('.block').on('click', '.extremum-click', function() {
		$(this).siblings('.extremum-slide').slideToggle(0);
	});
});

function redact(){ 
    warni = document.getElementById('fofa');
    y = document.getElementById('yes');
    n = document.getElementById('no');
    form = document.getElementById('formS');
    repl = document.getElementById('text');

    repl.innerText = "подтвердить изменения";
    warni.style.display='flex';
    y.onclick =  function() {
        form.submit();
        document.getElementById('fofa').style.display='none';
        document.getElementById('slide').style.display='none';    
    };

    n.onclick = function() {
        document.getElementById('fofa').style.display='none';
        document.getElementById('slide').style.display='none';
    };

} 

function delte(){ 
    warni = document.getElementById('fofa');
    y = document.getElementById('yes');
    n = document.getElementById('no');
    form = document.getElementById('formS');
    repl = document.getElementById('text');

    repl.innerText = "удалить обучающегося";
    warni.style.display='flex';
    y.onclick =  function() {
        form.submit();
        document.getElementById('fofa').style.display='none';
        document.getElementById('slide').style.display='none';    
    };

    n.onclick = function() {
        document.getElementById('fofa').style.display='none';
        document.getElementById('slide').style.display='none';
    };

} 


window.onload = () =>{
    let input = document.querySelector('#input');
    input.oninput = function(){
        let value = this.value.trim();
        let list = document.querySelectorAll('.ul li')
        
        if (value != ''){
            list.forEach(elem => {
                if(elem.innerText.search(value) == -1){
                    elem.classList.add('hide');
                    elem.innerHTML = elem.innerText;
                }
                else{
                    elem.classList.remove('hide');
                    let str = elem.innerText;
                    elem.innerHTML = insertMark(str, elem.innerText.search(value), value.length);
                }
            });
        }
        else{
            list.forEach(elem => {
                elem.classList.remove('hide');
                elem.innerHTML = elem.innerText;

            });
        }
    };

    function insertMark(string, pos, len){
        return string.slice(0, pos)+'<mark>'+string.slice(pos, pos+len)+'</mark>'+string.slice(pos+len);

    }
};
