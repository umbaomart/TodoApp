document.addEventListener('DOMContentLoaded', function() {

    // variables for adding a todo task and for editing
    let add_todo_form = document.getElementById('form_add_todo');
    let input_val = '';
    let input_id = '';

    // Variables for editing a todo app
    let form_edit_todo = document.getElementById('form_edit_todo');
    let btns_edit = document.querySelectorAll('.btn_edit');
    let todo_text, todo_id_input;

    // function for adding a todo
    add_todo_form.addEventListener('submit', function(e) {
        e.preventDefault();
        input_val = this.children[0].children[1].value;
        input_id = this.children[0].children[2].value;
        

        $.ajax({
            url : 'ajaxControllers/add.php'
            , type: 'POST'
            , data: {
                input: input_val,
                id: input_id
            }
            , success: function(d) {
                // let todos = JSON.parse(d);
                console.log(d);
                document.location.reload();
             }
        });
    });
    
    // function for editing todo
    btns_edit.forEach(btn_edit => {
        btn_edit.addEventListener('click', function() {
            todo_text =  this.parentElement.parentElement.children[0].children[1].innerText;
            form_edit_todo.children[0].children[1].value = todo_text;
            todo_id_input = this.parentElement.parentElement.children[0].children[2].value;

            console.log(todo_text);
        }) 
    });

    // console.log(form_edit_todo);
    form_edit_todo.addEventListener('submit', function(e) {
        e.preventDefault();
        input_edit_val = this.children[0].children[1].value;
        // input_id = this.children[0].children[2].value;
        // console.log(input_edit_val, input_id);

        $.ajax({
            url: 'ajaxControllers/edit.php'
            , type: 'POST'
            , data: {
                todo: input_edit_val,
                todo_id: todo_id_input
            }
            , success: function(d) {
                // console.log(JSON.parse(d));
                console.log(d);
                document.location.reload();
            }
        })
    });
    
    // styleText Function
    let todos_true_status = document.querySelectorAll('.status');
    let todo_value, todo_el;
    let form_check_inputs = document.querySelectorAll('.form-check-input');

    todos_true_status.forEach(todo_element => {
        todo_element.parentElement.children[0].checked = true;
    })


    form_check_inputs.forEach( check_input => {
        check_input.addEventListener('click', function(e) {
            let checkInput = e.target;
            todo_el = e.target.nextElementSibling;
            todo_value = todo_el.id;
            // console.log(todo_value);

            if (checkInput.checked == true) {
                $.ajax({
                    url: 'ajaxControllers/status.php'
                    , type: 'POST'
                    , data: {
                        action: true,
                        todo_val: todo_value
                    }
                    , success: function(e) {
                        todo_el.classList.add('status');
                        console.log(e);
                    }
                });
                
            } else {
                $.ajax({
                    url: 'ajaxControllers/status.php'
                    , type: 'POST'
                    , data: {
                        action: false,
                        todo_val: todo_value
                    }
                    , success: function(e) {
                        todo_el.classList.remove('status');
                        // console.log('FALSE');
                        console.log(e);
                        // if (d) {
                            // todo_el.style.textDecoration = 'line-through';
                            // todo_el.style.textDecoration = 'none';
                        // }
                    }
                });
                
            }


            // todo_value = e.target.nextElementSibling;
            // todo_value.style.fontSize = '40px';
            // console.log(todo_value);
        });
    });

    

});

