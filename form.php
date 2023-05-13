<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Formulário</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/static/main.css">
</head>
<body>
    <main>
        <div class="col-8 m-auto pt-2 pb-2 text-center">
            <h1>Cadastro</h1>
        </div>
        <div class="col-8 m-auto pt-3 pb-2 text-center">
            <a href="/" class="btn btn-info">Voltar</a>
        </div>
        <div class="col-8 m-auto pt-4 pb-2 text-center">
            <!-- Uma das formas para mostrar o formulário
                {{form.as_p}}
            -->
            <!-- A outra forma é está: Se o id for igual ao id do usuário atualiza se não cria-->
            <div id="result"></div>
            <form name="form" id="form" action="{% if db %}/update/{{db.id}}/{% else %}/create/{% endif %}" method="post">
                <!-- Fazendo a proteção de dados do formulário -->
                {% csrf_token %}
                <div class="form-group mt-4">Modelo: {{ form.modelo }}</div>
                <div class="form-group mt-4 ml-2">Marca: {{ form.marca }}</div>
                <div class="form-group mt-4 ml-4">Ano: {{ form.ano }}</div>
                <input type="submit" class="btn btn-succes" value="Salvar">
            </form>
        </div>
        {% load static %}
        <script src="{% static 'main.js'%}"></script>
    </main>
</body>
</html>