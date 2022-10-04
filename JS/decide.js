function decide() {
    document.getElementById('decide').innerHTML = "<span style='color:red;'>사용 가능한 ID입니다.</span>"
    document.getElementById('decide_id').value = document.getElementById('userid').value
    document.getElementById('join_button').disabled = false
    document.getElementById('check_button').value = "다른 ID로 변경"
    document.getElementById('check_button').setAttribute("onclick", "change()")
}