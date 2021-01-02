    function updatePrice(obj) {
	var quantity = $(obj).val();
	var code = $(obj).data('code');
	queryString = 'action=edit&code=' + code + '&quantity=' + quantity;
	$.ajax({
		type : 'post',
		url : "../Cart/cart.php",
		data : queryString,
		success : function(data) {
			$("#total").text(data);
		}
	});
}