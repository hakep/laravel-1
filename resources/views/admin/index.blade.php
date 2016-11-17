@extends('admin.main')

@section('title', 'Панель управления')

@section('content')
    <section class="content">
        <h1>Главная страница панели управления</h1>
    </section>

    <div id="app">
        <oz></oz>
        <oz></oz>
        <oz></oz>
    </div><pre>
@endsection



@push('scripts')
<script>
Vue.component('oz', {
   template:'<button @click="counter++" class="btn btn-danger">@{{ counter }}</button>',
    data: function(){
        return {
            counter: 0
        }
    }
});
new Vue ({
    el: '#app'
});
</script>
@endpush