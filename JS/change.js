function change() {
    document.getElementById('decide').innerHTML = "<span style='color:red;'>ID 중복 여부를 확인해주세요.</span>"
    document.getElementById('userid').value = ""
    document.getElementById('join_button').disabled = true
    document.getElementById('check_button').value = "중복 검사"
    document.getElementById('check_button').setAttribute("onclick", "checkid()")

}