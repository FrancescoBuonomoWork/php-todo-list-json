const { createApp } = Vue

createApp({
  data() {
    return {
      title: 'To Do List!',
      newTodo: '',
      todos: [],
    }
  },
  methods: {
    fetchData() {
      // chiamata al server che mi da la risposta e popolo l array todos 
      axios.get('server.php').then((res) => {
        console.log(res.data.result);
        this.todos = res.data.result;
      })
    },
    storeTodo() {
      // console.log('add',this.newTodo);
      // chiamata di tipo post che contatta store per inserire un altra todo 
      if (this.newTodo.trim() !== '') {
        const data = {
          todo: {
            'text': this.newTodo,
          }
        }
        // console.log(data.todo)
        axios.post('store.php', data, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        }).then((res) => {
          const respData = res.data;
          if (respData.success === true) {
            this.todos = res.data.result;
          }
          this.newTodo = '';
        })
      }
    },
    deleteTodo(index) {
      console.log('delete', index);
      const data = {
        "id": index,
      }
      axios.post('destroy.php', data, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      }).then((res) => {
        console.log(res);
        const respData = res.data;
        if (respData.success === true) {
          this.todos = res.data.result;
        } else{
          console.log(res.data.message);
        }
      })
    },
    toggleDone(i) {
      console.log('toggle', i);
      const data = {
        "id": i,
      };
      axios.post('toggle.php', data, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      }).then((res) => {
        console.log(res);
        const respData = res.data;
        if (respData.success === true) {
          this.todos = res.data.result;
        }
      })

    }

  },
  created() {
    this.fetchData();
  }
}).mount('#app')