var row = $('#list-user tbody tr');

for (var i = 0; i < row.length; i++){
  var col = $(row[i]).find('td');
  $(col[0]).addClass("user-id");
  $(col[4]).addClass("prov").attr("title", "A senha deve ser trocada");// corrigir caso seja 0

}
