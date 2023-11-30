<!DOCTYPE html>
<html>
<head>
<title>Nota fiscal criada com sucesso!</title>
</head>
<body>

<h1>Olá, {{ $data['name'] }}!</h1>
<p>A sua nota fiscal N° <b>{{ $data['nota']['numero'] }}</b> foi criada com sucesso e já está disponível para consultas.</p>
<br>
<p>Dados:</p>
<br>
<p>Valor: R$ {{ $data['nota']['valor'] }}</p>
<p>CNPJ Remetente: {{ $data['nota']['cnpj_remetente'] }}</p>
<p>Nome Remetente: {{ $data['nota']['nome_remetente'] }}</p>
<p>CNPJ Transportador: {{ $data['nota']['cnpj_transportador'] }}</p>
<p>Nome Transportador: {{ $data['nota']['nome_transportador'] }}</p>
<br>
<p>Equipe <b>genofy.</b></p>
</body>
</html>