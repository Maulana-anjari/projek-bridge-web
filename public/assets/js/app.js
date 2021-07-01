/** tambah class active jika di klik */
var url = window.location;
// ini untuk menambahkan class active pada menu yg tidak memiliki anak atau single link
$('ul.sidebar-menu a').filter(function() {
	return this.href == url;
}).parent().addClass('active');
// ini untuk menu beranak, jadi otomatis akan terbuka sesuai dengan link tujuan
$('ul.treeview-menu a').filter(function() {
	return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

// Filtering
let rentang = $('#filter-rentang-waktu').val();
$(".filter").on('change', function(){
	rentang = $("#filter-rentang-waktu").val()
});