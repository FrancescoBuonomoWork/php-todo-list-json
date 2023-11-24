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
            console.log(res.data);
            this.todos = res.data;
        })
    },
    storeTodo(){
        console.log('add',this.newTodo);
        const data = {
            todo:{
                'text': this.newTodo,
                'done' : false
            }
        }
        axios.post('store.php', data,{
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        }).then((res)=>{
            console.log(res.data)
        })
    },

  },
  created() {
    this.fetchData()
  }
}).mount('#app')