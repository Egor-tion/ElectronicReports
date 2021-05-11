function mainFunc() {
    let name = document.getElementById('name').value + " " +
        document.getElementById('surname').value + " " + document.getElementById('patronimic');
    let employmentDate = document.getElementById('date').value;

    let login = document.getElementById('login');
    let password = document.getElementById('password');
    let status = document.getElementById('status');


    document.getElementById('m_body').innerHTML = "ФИО:" + " " + name + "<br>" + "Дата трудоустройства:" + " " +
        employmentDate + "<br>" + "Логин" + " " + login + "<br>" + "Пароль" + " " + password + "<br>" + Статус + " " + status + "<br>";

    document.getElementById('window').style.display = "block";
    event.preventDefault();
}

function submit(){
    alert("Подтвердить регистрацию нового пользователя?");
}