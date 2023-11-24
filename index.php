<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
    <div id="app">
        <section>
            <div class="container">
                <h1>{{title}}</h1>
                <div>
                    <input type="text" v-model="storeTodo" @keyup.enter="addTodo">
                </div>
            
            </div>
        </section>
        <section>
            <div class="container">
                <ul>
                    <li v-for="todo in todos">{{todo.text}}</li>
                </ul>
            </div>
        </section>
    </div>
    <script src="js/main.js"></script>
</body>
</html>