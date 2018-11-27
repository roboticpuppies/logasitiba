var filter_by = 1;
$('input:radio').change(function(){
	filter_by =  $(this).val();
});
function filter() {
// Declare variables 
var input, filter, table, tr, td, i;
// var filter_by =  $('input:radio').val();
input = document.getElementById("filter");
filter = input.value.toUpperCase();
table = document.getElementById("tabel_barang");
tr = table.getElementsByTagName("tr");

	// Loop through all table rows, and hide those who don't match the search query
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[filter_by];
		if (td) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}
}