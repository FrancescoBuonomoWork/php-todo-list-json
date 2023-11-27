const { createApp } = Vue

createApp({
  data() {
    return {
      title: 'To Do List!',
      newTodo:'',
      todos:[],
    }
  },
  methods: {
    fetchData(){
        // chiamata al server che mi da la risposta e popolo l array todos 
        axios.get('server.php').then((res)=>{
            console.log(res.data.result);
            this.todos = res.data.result;
        })
    },
    storeTodo(){
        // console.log('add',this.newTodo);
        if(this.newTodo.trim() !== ''){
          const data = {
              todo:{
                  'text': this.newTodo,
              }
          }
          // console.log(data.todo)
          axios.post('store.php', data,{
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          }).then((res)=>{
            const respData = res.data;
            if (respData.success === true) {
              this.todos = res.data.result;
            }
            this.newTodo = '';
          })
        }
    },
    deleteTodo(index){
      console.log('delete',index);
      const data = {
        "id" : index,
      }
     axios.post('destroy.php',data,{
      headers: {
        'Content-Type': 'multipart/form-data',
      },
     }).then((res)=>{
      console.log(res);
     })
    },
    toggleDone(t){
      console.log('toggle',t.done);
      if(t.done === false){
        return t.done = true
      } else{
        return t.done = false
      }
      
    }

  },
  created() {
    this.fetchData();
  }
}).mount('#app')