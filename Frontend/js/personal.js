window.onload = () =>{
    let input = document.querySelector('#input');
    input.oninput = function(){
        let value = this.value.trim();
        let list = document.querySelectorAll('.for-ul li')
        
        if (value != ''){
            list.forEach(elem => {
                if(elem.innerText.search(value) == -1){
                    elem.classList.add('hide');
                }
                else{
                    elem.classList.remove('hide');
                    let str = elem.innerText;
                 }
            });
        }
        else{
            list.forEach(elem => {
                elem.classList.remove('hide');

            });
        }
    };

    function insertMark(string, pos, len){
        return string.slice(0, pos)+'<mark>'+string.slice(pos, pos+len)+'</mark>'+string.slice(pos+len);

    }
};

var height = 0;
$('.for-ul li').each(function() {
  if ($(this).index() < 4) {
    height = height + $(this).outerHeight();
    console.log(height);
  }
});
$('.for-ul').css('max-height', height + 'px');
