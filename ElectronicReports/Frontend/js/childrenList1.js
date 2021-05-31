$(document).ready(function() {
	$('.block').on('click', '.extremum-click', function() {
		$(this).siblings('.extremum-slide1').slideToggle(0);
	});
});

function redact(){
    alert("Вы уверены, что хотите изменить информацию?");
    document.getElementById(".extremum-slide").style.display("none");
}

function delte(){
    alert("Вы уверены, что хотите удалить обучающегося?");
    document.getElementById(".extremum-slide").style.display("none");
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
