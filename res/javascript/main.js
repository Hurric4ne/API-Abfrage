//check input with pattern, then show loading
function showInitLoading() {
  var str = document.getElementById('BattleTag').value;
  var patt = new RegExp("^\\D[0-9A-Za-z]{2,11}#\\d{4,5}$");
  var res = patt.test(str);
  if(res == true) {
    document.getElementById('loading').className = "showLoading";
  }
}

//just show loading (account already found)
function showLoading() {
  document.getElementById('loading').className = "showLoading";
}
