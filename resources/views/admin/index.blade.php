@extends('admin.main')

@section('title', 'Панель управления')

@section('panel-page')
    <div class="panel-page">
        <h3>сложное бывает ПРОСТЫМ...</h3>
    </div>
@endsection


@section('content')
    <section class="content">

        <div id="app">
            <oz></oz>
            <oz></oz>
            <oz></oz>
        </div>
    </section>
@endsection



@push('scripts')
<script>
Vue.component('oz', {
   template:'<button @click="counter++" class="btn btn-outline-danger">@{{ counter }}</button>',
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