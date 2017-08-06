<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		Тестовое задание Сосевича Владимира
	</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>

<body>
	<form method="post" id="searchData">
		<span>Введите id контракта:</span> <br>
		<input type="number" min="1" name="id_contract"> <br>
		<input type="checkbox" name="service_1" value="work" checked="true">Work<br>
		<input type="checkbox" name="service_2" value="connecting" checked="true">Connecting<br>
		<input type="checkbox" name="service_3" value="disconnected" checked="true">Disconnected<br>
		<button id="submit" type="submit" value="Submit" >Отправить</button>
	</form>
	<span id="error_text" style="color: red"></span>
	<table id="table_info" style="visibility: hidden;" >
		<tr>
			<td colspan=2><b>Информация про клиента</b></td>
		</tr>
		<tr>
			 <td >Название клиента</td>
			<td id="name_customer"></td>
		</tr>
		<tr>
			<td >Компания</td>
			<td id="company"></td>
		</tr>
		<tr>
			<td colspan=2><b>Информация про договор</b></td>
		</tr>
		<tr>
			<td >Номер договора</td>
			<td id="number"></td>
		</tr>
		<tr>
			<td >Дата подписания</td>
			<td id="date_sign"></td>
		</tr>
		<tr>
			<td colspan=2><b>Информация про сервисы</b></td>
		</tr>
		<tr>
			<td colspan=2 id="services_name"></td>
		</tr>
	</table>

</body>
</html>