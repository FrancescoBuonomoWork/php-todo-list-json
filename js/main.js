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
    addTodo(){
        console.log('add');
        console.log(this.newTodo)
    },

  },
  created() {
    this.fetchData()
  }
}).mount('#app')