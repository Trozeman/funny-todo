<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>

            const toggleClass = (e) => {
            document.querySelector(`[data-id='${e}']`).classList.toggle('done');
        };
        document.addEventListener("DOMContentLoaded", () => {
            if(sessionStorage.getItem('login') === "ok"){
                if(document.querySelector('.body').classList.contains('hidden')) document.querySelector('.body').classList.remove('hidden');
                if(!document.querySelector('.login').classList.contains('hidden')) document.querySelector('.login').classList.add('hidden')
            }else {
                if(!document.querySelector('.body').classList.contains('hidden')) document.querySelector('.body').classList.add('hidden');
                if(document.querySelector('.login').classList.contains('hidden')) document.querySelector('.login').classList.remove('hidden')
            }


            document.querySelector('#login').onclick = () => {
                let n = document.querySelector('#name').value;
                let p = document.querySelector('#pass').value;
                if(n === 'admin'&& p === '123') {
                    sessionStorage.setItem('login', 'ok');
                    location.reload();
                }
                else if(n !== 'admin') {
                    alert('Err: User name');
                }
                else if( p !== '123') {
                    alert('Err: Password');
                }

            };

            let todos = [...document.querySelectorAll('.todo')];
            let part = Math.ceil(todos.length / 3);
            const pages = [];
            for (let i = 0; i < part; i++) {
                pages.push(todos.slice(i * 3, (i * 3) + 3));
            }

            const showByIndex = (show) => {
                pages.forEach((page, index) => {
                    (index === show) ?
                        page.forEach((e) => {
                            if (e.classList.contains("hidden")) e.classList.remove('hidden');
                        }) :
                        page.forEach((e) => {
                            e.classList.add('hidden');
                        })
                });
            };

            showByIndex(1);

            let list = document.createElement('ul');
            list.classList.add('pagination');
            pages.forEach((e, i) => {
                let item = document.createElement("li");
                item.innerText = `Page: ${i + 1}`;
                item.onclick = (e) => {
                    showByIndex(i);
                    document.querySelectorAll('li.active').forEach((e) => {
                        e.classList.remove('active');
                    });
                    e.target.classList.add('active')
                };
                list.appendChild(item);
            });

            document.querySelector(".body").appendChild(list);
        });
    </script>
</head>
<body>
<header>
    <ul>
        <li><a href="/index/sort?by=done">Sort by done</a></li>
        <li><a href="/index/sort?by=name">Sort by name</a></li>
        <li><a href="/index/sort?by=id">Sort by id</a></li>
        <li><a href="/index/sort?by=email">Sort by email</a></li>
    </ul>

</header>

<div class="login">
    <h1>Admin page</h1>
    <div class="form">
        <input id="name" type="text" placeholder="username">
        <input id="pass" type="password" placeholder="password">
        <button id="login">Login</button>
    </div>
</div>

<div class="body">
    <?php foreach ($data as $todo): ?>
        <div class="todo <?= $todo->done ? "done" : ""; ?>" data-id="<?= $todo->id; ?>">
            <p class="todo-username"><?= $todo->username; ?></p>
            <p class="todo-email"><?= $todo->email; ?></p>
            <label for="chk">
                Done: <input
                        onchange="toggleClass(<?= $todo->id; ?>)"
                        type="checkbox" id="chk" class="todo-check" <?= $todo->done ? "checked" : ""; ?>>
            </label>
            <textarea class="todo-input" name="" id="" cols="30" rows="10"><?= $todo->data; ?></textarea>
            <button class="todo-save">
                Save by ID : <?= $todo->id; ?>
            </button>
        </div>
    <?php endforeach; ?>

</div>
<div class="new-todo">
    <label for="Username">Username</label>
    <input type="text" placeholder="Name">
    <label for="Username">Email</label>
    <input type="email" placeholder="E-mail">
    <label for="Username">TODO Text</label>
    <textarea></textarea>
    <button class="add-todo">Add TODO</button>
</div>
</body>
</html>


<style>
    body {
        margin: 0;
        padding: 0;
        font-family: monospace;
        min-height: 100vh;
    }

    .body, .new-todo, .login{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 15px 0;
        background: #f2f2f2;
    }

    .new-todo {
        background: #008abf;
        color: #fcfcfc;
    }

    .new-todo > input, .new-todo > textarea {
        margin: 10px;
        resize: none;
    }

    .new-todo > button {
        padding: 5px;
        background: #00bc20;
        color: #fcfcfc;
        border-radius: 4px;
        border: solid 1px #00a71f;
        cursor: pointer;
    }

    .todo {
        min-width: 60%;
        background: #9f6a92;
        padding: 15px;
        margin-top: 25px;
        min-height: 20vh;
        box-shadow: 0 0 5px #555555;
        font-size: 1.3em;
        color: #fefefe;
        transition: all 0.3s;
    }

    .done {
        background: #00bc20;
    }

    .todo-input {
        min-width: 100%;
        margin-top: 10px;
        resize: none;
    }

    .todo-save {
        margin-top: 15px;
        min-width: 100%;
        background: #008abf;
        border: solid 1px #0076a5;
        padding: 10px;
        outline: none;
        color: #fefefe;
        font-weight: bold;
        cursor: pointer;
    }

    header {
        position: sticky;
        top: 0;
        background: #555555;
        color: #fcfcfc;
        padding: 15px 10px;
    }

    ul, {
        list-style: none;
    }

    li {
        display: inline-block;
    }

    .pagination > li {
        padding: 5px;
        background: #00bc20;
        color: #fcfcfc;
        border-radius: 4px;
        border: solid 1px #00a71f;
        margin-right: 5px;
        cursor: pointer;
    }

    .pagination > li.active {
        background: #75a4bc;
    }

    li > a {
        color: #fcfcfc;
        text-decoration: none;
        font-size: 1rem;
        background: #5f9ea0;
        padding: 10px 15px;
        border-radius: 3px;
        border: solid 1px #78a093;
    }

    .hidden {
        background: red;
        display: none;
    }
</style>