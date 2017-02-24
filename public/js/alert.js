function showAlert(error)
{
	var box = bootbox.alert(error);
	box.find('.modal-content').css({'background-color': '#efe4b0', 'text-align':'center', 'font-weight' : 'bold', color: '#F00', 'font-size': '25px'} );
	box.find('.modal-footer').css({'text-align':'center'});
	box.find(".btn-primary").removeClass("btn-primary").css({'width':'150px','background-color': '#61ce7b', 'font-weight' : 'bold', color: '#F00', 'font-size': '25px'});
};