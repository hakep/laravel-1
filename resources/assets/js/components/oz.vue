<template>
    <div>
        Мой первый компонент1! <button @click="counter++" class="btn btn-danger">{{ counter }}</button>
    </div>
</template>

<script>
    export default {
        ready() {
            console.log('Component ready.')
        },
        data: function(){
            return {
                counter: 0
            }
        }
    }
</script>
