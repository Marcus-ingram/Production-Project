<template>
    <div>
      <ul>
      <li v-for="task in tasks" v-text="task"></li>
      </ul>
      <input type="text" v-model="NewTask" @blur="addTask">
    </div>
</template>

<script>
    export default {
        data(){
            return{
                tasks: [],
                NewTask: ''
            };
        },
        created(){
            axios.get('/tasks').then(response => this.tasks =response.data);
        },
        methods:{
            addTask(){
                axios.get('/tasks', { body: this.newTask });
                
                this.tasks.push(this.newTask);
                this.newTask: '';
            }
        }
    };
</script>
